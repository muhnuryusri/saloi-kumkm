<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Rating;
use App\Models\Kategori;
use App\Models\Koperasi;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        $umkm = Umkm::where('status', 1)->orderBy('created_at','desc')->take(8)->get();
        $user = Auth::user();
       
        // foreach($umkm as $item);
        // $ratings = Rating::where('umkm_id', $item->id)->get();
        // $rating_sum = Rating::where('umkm_id', $item->id)->sum('stars_rated');
        // $user_rating = Rating::where('umkm_id', $item->id)->where('user_id', Auth::id())->first();

        // if ($ratings->count() > 0) {
        //     $rating_value = $rating_sum / $ratings->count();
        // } else {
        //     $rating_value = 0;
        // }
        
       
        return view('home',[
            'title'=>'Home',
            'umkm' => $umkm,
            'user' => $user,
            // 'ratings' => $ratings,
            // 'rating_value' => $rating_value,
            // 'user_rating' => $user_rating,
        ]);
        
    }
    
    public function listumkm()
    {
        
        $coo2 =  $data['state'] = DB::table('regencies')->where('province_id',82)->orderBy('name', 'asc')->get();
        $listkategoriusaha=Kategoriusaha::all();
        $kategori=Kategori::all();
        $umkm = Umkm::latest()->where('status', 1);
        $umkmb = Umkm::latest()->where('status', 1)->get();
        // $umkm = $umkms->where('status', 1);
    //     foreach ($umkmb as $item){
    //     $ratings = Rating::where('umkm_id', $item->id)->get();
    //     $rating_sum = Rating::where('umkm_id', $item->id)->sum('stars_rated');
    //     $user_rating = Rating::where('umkm_id', $item->id)->where('user_id', Auth::id())->first();

    //     if ($ratings->count() > 0) {
    //         $rating_value = $rating_sum / $ratings->count();
    //     } else {
    //         $rating_value = 0;
    //     }
    // };
        
        // dd($umkm);
        
        // dd($umkm);
        return view('list-umkm',[
            'title'=>'list umkm',
            'umkm' => $umkm->filter(request(['search','kategori','kategoriusaha', 'kategorikoperasi', 'regency_id', 'district_id', 'village_id']))->paginate(10),
            'listkategoriusaha'=>$listkategoriusaha,
            'state'=>$coo2,
            'kategori' => $kategori, 
            // 'ratings' => $ratings,
            // 'rating_value' => $rating_value,
            // 'user_rating' => $user_rating,
             
        ]);
        
    }

    public function titik(){
     $umkm = Umkm::latest()->where('status', 1)->get();
        
        return json_encode($umkm);

    } 
    
    public function detailumkm($slug){
        $umkm = Umkm::where('slug', $slug)->first();
        $ratings = Rating::where('umkm_id',$umkm->id)->get();
        $rating_sum = Rating::where('umkm_id', $umkm->id)->sum('stars_rated');
        $user_rating = Rating::where('umkm_id', $umkm->id)->where('user_id',Auth::id())->first();

        if($ratings->count()>0) {
            $rating_value = $rating_sum/$ratings->count();
        }else {
            $rating_value = 0;
        }
         

        return view('back.umkm.index',[
            'title'=>'Detail',
            'umkm' => $umkm,
            'ratings' => $ratings,
            'rating_value' => $rating_value,
            'user_rating' => $user_rating,
        ]);
    }
    
    public function detailkoperasi($slug){
       $umkm = Umkm::where('slug', $slug)->first();
        
        return view('back.umkm.index',[
            'title'=>'Detail',
            'umkm' => $umkm,
        ]);
    }
    
}
