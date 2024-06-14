<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petshop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\storage;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function katalok()
    {
        $katalok = petshop::orderBy('id', 'desc')->get();
        return view("katalok", ["key" => "katalok", "mv" => $katalok]);
    }

    public function fasilitas()
    {
        return view("fasilitas", ["key" => "message"]);
    }

    public function layanan()
    {
        return view("layanan", ["key" => "settings"]);
    }

    public function formaddkatalok()
    {
        return view("form-add",["key" => "katalok"]);
    }

    public function savekatalok(Request $request)
    {
        $file_name = time().'-'.$request->file('gambar')->getClientOriginalName();
        $path = $request->file('gambar')->storeAs('gambar', $file_name, 'public');

        petshop::create([
            'produk' => $request->produk,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'gambar' => $path
        ]);

        return redirect('/katalok')->with('alert', 'Data Berhasil Disimpan');
    }

    public function formeditkatalok($id)
    {
        $katalok = petshop::find($id);
        return view("form-edit", ["key" => "katalok", "mv" => $katalok]);
    }

    public function updatekatalok($id, Request $request)
    {
        $katalok = petshop::find($id);
        $katalok->produk = $request->produk;
        $katalok->kategori = $request->kategori; // Corrected line
        $katalok->stok = $request->stok;
        
        if ($request->gambar)
        {
            if ($katalok->gambar)
            {
                Storage::disk('public')->delete($katalok->gambar);
            }

            $file_name = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambar', $file_name, 'public');
            $katalok->gambar = $path;
        }
        $katalok->save();
        return redirect('/katalok')->with('alert', 'Data Berhasil Di Ubah');
    }


    public function deletekatalok($id)
    {
        $katalok = petshop::find($id);

        if ($katalok->poster)
        {
            storage::disk('public')->delete($katalok->gambar);
        }

        $katalok->delete();

        return redirect("/katalok")->with('alert', 'Data Berhasil di Hapus');
    }

    public function login()
    {
        return view("login");
    }

    public function formedituser()
    {
        return view("formedituser", ["key" => ""]);
    }

    public function updateuser(Request $request)
    {
        if($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();
            $user -> password = bcrypt($request->password_baru);
            $user -> save();
            return redirect("/user")->with("info", "Password Berhasil Di Ubah");
        }
        else
        {
            return redirect("/user")->with("info", "Password Gagal Di Ubah");
        }
    }
}