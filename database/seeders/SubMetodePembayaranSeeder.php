<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubMetodePembayaran;

class SubMetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubMetodePembayaran::create([
            "Nama Bank" => "Bank Central Asia (BCA)",
        ]);
    }
}
