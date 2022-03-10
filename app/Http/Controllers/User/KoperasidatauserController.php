<?php

namespace App\Http\Controllers\User;

use App\Models\Umkm;
use App\Models\Kategori;
use App\Models\Produkumkm;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use App\Models\Kategorikoperasi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KoperasidatauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $koperasi = Umkm::where('kategori_id', 2);
        $koperasi = $koperasi->where('user_id', $id)->get();
        return view('back.koperasidata.index', [
            'title' => 'Koperasi',
            'koperasi' => $koperasi,
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
    public function show($slug)
    {
        $umkm = Umkm::where('slug', $slug)->first();
        return view('back.umkm.index', [
            'title' => 'UMKM',
            'umkm' => $umkm,

            // 'umkm'=> Umkm::where('user_id',auth()->user()->id)->get(),
            'produkumkm' => Produkumkm::where('umkm_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coo =  $data['country'] = DB::table('provinces')->orderBy('name', 'asc')->get();
        $umkm = Umkm::find($id);
        $kategori = Kategori::all();
        $kategoriusaha = Kategoriusaha::all();
        $kategorikoperasi = Kategorikoperasi::all();

        return view('back.koperasidata.edit', [
            'umkm' => $umkm,
            'kategori' => $kategori,
            'kategoriusaha' => $kategoriusaha,
            'kategorikoperasi' => $kategorikoperasi,
            'title' => 'Umkm',
            'country' => $coo,
        ]);
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
        $umkm = Umkm::find($id);
        Storage::delete($umkm->gambar_struktur_organisasi);
        Storage::delete($umkm->gambar_sampul);
        Storage::delete($umkm->gambar_logo);
        $umkm->delete();
        return redirect()->route('koperasidatauser.index')->with(['success' => 'Data berhasil dihapus.']);
    
    }
}
