<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori" => Kategori::get()
        ];

        return view("admin.master.kategori.index", $data);
    }

    public function store(Request $request)
    {
        $count = Kategori::where("kategori", $request->kategori)->count();
        $count = Kategori::where("slug", $request->slug)->count();

        if ($count > 0) {
            return back();
        } else {
            Kategori::create($request->all());

            return back();
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Kategori::where("id", $request->id)->first()
        ];

        return view("admin.master.kategori.edit", $data);
    }

    public function update(Request $request)
    {
        Kategori::where("id", $request->id)->update([
            "kategori" => $request->kategori,
            "slug" => $request->slug
        ]);

        return back();
    }
}
