<?php

namespace App\Http\Controllers\User;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Koperasi;
use App\Models\Produkumkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboarduserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $koperasi =Umkm::where('kategori_id',1);
        $koperasi = $koperasi->where('user_id', $id)->get();
        $umkm = Umkm::where('kategori_id',2);
        $umkm = Umkm::where('user_id', $id)->get();
        $user = User::all();
        $produkumkm = Produkumkm::where('user_id',auth()->user()->id)->get();
        return view('back.dashboard',[
            'title'=>'Dashboard',
            'koperasi'=>$koperasi,
            'umkm'=>$umkm,
            'user'=>$user,
            'produkumkm'=>$produkumkm,
        ]);
    }

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
        //
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
