<?php

namespace App\Http\Controllers;

use App\Models\ZIS;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Xendit\Xendit;

class ZisController extends Controller
{
    private $api_key;
    public function __construct()
    {
        $this->api_key = Xendit::setApiKey(env('XENDIT_SECRET_API_KEY'));
    }
    public function index()
    {
        return view('zis');
    }
    public function zakatMal()
    {
        return view('zakat-mal');
    }
    public function zakatFitrah()
    {
        return view('zakat-fitrah');
    }
    public function infaqSodaqoh()
    {
        return view('infaq-sodaqoh');
    }
    public function invoice($data)
    {
        dd($data);
        return view('invoice');
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'jumlah_zakat' => 'required|numeric',
            'selected_bank' => 'required',
            'nama_muzakki' => 'required',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong")->withInput($request->all());

        $id = IdGenerator::generate(['table' => 'zis', 'field' => 'id_zis', 'length' => 9, 'prefix' => 'ZIS-']);

        $zis = ZIS::create([
            'id_zis' => $id,
            'no_pembayaran' => $id,
            'nama_muzakki' => $request->nama_muzakki,
            'tipe_zis' => $request->zis,
            'jenis_bank' => $request->selected_bank,
            'status_pembayaran' => 0,
            'nominal_pembayaran' => $request->jumlah_zakat,
        ]);

        return redirect()->route('invoice', ['id' => $zis])->with('success', 'Data Berhasil Ditambahkan, Silahkan Melanjutkan Pembayaran!');
    }
}
