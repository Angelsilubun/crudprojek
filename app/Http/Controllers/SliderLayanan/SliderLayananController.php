<?php

namespace App\Http\Controllers\SliderLayanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SliderLayanan\SliderLayanan;
use Illuminate\Support\Facades\Storage;

class SliderLayananController extends Controller
{
    public function index()
    {
        $sliderlayanan = SliderLayanan::all();
        return view('admin.slider.slider_layanan.tambah', compact('sliderlayanan'));
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/app/slider', $gambar->hashName());

        SliderLayanan::create([
            'gambar' => $gambar->hashName(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->back()->with('berhasil', 'ditambahkan');
    }

    public function edit(SliderLayanan $sliderlayanan)
    {
        return view('admin.slider.slider_layanan.edit', compact('sliderdetail'));
    }

    public function update(Request $request, sliderlayanan $sliderlayanan)
    {
        if($request->hashFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/app/slider'.$gambar->hashName());

            Storage::delete('public/app/slider'.$sliderlayanan->gambar);

            $sliderlayanan->update([
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);
        } else {
            $sliderlayanan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);

            return back()->with('berhasil', 'data berhasil diupdate');
        }
    }

    public function destroy(sliderlayanan $sliderlayanan)
    {
        Storage::delete('public/app/slider'. $sliderlayanan->gambar);

        $sliderlayanan->delete();

        return back()->with('berhasil', 'data berhasil dihapus');
    }
}

