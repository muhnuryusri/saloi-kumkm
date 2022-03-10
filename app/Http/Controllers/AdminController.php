<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Rating;
use App\Models\Kategori;
use App\Models\Koperasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $umkm = Umkm::all();
        $koperasi = Koperasi::all();
        return view('admin.index', [
            'title' => 'Admin',
            'umkm' => $umkm,
            'koperasi' => $koperasi,

        ]);
    }

    public function detailumkm($slug)
    {
        $umkm = Umkm::where('slug', $slug)->first();
        $ratings = Rating::where('umkm_id', $umkm->id)->get();
        $rating_sum = Rating::where('umkm_id', $umkm->id)->sum('stars_rated');
        $user_rating = Rating::where('umkm_id', $umkm->id)->where('user_id', Auth::id())->first();

        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        return view('admin.detailumkm', [
            'title' => 'Admin',
            'umkm' => $umkm,
            'ratings' => $ratings,
            'rating_value' => $rating_value,
            'user_rating' => $user_rating,
        ]);
    }

    public function detailkoperasi($slug)
    {
        $koperasi = Umkm::where('slug', $slug)->first();
        $ratings = Rating::where('umkm_id', $koperasi->id)->get();
        $rating_sum = Rating::where('umkm_id', $koperasi->id)->sum('stars_rated');
        $user_rating = Rating::where('umkm_id', $koperasi->id)->where('user_id', Auth::id())->first();

        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        return view('admin.detailkoperasi', [
            'title' => 'Admin',
            'koperasi' => $koperasi,
            'ratings' => $ratings,
            'rating_value' => $rating_value,
            'user_rating' => $user_rating,
        ]);
    }
    // public function laporankeuangan($slug){

    //     // return view('back.koperasidata.laporan-keuangan',[
    //         $koperasi=Umkm::all();
    //         return view('back.laporankeuangan.index',[
    //         'title'=>'Koperasi',
    //         'koperasi'=>$koperasi,
    //     ]);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (auth()->user()->level == 1) {
            if ($request->kategori == 1) {
                $umkm = Umkm::findOrFail($id);
                $umkm->update($data);
                return redirect()->route('umkmdata.index');
            }
            if ($request->kategori == 2) {
                $koperasi = Umkm::findOrFail($id);
                $koperasi->update($data);
                return redirect()->route('koperasidata.index');
            }
        } elseif (auth()->user()->level == 3) {
            $umkm = Umkm::findOrFail($id);
            $umkm->update($data);
            return redirect()->route('adminumkm.index');
        } elseif (auth()->user()->level == 4) {
            $koperasi = Umkm::findOrFail($id);
            $koperasi->update($data);
            return redirect()->route('adminkoperasi.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
