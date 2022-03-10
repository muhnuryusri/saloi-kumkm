<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporankeuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporankeuangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_laporan');
            $table->string('slug');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('laporan');
            $table->integer('umkm_id');
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
        Schema::dropIfExists('laporankeuangan');
    }
}
