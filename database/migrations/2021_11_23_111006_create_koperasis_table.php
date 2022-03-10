<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoperasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('koperasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_koperasi');
            $table->integer('kategori_id');
            $table->integer('kategorikoperasi_id');
            $table->integer('user_id');
            $table->string('slug')->unique();
            $table->string('gambar_sampul');
            $table->string('gambar_logo');
            $table->string('npwp');
            $table->text('detail_koperasi');
            $table->string('waktu_senin');
            $table->string('waktu_selasa');
            $table->string('waktu_rabu');
            $table->string('waktu_kamis');
            $table->string('waktu_jumat');
            $table->string('waktu_sabtu');
            $table->string('waktu_minggu');
            $table->text('deskripsi_koperasi');
            $table->string('gambar_strukturorganisasi');
            $table->text('alamat_koperasi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('latitude');
            $table->string('longtitude');
            $table->string('email_usaha');
            $table->string('no_telpon');
            $table->string('website');
            $table->string('instagram');
            $table->boolean('status');
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
        Schema::dropIfExists('koperasi');
    }
}
