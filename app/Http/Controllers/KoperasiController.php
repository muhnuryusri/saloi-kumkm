<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Kategori;
use App\Models\Koperasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use App\Models\Kategorikoperasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KoperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.koperasi.index', [
            'title' => 'koperasi',
            'koperasi' => Koperasi::where('user_id', auth()->user()->id)->get(),

        ]);
    }

    public function detailkoperasi()
    {

        return view('back.koperasi.index', [
            'title' => 'detail koperasi',
            'koperasi' => Koperasi::where('user_id', auth()->user()->id)->get(),
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
        $koperasi = Koperasi::where('user_id', auth()->user()->id)->get();
        $kategori = Kategori::all();
        $kategorikoperasi = Kategorikoperasi::all();

        return view('back.koperasi.create', [
            'title' => 'Daftar koperasi',
            'kategori' => $kategori,
            'kategorikoperasi' => $kategorikoperasi,
            'koperasi' => $koperasi,
            'country' => $coo

        ]);
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
            'nama_koperasi' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_koperasi);
        $data['user_id'] = Auth::id();
        $data['status'] = 0;
        $data['gambar_sampul'] = $request->file('gambar_sampul')->store('koperasi');
        $data['gambar_logo'] = $request->file('gambar_logo')->store('koperasi');
        $data['gambar_strukturorganisasi'] = $request->file('gambar_strukturorganisasi')->store('koperasi');

        Koperasi::create($data);
        return view('back.koperasi.selesaikoperasi');
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
        $this->validate($request, [
            'nama_badan_usaha' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_badan_usaha);
        $data['user_id'] = $request->user_id;
        $data['produkumkm_id'] = $request->produkumkm_id;
        $data['status'] = $request->status;
        if ($request->file('gambar_struktur_organisasi')) {
            if ($request->oldImageStrukturorganisasi) {
                Storage::delete($request->oldImageSampul);
            }
            $data['gambar_struktur_organisasi'] = $request->file('gambar_struktur_organisasi')->store('koperasi');
        }
        if ($request->file('gambar_sampul')) {
            if ($request->oldImageSampul) {
                Storage::delete($request->oldImageSampul);
            }
            $data['gambar_sampul'] = $request->file('gambar_sampul')->store('koperasi');
        }
        if ($request->file('gambar_logo')) {
            if ($request->oldImageLogo) {
                Storage::delete($request->oldImageLogo);
            }
            $data['gambar_logo'] = $request->file('gambar_logo')->store('koperasi');
        }
        $umkm = Umkm::findOrFail($id);
        $umkm->update($data);
        // Alert::info('Update', 'Data berhasil terupdate.');
        if (auth()->user()->level == 1) {
            return redirect()->route('koperasidata.index')->with(['success' => 'Data berhasil di update.']);
        } elseif (auth()->user()->level == 2) {
            return redirect()->route('koperasidatauser.index')->with(['success' => 'Data berhasil di update.']);
        } elseif (auth()->user()->level == 3) {
            return redirect()->route('adminumkm.index')->with(['success' => 'Data berhasil di update.']);
        } elseif (auth()->user()->level == 4) {
            return redirect()->route('adminkoperasi.index')->with(['success' => 'Data berhasil di update.']);
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
        $koperasi = Umkm::find($id);
        Storage::delete($koperasi->gambar_struktur_organisasi);
        $koperasi->delete();

        if (auth()->user()->level == 1) {
            return redirect()->route('koperasidata.index')->with(['success' => 'Data berhasil dihapus.']);
        } elseif (auth()->user()->level == 2) {
            return redirect()->route('koperasidatauser.index')->with(['success' => 'Data berhasil dihapus.']);
        } elseif (auth()->user()->level == 3) {
            return redirect()->route('adminumkm.index')->with(['success' => 'Data berhasil dihapus.']);
        } elseif (auth()->user()->level == 4) {
            return redirect()->route('adminkoperasi.index')->with(['success' => 'Data berhasil dihapus.']);
        }
    }
}
