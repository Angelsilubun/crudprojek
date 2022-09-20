<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\Kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            "judul" => "Kendaraan",
            "deskripsi" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Laborum consectetur vitae perspiciatis eveniet! Assumenda 
            laborum aliquam deserunt rerum deleniti explicabo veniam id, 
            accusantium, facilis quisquam ipsum repellendus, quod 
            eveniet voluptatum.",
        ]);
    }
}
