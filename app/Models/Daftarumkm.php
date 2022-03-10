<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarumkm extends Model
{
    use HasFactory;
    protected $table="daftarumkms";
    protected $primaryKey="id";
    protected $fillable = [
        'nama_badan_usaha',
        'slug',
        'npwp',
        'deskripsi_usaha',
        'waktu_senin',
        'waktu_selasa',
        'waktu_rabu',
        'waktu_kamis',
        'waktu_jumat',
        'waktu_sabtu',
        'waktu_minggu',
        'deskripsi_produk_jasa',
        'alamat_badan_usaha',
        'email_usaha',
        'no_telpon',
        'website',
        'instagram',
        'tokopedia',
        'lazada',
        'bukalapak',
        'shopee',
    ];
}
