<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Laporankeuangan;
use Illuminate\Support\Facades\Storage;

class LaporankeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $umkm = Umkm::where('id', $id)->first();
        $laporankeuangan = Laporankeuangan::all();
        return view('back.laporankeuangan.index', [
            'title' => 'Koperasi',
            'laporankeuangan' => $laporankeuangan,
        ]);
    }
    public function laporankoperasi($id)
    {
        $umkm = Umkm::where('id', $id)->first();
        return view('back.laporankeuangan.index', [
            'title' => 'Koperasi',
            'umkm' => $umkm,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // return('h');
        $umkm = Umkm::where('id', $id)->first();
        return view('back.laporankeuangan.create', [
            'title' => 'Koperasi',
            'umkm' => $umkm,
        ]);
    }
    public function download(Request $request,$laporan)
    {

        return response()->download(asset('storage/'.$laporan));
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
            'nama_laporan' => 'required|min:4',
            'bulan' => 'required',
            'tahun' => 'required',
            'laporan' => 'max:50000|mimes:xlsx,doc,docx,ppt,pptx,pdf',
            'umkm_id' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_laporan);
        $data['umkm_id'] = $request->umkm_id;

        if ($request->file('laporan')) {
            $data['laporan'] = $request->file('laporan')->store('umkm');
        }
        Laporankeuangan::create($data);
        $id = $request->umkm_id;
        return redirect()->route('laporankoperasi',$id)->with(['success' => 'Data berhasil tersimpan']);
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
        $laporankeuangan = Laporankeuangan::find($id);
        return view('back.laporankeuangan.edit', [
            'laporankeuangan' => $laporankeuangan,
            'title' => 'Koperasi'
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
            'nama_laporan' => 'required|min:4',
            'bulan' => 'required',
            'tahun' => 'required',
            'laporan' => 'max:50000|mimes:xlsx,doc,docx,ppt,pptx',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_laporan);
        $data['umkm_id'] = 2;

        if ($request->file('laporan')) {
            $data['laporan'] = $request->file('laporan')->store('umkm');
        }
        Laporankeuangan::create($data);
        return redirect()->route('laporankoperasi',$id)->with(['success' => 'Data berhasil tersimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporankeuangan = Laporankeuangan::find($id);
        Storage::delete($laporankeuangan->laporan);
        $laporankeuangan->delete();
        return redirect()->route('laporankoperasi',$id)->with(['success' => 'Data berhasil dihapus.']);
    }
}
