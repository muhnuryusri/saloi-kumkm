<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Produkumkm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukumkmController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    // public function index()
    // {
    //     $umkm = Umkm::where('slug', $slug)->first();
    //     $produkumkm = Produkumkm::where('umkm_id',$umkm->id);
    //     return view('back.produkumkm.index',[
    //         'title'=>'produk umkm',
    //         'produkumkm' => $produkumkm
    //     ]);
    // }
    public function produk($id)
    {
        $umkm = Umkm::where('id', $id)->first();
        return view('back.produkumkm.index',[
            'title'=>'produk umkm',
            'umkm'=>$umkm
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
        $this->validate($request, [
            'nama_produk'=>'required|min:4',
        ]);
        
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_produk);
        $data['user_id'] = Auth::id();
        // $data['umkm_id'] = Auth::id();
        $data['gambar_produk'] = $request->file('gambar_produk')->store('umkm');
        
        Produkumkm::create($data);
        $id = $request->umkm_id;
        return redirect()->route('produk',$id);
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
        $produkumkm = Produkumkm::find($id);
        Storage::delete($produkumkm->gambar_produk);
        $produkumkm->delete();
        
        return redirect()->back()->with(['success' => 'Data berhasil dihapus.']);
    }
}
