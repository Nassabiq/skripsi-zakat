<?php

namespace App\Http\Controllers;

use App\Models\ZIS;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
// use Xendit\Xendit;

class ZisController extends Controller
{
    private $api_key;
    public function __construct()
    {
        // $this->api_key = Xendit::setApiKey(env('XENDIT_SECRET_API_KEY'));
    }
    public function index()
    {
        if (Auth::user()->id == null) {
            return redirect()->route('login')->with('error', 'You Must Logged In First!!');
        }
        return view('zis.index');
    }
    public function dashboard()
    {
        $data = ZIS::where('user_id', Auth::user()->id)->get();
        return view('zis.dashboard', [
            'data' => $data
        ]);
    }

    public function laporanZIS()
    {
        $data = ZIS::get();
        return view('admin.laporan', [
            'data' => $data
        ]);
    }
    public function zakatMal()
    {
        return view('zis.zakat-mal');
    }
    public function zakatFitrah()
    {
        return view('zis.zakat-fitrah');
    }
    public function infaqSodaqoh()
    {
        return view('zis.infaq-sodaqoh');
    }
    public function invoice($data)
    {
        // dd($data);
        $data = ZIS::findOrFail($data);

        if ($data->status_pembayaran == 0) {
            # code...
            return view('zis.invoice', [
                'data' => $data
            ]);
        }
        abort(404);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jumlah_zakat' => 'required|numeric',
            'selected_bank' => 'required',
            'nama_muzakki' => 'required',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong")->withInput($request->all());

        $id = IdGenerator::generate(['table' => 'zis', 'field' => 'id_zis', 'length' => 9, 'prefix' => 'ZIS-']);

        $nominal = $request->zis == "zakat-fitrah" ? $request->jumlah_zakat * 40000 + 345 : $request->jumlah_zakat + 345;

        $zis = ZIS::create([
            'id_zis' => $id,
            'user_id' => Auth::user()->id,
            'no_pembayaran' => $id,
            'nama_muzakki' => $request->nama_muzakki,
            'tipe_zis' => $request->zis,
            'jenis_bank' => $request->selected_bank,
            'status_pembayaran' => 0,
            'nominal_pembayaran' => $nominal,
            'validasi_data' => 0,
        ]);

        return redirect()->route('invoice', ['id' => $zis])->with('success', 'Data Berhasil Ditambahkan, Silahkan Melanjutkan Pembayaran!');
    }

    public function uploadPembayaran(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'required|mimes:pdf|max:4096',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong")->withInput($request->all());

        if ($request->hasFile('bukti_pembayaran')) {
            # code...
            $filename = "Pembayaran-" . $id . '.' . $request->bukti_pembayaran->extension();
            $request->bukti_pembayaran->move(public_path('pembayaran'), $filename);
        }

        $zis = ZIS::findOrFail($id);
        $zis->status_pembayaran = 1;
        $zis->bukti_pembayaran = $filename;

        $zis->save();
        return redirect()->route('data_muzakki')->with('success', 'Pembayaran Berhasil!');
    }

    public function validasiPembayaran($id)
    {
        $zis = ZIS::findOrFail($id);

        $zis->validasi_data = 1;
        $zis->save();

        return back()->with('success', "Pembayaran Berhasil Divalidasi");
    }
}
