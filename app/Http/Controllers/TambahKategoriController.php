<?php

namespace App\Http\Controllers;

use App\Models\TambahKategori;
use Illuminate\Http\Request;

class TambahKategoriController extends Controller
{
    public function index()
    {
        $kategori = TambahKategori::all();
        return view('admin.layanan.tambah_kategori_layanan.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => '',
            'slug' => ''
        ]); 
        

        TambahKategori::create([
            'nama' => $request->nama,
            'slug' => $request->slug
        ]);
        return redirect()->back()->with('berhasil', 'Kategori baru telah ditambahkan!');
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => TambahKategori::where("id", $request->id)->first()
        ];

        return view("admin.layanan.tambah_kategori_layanan.tambah", $data);
    }

    public function update(Request $request)
    {
        TambahKategori::where('id', $request->id)->update([
            "nama" => $request->nama,
            "slug" => $request->slug
        ]);

        return back()->with('berhasil', 'Layanan berhasil diupdate');
    }

    public function show(Request $request)
    {
        
    }

    public function destroy($id)
    {
        $sub = TambahKategori::where("id", $id)->first();
        $sub->delete();
        return back()->with('berhasil', 'TambahKategori Berhasil di Hapus');
    }
}
