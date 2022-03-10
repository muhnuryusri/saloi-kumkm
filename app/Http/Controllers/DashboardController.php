<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Koperasi;
use App\Models\Produkumkm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $koperasi = Koperasi::all();
        $umkm = Umkm::all();
        $user = User::where('level', 2)->get();
        $produkumkm = Produkumkm::all();
        return view('back.dashboard',[
            'title'=>'Dashboard',
            'koperasi'=>$koperasi,
            'umkm'=>$umkm,
            'user'=>$user,
            'produkumkm'=>$produkumkm,
        ]);
    }
}
