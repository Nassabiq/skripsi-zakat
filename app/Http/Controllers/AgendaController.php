<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{
    public function index()
    {
        $data = Agenda::where('status_agenda', 1)->get();
        return view('agenda', [
            'data' => $data
        ]);
    }
    public function admin()
    {
        // $agenda = Agenda::get();
        return view('admin.agenda', [
            'agenda' => Agenda::get()
        ]);
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }


    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_agenda' => 'required',
            'tgl_agenda' => 'required|date',
            'deskripsi_agenda' => 'required',
            'foto_agenda' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong, Please Re-Open Pop up Modal")->withInput($request->all());

        $id = IdGenerator::generate(['table' => 'agenda', 'field' => 'id_agenda', 'length' => 12, 'prefix' => 'Agenda-']);

        if ($request->hasFile('foto_agenda')) {
            # code...
            $imageName = "Image-" . $id . '.' . $request->foto_agenda->extension();
            $request->foto_agenda->move(public_path('img/agenda'), $imageName);
        }

        Agenda::create([
            'id_agenda' => $id,
            'nama_agenda' => $request->nama_agenda,
            'tgl_agenda' => $request->tgl_agenda,
            'deskripsi_agenda' => $request->deskripsi_agenda,
            'foto_agenda' => $imageName,
            'status_agenda' => 0,
        ]);

        return redirect()->to('admin/agenda')->with('success', 'Data Successfully Added!');
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_agenda' => 'required',
            'tgl_agenda' => 'required|date',
            'deskripsi_agenda' => 'required',
            'foto_agenda' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong, Please Re-Open Pop up Modal")->withInput($request->all());

        $agenda = Agenda::where('id_agenda', $id)->first(); // GET DATA AGENDA

        if ($request->hasFile('foto_agenda')) {
            if (File::exists(public_path('img/agenda/' . $agenda->foto_agenda))) {
                File::delete(public_path('img/agenda/' . $agenda->foto_agenda));
            }
            # code...
            $imageName = "Image-" . $id . '.' . $request->foto_agenda->extension();
            $request->foto_agenda->move(public_path('img/agenda'), $imageName);
        }

        $agenda->nama_agenda = $request->nama_agenda;
        $agenda->tgl_agenda = $request->tgl_agenda;
        $agenda->deskripsi_agenda = $request->deskripsi_agenda;
        $agenda->foto_agenda = $imageName;
        $agenda->save();

        return redirect()->to('admin/agenda')->with('success', 'Data Successfully Added!');
    }

    public function validasi($id)
    {
        $agenda = Agenda::where('id_agenda', $id)->first(); // GET DATA AGENDA

        // VALIDASI STATUS AGENDA
        $agenda->status_agenda = 1;
        $agenda->save();

        // REDIRECT KE HALAMAN AGENDA
        return redirect()->to('admin/agenda')->with('success', 'Data Successfully Validated!');
    }

    public function delete($id)
    {
        $agenda = Agenda::where('id_agenda', $id)->first(); // GET DATA AGENDA

        // DELETE IMAGE AGENDA FIRST
        if (File::exists(public_path('img/agenda/' . $agenda->foto_agenda))) {
            File::delete(public_path('img/agenda/' . $agenda->foto_agenda));
        }

        // DELETE DATA AGENDA FROM DB
        $agenda->delete();

        // REDIRECT TO HALAMAN AGENDA
        return redirect()->to('admin/agenda')->with('success', 'Data Successfully Deleted!');
    }
}
