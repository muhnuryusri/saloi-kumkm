<?php

namespace App\Http\Controllers\Admin;

use App\Models\Umkm;
use App\Models\Kategori;
use App\Models\Koperasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use App\Models\Kategorikoperasi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

class KoperasidataController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    
    public function index()
    {
        
        $koperasi = Umkm::where('kategori_id',2)->get();
        return view('back.koperasidata.index',[
            'title'=>'Koperasi',
            'koperasi' => $koperasi,
        ]);
        // $umkm = Umkm::all();
        // $koperasi = Koperasi::all();
        // return view('back.umkmdata.index',[
            //     'title'=>'Admin',
            //     'umkm' => $umkm,
            //     'koperasi' => $koperasi,
            
            // ]);
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
            $coo=  $data['country']= DB::table('provinces')->orderBy('name','asc')->get();
            $umkm = Umkm::find($id);
            $kategori = Kategori::all();
            $kategoriusaha = Kategoriusaha::all();
            $kategorikoperasi = Kategorikoperasi::all();
            
            return view('back.koperasidata.edit', [
                'umkm'=>$umkm,
                'kategori'=>$kategori,
                'kategoriusaha'=>$kategoriusaha,
                'kategorikoperasi'=>$kategorikoperasi,
                'title'=>'Umkm',
                'country'=>$coo,
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
            $this->validate($request, [
                'nama_badan_usaha'=>'required|min:4',
            ]);
            
            $data = $request->all();
            $data['slug'] = Str::slug($request->nama_badan_usaha);
            $data['user_id'] = $request->user_id;
            $data['produkumkm_id'] = $request->produkumkm_id;
            $data['status'] = 0;
            if($request->file('gambar_struktur_organisasi')){
                if($request->oldImageStrukturorganisasi){
                    Storage::delete($request->oldImageSampul);
                }
                $data['gambar_struktur_organisasi'] = $request->file('gambar_struktur_organisasi')->store('umkm');
            }
            if($request->file('gambar_sampul')){
                if($request->oldImageSampul){
                    Storage::delete($request->oldImageSampul);
                }
                $data['gambar_sampul'] = $request->file('gambar_sampul')->store('umkm');
            }
            if($request->file('gambar_logo')){
                if($request->oldImageLogo){
                    Storage::delete($request->oldImageLogo);
                }
                $data['gambar_logo'] = $request->file('gambar_logo')->store('umkm');
            }
            $umkm = Umkm::findOrFail($id);
            $umkm->update($data);
            // Alert::info('Update', 'Data berhasil terupdate.');
            return redirect()->route('koperasidata.index')->with(['success' => 'Data berhasil di update.']);
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $koperasi = Umkm::find($id);
            $koperasi->delete();
            return redirect()->route('koperasidata.index')->with(['success' => 'Data berhasil dihapus.']);
        }
    }
    