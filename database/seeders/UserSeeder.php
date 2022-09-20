<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "tgl_lahir" => "2002-01-01",
            "no_telp" => "085324237299",
            "kota" => "Cirebon",
        ]);


    }
}
