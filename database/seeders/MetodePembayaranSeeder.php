<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MetodePembayaran;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetodePembayaran::create([
            "Metode Pembayaran" => "Transfer Bank",
            "Jenis Pembayaran lain" => "Qris",
        ]);
    }
}
