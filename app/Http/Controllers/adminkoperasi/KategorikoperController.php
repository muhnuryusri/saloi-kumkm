<?php

namespace App\Http\Controllers\adminkoperasi;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use App\Models\Kategorikoperasi;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KategorikoperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorikoperasi = Kategorikoperasi::all();
        $kategori = Kategori::all();
        return view('back.kategori.index', [
            'title' => 'Kategori',
            'kategori' => $kategori,
            'kategorikoperasi' => $kategorikoperasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kategori.createkategorikoperasi', [
            'title' => 'Kategori'
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
            'nama_kategori' => 'required|min:4'
        ]);
        $kategori = Kategoriusaha::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect()->route('kategorikoper.index')->with(['success' => 'Data berhasil tersimpan']);
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
        $kategori = Kategorikoperasi::find($id);
        return view('back.kategori.edit', [
            'kategori' => $kategori,
            'title' => 'Kategori'
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $kategori = Kategorikoperasi::findOrFail($id);
        $kategori->update($data);

        // Alert::info('Update', 'Data berhasil terupdate.');
        return redirect()->route('kategorikoper.index')->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategorikoperasi::find($id);
        $kategori->delete();
        return redirect()->route('kategorikoper.index')->with(['success2' => 'Data berhasil dihapus.']);
    }
}
