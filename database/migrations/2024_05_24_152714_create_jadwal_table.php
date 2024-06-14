<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    public function up()
    {
        Schema::create('Jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 100);
            $table->text('deskripsi');
            $table->string('dosis', 1000);
            $table->string('Jadwal_minum');
            $table->string('kategori', 50);
            $table->string('gambar', 300);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Jadwal');
    }
}
