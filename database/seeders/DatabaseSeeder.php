<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Kategoriusaha;
use Illuminate\Database\Seeder;
use App\Models\Kategorikoperasi;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();

        Kategori::create([
            'nama_kategori'=>'UMKM',
            'slug'=>'umkm',
        ]);

        Kategori::create([
            'nama_kategori'=>'Koperasi',
            'slug'=>'koperasi',
        ]);

        Kategoriusaha::create([
            'nama_kategori'=>'Pertanian',
            'slug'=>'pertanian',
        ]);
        Kategoriusaha::create([
            'nama_kategori'=>'Pendidikan',
            'slug'=>'pendidikan',
        ]);
        Kategoriusaha::create([
            'nama_kategori'=>'Pariwisata',
            'slug'=>'pariwisata',
        ]);
        Kategoriusaha::create([
            'nama_kategori'=>'Fashion',
            'slug'=>'fashion',
        ]);
        Kategoriusaha::create([
            'nama_kategori'=>'Otomotif',
            'slug'=>'otomotif',
        ]);
        Kategoriusaha::create([
            'nama_kategori'=>'Kedai/Cafe',
            'slug'=>'kedai-cafe',
        ]);
        Kategoriusaha::create([
            'nama_kategori'=>'Jasa',
            'slug'=>'jasa',
        ]);

        Kategorikoperasi::create([
            'nama_kategori'=>'Koperasi simpan pinjam',
            'slug'=>'koperasi-simpan-pinjam',
        ]);
        Kategorikoperasi::create([
            'nama_kategori'=>'Koperasi konsumen',
            'slug'=>'koperasi-konsumen',
        ]);
        Kategorikoperasi::create([
            'nama_kategori'=>'Koperasi produsen',
            'slug'=>'koperasi-produsen',
        ]);
        Kategorikoperasi::create([
            'nama_kategori'=>'Koperasi pemasaran',
            'slug'=>'koperasi-pemasaran',
        ]);
        Kategorikoperasi::create([
            'nama_kategori'=>'Koperasi jasa',
            'slug'=>'koperasi-jasa',
        ]);

        // User::create([
        //     'no_ktp' => '0987645323',
        //     'name' => 'admin',
        //     'tempat_lahir' => 'makassar',
        //     'tgl_lahir' => '2021-12-15',
        //     'image' => 'images/1639401287-cfh.jpg',
        //     'alamat_rumah' => 'jl. dg tata',
        //     'province_id' => '31',
        //     'regency_id' => '3171',
        //     'district_id' => '3171020',
        //     'village_id' => '3171020007',
        //     'no_telpon' => '082345678909',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'level' => '1',
        // ]);
        // User::create([
        //     'no_ktp' => '0987645323',
        //     'name' => 'user',
        //     'tempat_lahir' => 'makassar',
        //     'tgl_lahir' => '2021-12-15',
        //     'image' => 'images/1639401287-cfh.jpg',
        //     'alamat_rumah' => 'jl. dg tata',
        //     'province_id' => '31',
        //     'regency_id' => '3171',
        //     'district_id' => '3171020',
        //     'village_id' => '3171020007',
        //     'no_telpon' => '082345678909',
        //     'email' => 'user@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'level' => '2',
        // ]);
        // User::create([
        //     'no_ktp' => '0987645323',
        //     'name' => 'siti',
        //     'tempat_lahir' => 'makassar',
        //     'tgl_lahir' => '2021-12-15',
        //     'image' => 'images/1639401287-cfh.jpg',
        //     'alamat_rumah' => 'jl. dg tata',
        //     'province_id' => '31',
        //     'regency_id' => '3171',
        //     'district_id' => '3171020',
        //     'village_id' => '3171020007',
        //     'no_telpon' => '082345678909',
        //     'email' => 'siti@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'level' => '2',
        // ]);
        // User::create([
        //     'no_ktp' => '0987645323',
        //     'name' => 'budi',
        //     'tempat_lahir' => 'makassar',
        //     'tgl_lahir' => '2021-12-15',
        //     'image' => 'images/1639401287-cfh.jpg',
        //     'alamat_rumah' => 'jl. dg tata',
        //     'province_id' => '31',
        //     'regency_id' => '3171',
        //     'district_id' => '3171020',
        //     'village_id' => '3171020007',
        //     'no_telpon' => '082345678909',
        //     'email' => 'budi@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'level' => '2',
        // ]);
        // User::create([
        //     'no_ktp' => '0987645323',
        //     'name' => 'admin_umkm',
        //     'tempat_lahir' => 'makassar',
        //     'tgl_lahir' => '2021-12-15',
        //     'image' => 'images/1639401287-cfh.jpg',
        //     'alamat_rumah' => 'jl. dg tata',
        //     'province_id' => '31',
        //     'regency_id' => '3171',
        //     'district_id' => '3171020',
        //     'village_id' => '3171020007',
        //     'no_telpon' => '082345678909',
        //     'email' => 'admin_umkm@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'level' => '3',
        // ]);
        // User::create([
        //     'no_ktp' => '0987645323',
        //     'name' => 'admin_koperasi',
        //     'tempat_lahir' => 'makassar',
        //     'tgl_lahir' => '2021-12-15',
        //     'image' => 'images/1639401287-cfh.jpg',
        //     'alamat_rumah' => 'jl. dg tata',
        //     'province_id' => '31',
        //     'regency_id' => '3171',
        //     'district_id' => '3171020',
        //     'village_id' => '3171020007',
        //     'no_telpon' => '082345678909',
        //     'email' => 'admin_koperasi@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'level' => '4',
        // ]);
    }
}
