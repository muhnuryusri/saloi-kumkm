<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    		DB::table('umkm')->insert([
            'nama_badan_usaha' => $faker->company,
            'kategori_id' => $faker->numberBetween(1,2),
            // 'kategoriusaha_id'=> $faker->numberBetween(1,5),
            'kategorikoperasi_id'=> $faker->numberBetween(1,5),
            'user_id' => $faker->numberBetween(2,4),
            'slug'=> $faker->slug,
            'gambar_sampul' => $faker->imageUrl($width = 640, $height = 480),
            'gambar_logo' => $faker->imageUrl($width = 640, $height = 480),
            'gambar_struktur_organisasi'=> $faker->imageUrl($width = 640, $height = 480),
            'npwp' => $faker->creditCardNumber,
            'omzet_tahunan'=> $faker->numberBetween(1000,500000),
            'deskripsi_usaha'=>$faker->sentence($nbWords = 86, $variableNbWords = true),
            'waktu_senin' => $faker->time($format = 'H:i:s', $max = 'now'),
            'waktu_selasa' => $faker->time($format = 'H:i:s', $max = 'now'),
            'waktu_rabu' => $faker->time($format = 'H:i:s', $max = 'now'),
            'waktu_kamis' => $faker->time($format = 'H:i:s', $max = 'now'),
            'waktu_jumat' => $faker->time($format = 'H:i:s', $max = 'now'),
            'waktu_sabtu' => $faker->time($format = 'H:i:s', $max = 'now'),
            'waktu_minggu' => $faker->time($format = 'H:i:s', $max = 'now'),
            'deskripsi_produk_jasa'=>$faker->sentence($nbWords = 56, $variableNbWords = true),
            'alamat_badan_usaha'=>$faker->address,
            'province_id'=> 34,
            'regency_id'=> 3401,
            'district_id'=> 3401070,
            'village_id'=> 34010070006,
            'latitude' => $faker->longitude($min = -180, $max = 180),
            'longtitude' => $faker->latitude($min = -90, $max = 90),
            'email_usaha' => $faker->email,
            'no_telpon' => $faker->phoneNumber,
            'website' => $faker->domainName,
            'instagram' => $faker->domainName,
            'tokopedia'=> $faker->domainName,
            'lazada'=> $faker->domainName,
            'bukalapak'=> $faker->domainName,
            'shopee'=> $faker->domainName,
            'status'=> $faker->numberBetween(0,1),
    		]);
 
    	}
    }
}
