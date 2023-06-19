<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'foto_agenda' => 'required|image|size:4098',
        ]);
        dd($request);
    }
    //
}
