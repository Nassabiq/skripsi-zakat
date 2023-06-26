<?php

namespace App\Http\Controllers;

use App\Models\BeritaMasjid;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BeritaMasjidController extends Controller
{
    public function index()
    {
        $data = BeritaMasjid::where('is_published', 1)->get();
        return view('news', [
            'data' => $data
        ]);
    }
    public function admin()
    {
        return view('admin.news', [
            'berita' => BeritaMasjid::get()
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_berita' => 'required',
            'deskripsi_berita' => 'required',
            'foto_berita' => 'required',
            'foto_berita.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong, Please Re-Open Pop up Modal")->withInput($request->all());

        $id = IdGenerator::generate(['table' => 'berita_masjid', 'field' => 'id_berita_masjid', 'length' => 12, 'prefix' => 'Berita-']);

        $files = [];
        if ($request->hasFile('foto_berita')) {
            foreach ($request->file('foto_berita') as $key => $image) {
                $imageName = "Image-" . $id . '-' . $key + 1 . '.' . $image->extension();
                $image->move(public_path('img/berita/' . $id), $imageName);
                $files[] = $imageName;
            }
        }

        BeritaMasjid::create([
            'id_berita_masjid' => $id,
            'nama_berita' => $request->nama_berita,
            'deskripsi_berita' => $request->deskripsi_berita,
            'tgl_berita' => Carbon::now(),
            'foto_berita' => json_encode($files),
            'is_published' => 0,
        ]);

        return redirect()->back()->with('success', 'Data Successfully Added!');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_berita' => 'required',
            'deskripsi_berita' => 'required',
            'foto_berita' => 'required',
            'foto_berita.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4098',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong, Please Re-Open Pop up Modal")->withInput($request->all());

        $berita = BeritaMasjid::where('id_berita_masjid', $id)->first();

        $files = [];
        if ($request->hasFile('foto_berita')) {
            foreach (json_decode($berita->foto_berita) as $image) {
                # code...
                if (File::exists(public_path('img/berita/' . $berita->id_berita_masjid . '/' . $image))) {
                    File::delete(public_path('img/berita/' . $berita->id_berita_masjid . '/' . $image));
                }
            }
            foreach ($request->file('foto_berita') as $key => $image) {
                $imageName = "Image-" . $berita->id_berita_masjid . '-' . $key + 1 . '.' . $image->extension();
                $image->move(public_path('img/berita/' . $berita->id_berita_masjid), $imageName);
                $files[] = $imageName;
            }
        }

        $berita->nama_berita = $request->nama_berita;
        $berita->deskripsi_berita = $request->deskripsi_berita;
        $berita->foto_berita = json_encode($files);
        $berita->save();

        return redirect()->back()->with('success', 'Data Successfully Updated!');
    }

    public function publish($id)
    {
        $berita = BeritaMasjid::where('id_berita_masjid', $id)->first();

        $berita->is_published = 1;
        $berita->save();

        return redirect()->back()->with('success', 'Data Successfully Published!');
    }

    public function delete($id)
    {
        $berita = BeritaMasjid::where('id_berita_masjid', $id)->first();

        $path = public_path('img/berita/' . $berita->id_berita_masjid);
        File::deleteDirectory($path);

        // DELETE DATA FROM DB
        $berita->delete();

        // REDIRECT TO PREVIOUS PAGE
        return redirect()->back()->with('success', 'Data Successfully Deleted!');
    }
}
