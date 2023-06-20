<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    //
    public function index()
    {
        return view('admin.gallery', [
            'galeri' => Galeri::get()
        ]);
    }
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_galeri' => 'required',
            'deskripsi_galeri' => 'required',
            'foto_galeri' => 'required',
            'foto_galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong, Please Re-Open Pop up Modal")->withInput($request->all());

        $id = IdGenerator::generate(['table' => 'galeri', 'field' => 'id_galeri', 'length' => 12, 'prefix' => 'Gallery-']);

        $files = [];
        if ($request->hasFile('foto_galeri')) {
            foreach ($request->file('foto_galeri') as $key => $image) {
                $imageName = "Image-" . $id . '-' . $key + 1 . '.' . $image->extension();
                $image->move(public_path('img/galeri/' . $id), $imageName);
                $files[] = $imageName;
            }
        }

        Galeri::create([
            'id_galeri' => $id,
            'nama_galeri' => $request->nama_galeri,
            'deskripsi_galeri' => $request->deskripsi_galeri,
            'tgl_galeri' => Carbon::now(),
            'foto_galeri' => json_encode($files)
        ]);

        return redirect()->to('admin/gallery')->with('success', 'Data Successfully Added!');
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_galeri' => 'required',
            'deskripsi_galeri' => 'required',
            'foto_galeri' => 'required',
            'foto_galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong, Please Re-Open Pop up Modal")->withInput($request->all());

        $galeri = Galeri::where('id_galeri', $id)->first(); // GET DATA

        $files = [];
        if ($request->hasFile('foto_galeri')) {
            foreach (json_decode($galeri->foto_galeri) as $image) {
                # code...
                if (File::exists(public_path('img/galeri/' . $galeri->id_galeri . '/' . $image))) {
                    File::delete(public_path('img/galeri/' . $galeri->id_galeri . '/' . $image));
                }
            }
            foreach ($request->file('foto_galeri') as $key => $image) {
                $imageName = "Image-" . $galeri->id_galeri . '-' . $key + 1 . '.' . $image->extension();
                $image->move(public_path('img/galeri/' . $galeri->id_galeri), $imageName);
                $files[] = $imageName;
            }
        }

        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->deskripsi_galeri = $request->deskripsi_galeri;
        $galeri->foto_galeri = json_encode($files);
        $galeri->save();

        return redirect()->to('admin/gallery')->with('success', 'Data Successfully Updated!');
    }

    public function delete($id)
    {
        $galeri = Galeri::where('id_galeri', $id)->first(); // GET DATA

        // DELETE IMAGE FIRST
        $path = public_path('img/galeri/' . $galeri->id_galeri);
        File::deleteDirectory($path);

        // DELETE DATA FROM DB
        $galeri->delete();

        // REDIRECT TO PREVIOUS PAGE
        return redirect()->to('admin/gallery')->with('success', 'Data Successfully Deleted!');
    }
}
