<?php

namespace App\Http\Controllers;

use App\Jadwal; // Import the Jadwal model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function jadwal()
    {
        // Fetch all jadwal data from the database
        $jadwal = Jadwal::orderBy('id', 'desc')->get();

        return view("jadwal", ["key" => "jadwal", "jadwal" => $jadwal]);
    }

    public function addjadwal()
    {
        return view("formaddjadwal", ["key" => "jadwal"]);
    }

    public function savejadwal(Request $request)
    {
        // Handle file upload and store it in the 'public/gambar' directory
        $file_Name = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $path = $request->file('gambar')->storeAs('gambar', $file_Name, 'public');

        // Create a new Jadwal record with validated data
        Jadwal::create([
            'nama'          => $request->nama,
            'deskripsi'     => $request->deskripsi,
            'dosis'         => $request->dosis,
            'jadwal_minum'  => $request->jadwal_minum,
            'kategori'      => $request->kategori,
            'gambar'        => $path
        ]);

        // Redirect back to the jadwal page with a success message
        return redirect('/jadwal')->with('alert', 'Jadwal berhasil disimpan.');
    }

    public function editjadwal($id)
    {
        $jadwal = jadwal::find($id);
        return view("formedit", ["key" => "jadwal", "jadwal" => $jadwal]);
    }

    public function updatejadwal($id, Request $request)
{
    $jadwal = Jadwal::find($id);

    $jadwal->nama = $request->nama;
    $jadwal->deskripsi = $request->deskripsi;
    $jadwal->dosis = $request->dosis;
    $jadwal->jadwal_minum = $request->jadwal_minum;
    $jadwal->kategori = $request->kategori;

    if ($request->hasFile('gambar')) {
        if ($jadwal->gambar) {
            Storage::disk('public')->delete($jadwal->gambar);
        }

        $file_name = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $path = $request->file('gambar')->storeAs('gambar', $file_name, 'public');
        $jadwal->gambar = $path;
    }

    $jadwal->save();
    return redirect("/jadwal")->with('alert', 'Data berhasil diubah.');
}

    public function deletejadwal($id)
{
    $jadwal = jadwal::find($id);

    if ($jadwal->gambar) {
        Storage::disk('public')->delete($jadwal->gambar);
    }

    $jadwal->delete();

    return redirect("/jadwal")->with('alert', 'Data berhasil dihapus.');
}


    public function about()
    {
        return view("about", ["key" => "about"]);
    }

    public function faq()
    {
        return view("faq", ["key" => "faq"]);
    }
    public function login()
    {
        return view("login");
    }
    public function edituser()
    {
        return view("edituser",["key"=> ""]);

    }
    public function updateuser(Request $request)
    {
        if ($request->password_baru == $request->konfirmasi_password) 
        {
            $user = Auth::user();
            $user->password = bcrypt($request->password_baru);
            $user->save();
           return redirect("/user")->with("info", "password berhasil di ubah");
        }
        else
        {
            return redirect("/user")->with("info", "password gagal di ubah");
    }
}
}
