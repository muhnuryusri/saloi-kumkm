<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarumkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarumkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_badan_usaha');
            $table->string('slug')->unique();
            $table->string('npwp');
            $table->text('deskripsi_usaha');
            $table->string('waktu_senin');
            $table->string('waktu_selasa');
            $table->string('waktu_rabu');
            $table->string('waktu_kamis');
            $table->string('waktu_jumat');
            $table->string('waktu_sabtu');
            $table->string('waktu_minggu');
            $table->text('deskripsi_produk_jasa');
            $table->text('alamat_badan_usaha');
            $table->string('email_usaha');
            $table->string('no_telpon');
            $table->string('website');
            $table->string('instagram');
            $table->string('tokopedia');
            $table->string('lazada');
            $table->string('bukalapak');
            $table->string('shopee');
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
        Schema::dropIfExists('daftarumkms');
    }
}
