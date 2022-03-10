<?php

namespace App\Http\Controllers\adminumkm;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategoriusaha;
use App\Http\Controllers\Controller;

class KategoriumkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriusaha = Kategoriusaha::all();
        $kategori = Kategori::all();
        return view('back.kategori.index', [
            'title' => 'Kategori',
            'kategori' => $kategori,
            'kategoriusaha' => $kategoriusaha,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kategori.create', [
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

        return redirect()->route('kategoriumkm.index')->with(['success' => 'Data berhasil tersimpan']);
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
        $kategori = Kategoriusaha::find($id);
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

        $kategori = Kategoriusaha::findOrFail($id);
        $kategori->update($data);

        // Alert::info('Update', 'Data berhasil terupdate.');
        return redirect()->route('kategoriumkm.index')->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategoriusaha::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with(['success' => 'Data berhasil dihapus.']);
    }
}
