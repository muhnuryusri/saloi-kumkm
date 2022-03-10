<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Rating;
use App\Models\Kategori;
use App\Models\Produkumkm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use App\Models\Kategoriusaha_umkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mockery\Undefined;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   return $umkm =  Umkm::where('user_id',auth()->user()->id)->get();

        $umkm = Umkm::where('user_id', auth()->user()->id)->first();
        $produkumkm = Produkumkm::where('umkm_id', auth()->user()->id)->get();
        $ratings = Rating::where('umkm_id', $umkm->id)->get();
        $rating_sum = Rating::where('umkm_id', $umkm->id)->sum('stars_rated');
        $user_rating = Rating::where('umkm_id', $umkm->id)->where('user_id', Auth::id())->first();

        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
         
        return view('back.umkm.index', [
            'title' => 'UMKM',
            'umkm' => $umkm,
            'produkumkm' => $produkumkm,
            'ratings' => $ratings,
            'rating_value' => $rating_value,
            'user_rating' => $user_rating,
        ]);
    }

    public function detailusaha()
    {

        $umkm = Umkm::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->take(1)->first();
        $ratings = Rating::where('umkm_id', $umkm->id)->get();
        $rating_sum = Rating::where('umkm_id', $umkm->id)->sum('stars_rated');
        $user_rating = Rating::where('umkm_id', $umkm->id)->where('user_id', Auth::id())->first();

        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
        return view('back.umkm.index', [
            'title' => 'UMKM',
            'umkm' => $umkm,
            'ratings' => $ratings,
            'rating_value' => $rating_value,
            'user_rating' => $user_rating,
            // 'umkm'=> Umkm::where('user_id',auth()->user()->id)->get(),
            'produkumkm' => Produkumkm::where('umkm_id', auth()->user()->id)->get(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $coo =  $data['country'] = DB::table('provinces')->orderBy('name', 'asc')->get();
        $umkm = Umkm::where('user_id', auth()->user()->id)->get();
        $kategori = Kategori::all();
        $kategoriusaha = Kategoriusaha::all();

        return view('back.umkm.create', [
            'title' => 'Daftar UMKM',
            'kategori' => $kategori,
            'kategoriusaha' => $kategoriusaha,
            'umkm' => $umkm,
            'country' => $coo

        ]);



        // if ($umkm->count()){
        //     return redirect()->route('umkm.index');
        // } else {
        //     return view('back.umkm.create', [
        //         'title' => 'Daftar UMKM',
        //         'kategori' => $kategori,
        //         'kategoriusaha' => $kategoriusaha,
        //         'umkm' => $umkm,

        //     ]);
        // }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return($request);
        $this->validate($request, [
            'slug' => 'unique:umkm,slug',
        ]);

        $data = $request->all();
        // return $data;
        $data['slug'] = Str::slug($request->nama_badan_usaha);
        $data['user_id'] = Auth::id();
        $data['produkumkm_id'] = Auth::id();
        $data['status'] = 0;
        $data['gambar_sampul'] = $request->file('gambar_sampul')->store('umkm');
        $data['gambar_logo'] = $request->file('gambar_logo')->store('umkm');
        if ($request->file('gambar_struktur_organisasi')) {
            $data['gambar_struktur_organisasi'] = $request->file('gambar_struktur_organisasi')->store('umkm');
        }
        $umkm = Umkm::create($data);
if($request->kategoriusahas){
     if (is_countable($data['kategoriusahas']) && count($data['kategoriusahas']) > 0) {
            foreach ($data['kategoriusahas'] as $item => $value) {
                $data2 = array(
                    'umkm_id' => $umkm->id,
                    'kategoriusaha_id' => $data['kategoriusahas'][$item],
                );
                Kategoriusaha_umkm::create($data2);
            }
        }
}
       

        //  if($request->tutup == "Tutup"){
        //     $data['waktu_senin']="Tutup";
        // } elseif($request->tutup == "Buka") {
        //     $jambuka = $request->jam_buka;
        //     $jamtutup = $request->jam_tutup;
        //     $data['waktu_senin']=$jambuka ." - " .$jamtutup;
        // }
        
            return view('back.umkm.selesaiumkm', []);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $umkm = Umkm::all();
        return view('back.umkm.index', [
            'title' => 'UMKM',
            'umkm' => $umkm
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
        $data['status']= $request->status;
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
        if (auth()->user()->level == 1) {
            return redirect()->route('umkmdata.index')->with(['success' => 'Data berhasil di update.']);
        } elseif (auth()->user()->level == 2) {
            return redirect()->route('umkmdatauser.index')->with(['success' => 'Data berhasil di update.']);
        } elseif (auth()->user()->level == 3) {
            return redirect()->route('adminumkm.index')->with(['success' => 'Data berhasil di update.']);
        } elseif (auth()->user()->level == 4) {
            return redirect()->route('adminkoper.index')->with(['success' => 'Data berhasil di update.']);
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
        $umkm = Umkm::find($id);
        Storage::delete($umkm->gambar_struktur_organisasi);
        Storage::delete($umkm->gambar_sampul);
        Storage::delete($umkm->gambar_logo);
        $umkm->delete();
       
        if (auth()->user()->level == 1) {
            return redirect()->route('umkmdata.index')->with(['success' => 'Data berhasil dihapus.']);
        } elseif (auth()->user()->level == 2) {
            return redirect()->route('umkmdatauser.index')->with(['success' => 'Data berhasil dihapus.']);

        } elseif (auth()->user()->level == 3) {
            return redirect()->route('adminumkm.index')->with(['success' => 'Data berhasil dihapus.']);

        } elseif (auth()->user()->level == 4) {
            return redirect()->route('adminkoper.index')->with(['success' => 'Data berhasil dihapus.']);

        }
    
    }
}
