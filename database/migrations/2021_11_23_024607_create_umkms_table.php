<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_badan_usaha');
            $table->integer('kategori_id');
            $table->integer('kategoriusaha_id')->nullable();
            $table->integer('kategorikoperasi_id')->nullable();
            $table->integer('user_id');
            $table->string('slug')->unique();
            $table->string('gambar_sampul');
            $table->string('gambar_logo');
            $table->string('gambar_struktur_organisasi')->nullable();
            $table->string('npwp');
            $table->string('nib')->nullable();
            $table->string('modal_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('omzet_tahunan')->nullable();
            $table->text('deskripsi_usaha');
            $table->string('waktu_senin');
            $table->string('waktu_selasa');
            $table->string('waktu_rabu');
            $table->string('waktu_kamis');
            $table->string('waktu_jumat');
            $table->string('waktu_sabtu');
            $table->string('waktu_minggu');
            $table->text('deskripsi_produk_jasa')->nullable();
            $table->text('alamat_badan_usaha');
            $table->bigInteger('province_id');
            $table->bigInteger('regency_id');
            $table->bigInteger('district_id');
            $table->bigInteger('village_id');
            $table->string('latitude');
            $table->string('longtitude');
            $table->string('email_usaha');
            $table->string('no_telpon');
            $table->string('website');
            $table->string('instagram');
            $table->string('tokopedia')->nullable();
            $table->string('lazada')->nullable();
            $table->string('bukalapak')->nullable();
            $table->string('shopee')->nullable();
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
        Schema::dropIfExists('umkm');
    }
}
