<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_layanans', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 100);
            $table->text("alamat");
            $table->text("deskripsi");
            $table->double("harga");
            $table->double("diskon")->nullable();
            $table->string("kode_pesan", 100)->nullable();
            $table->string("status1")->enum("tersedia", "tidak tersedia");
            $table->string("status2")->enum("buka", "tutup");
            $table->tinyInteger("fitur")->default(0);
            $table->integer("quantity")->default(10);
            $table->string("gambar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_layanans');
    }
};
