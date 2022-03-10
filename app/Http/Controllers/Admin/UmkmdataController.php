<?php

namespace App\Http\Controllers\Admin;

use App\Models\Umkm;
use App\Models\Kategori;
use App\Models\Koperasi;
use App\Models\Produkumkm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kategoriusaha_umkm;
use Illuminate\Support\Facades\Storage;

class UmkmdataController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $umkm = Umkm::where('kategori_id',1)->get();
        return view('back.umkmdata.index',[
            'title'=>'Umkm',
            'umkm' => $umkm,
        ]);
    }
    public function verifikasi(Request $request, $id)
    {
        $data = $request->all();

        if ($request->kategori == 1) {
            $umkm = Umkm::findOrFail($id);
            $umkm->update($data);

            return redirect()->route('umkmdata.index');
        } elseif ($request->kategori == 2) {
            $koperasi = Koperasi::findOrFail($id);
            $koperasi->update($data);

            return redirect()->route('koperasidata.index');
        }
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
            $coo=  $data['country']=DB::table('provinces')->orderBy('name','asc')->get();
            $umkm = Umkm::find($id);
            $kategori = Kategori::all();
            $kategoriusaha = Kategoriusaha::all();
            $kategoriusaha_umkm = Kategoriusaha_umkm::where('umkm_id',$umkm->id)->get();
            
            return view('back.umkmdata.edit', [
                'umkm'=>$umkm,
                'kategori'=>$kategori,
                'kategoriusaha'=>$kategoriusaha,
                'kategoriusaha_umkm'=>$kategoriusaha_umkm,
                'title'=>'Umkm',
                'country'=>$coo
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
            'nama_badan_usaha' => 'required|min:4',
            'gambar_sampul' => 'image|file',
            'gambar_logo' => 'image|file',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_badan_usaha);
        $data['user_id'] = $request->user_id;
        $data['produkumkm_id'] = $request->produkumkm_id;
        $data['status'] = $request->status;
        if ($request->file('gambar_struktur_organisasi')) {
            if ($request->oldImageStrukturorganisasi) {
                Storage::delete($request->oldImageStrukturorganisasi);
            }
            $data['gambar_struktur_organisasi'] = $request->file('gambar_struktur_organisasi')->store('umkm');
        }
        if ($request->file('gambar_sampul')) {
            if ($request->oldImageSampul) {
                Storage::delete($request->oldImageSampul);
            }
            $data['gambar_sampul'] = $request->file('gambar_sampul')->store('umkm');
        }
        if ($request->file('gambar_logo')) {
            if ($request->oldImageLogo) {
                // return $request->oldImageLogo;
                Storage::delete($request->oldImageLogo);
            }
            $data['gambar_logo'] = $request->file('gambar_logo')->store('umkm');
        }
        $umkm = Umkm::findOrFail($id);
        $umkm->update($data);
        // Alert::info('Update', 'Data berhasil terupdate.');
            return redirect()->route('umkmdata.index')->with(['success' => 'Data berhasil di update.']);
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
            return redirect()->route('umkmdata.index')->with(['success' => 'Data berhasil dihapus.']);
        }
    }
    