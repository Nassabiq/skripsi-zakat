<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AgendaController extends Controller
{
    public function index()
    {
        return view('agenda');
    }
    public function admin()
    {
        return view('admin.agenda');
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


    public function addAgenda(Request $request)
    {
        $validated = $request->validate([
            'nama_agenda' => 'required',
            'tgl_agenda' => 'required|date',
            'deskripsi_agenda' => 'required',
            'foto_agenda' => 'required|image|mimes:jpeg,png,jpg,gif,svg|size:4098',
        ]);

        $id = IdGenerator::generate(['table' => 'agenda', 'length' => 12, 'prefix' => date('agenda-')]);

        if ($request->hasFile('foto_agenda')) {
            # code...
            $imageName = "image-agenda-" . $id . $request->foto_agenda->extension();
            $request->foto_agenda->move(public_path('agenda'), $imageName);
        }

        Agenda::create([]);
        dd($request);
    }
    //
}
