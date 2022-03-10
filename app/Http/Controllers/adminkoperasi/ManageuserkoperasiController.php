<?php

namespace App\Http\Controllers\adminkoperasi;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ManageuserkoperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level', 2)->get();
        return view('back.manageuser.index', [
            'title' => 'Managemen User',
            'user' => $users,
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
        $coo =  $data['country'] = DB::table('provinces')->orderBy('name', 'asc')->get();
        $user = User::find($id);
        return view('back.manageuser.edit', [
            'user' => $user,
            'country' => $coo,
        ]);
    }
    public function reset_password_user($id)
    {
        $current_user = User::findOrFail($id);
        $current_user->update([
            'password' => bcrypt('newpassword')
        ]);
        return redirect()->back()->with('success', 'Password succesfully updated');
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
            'no_ktp' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required'],
            'image' => 'image|file|max:5024',
            'alamat_rumah' => ['required', 'string', 'max:255'],
            'province_id' => ['required'],
            'regency_id' => ['required'],
            'district_id' => ['required'],
            'village_id' => ['required'],
            'no_telpon' => ['required', 'string', 'max:255'],
            'email' => 'unique:users,email,' . $id,
            'email' => 'required', 'string', 'email:dns', 'max:255', 'unique:users' . $id,
        ]);

        if ($request->file('image')) {
            if ($request->oldImages) {
                if ($request->oldImages) {
                    // public_path()::delete($request->oldImages);
                }
            }
            $newImageName = 'images/' . time() . '-' . request()->name . '.' . request()->image->extension();
            // $path=$request->file('image')->storeAs('images/',$newImageName);
            // $path=$request->file('image')->store('image');
        }
        request()->image->move(public_path('images'), $newImageName);
        $data['no_ktp'] = $request->no_ktp;
        $data['name'] = $request->name;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['image'] = $newImageName;
        $data['alamat_rumah'] = $request->alamat_rumah;
        $data['province_id'] = $request->province_id;
        $data['regency_id'] = $request->regency_id;
        $data['district_id'] = $request->district_id;
        $data['village_id'] = $request->village_id;
        $data['no_telpon'] = $request->no_telpon;
        $data['email'] = $request->email;

        $user = User::findOrFail($id);
        $user->update($data);
        // Alert::info('Update', 'Data berhasil terupdate.');
        return redirect()->route('home')->with(['success' => 'Data berhasil di update.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('manageuserkoperasi.index')->with(['success' => 'Data berhasil dihapus.']);

        // $post =Post::where('id',$post_id)->first();

        // if ($post != null) {
        //     $post->delete();
        //     return redirect()->route('dashboard')->with(['message'=> 'Successfully deleted!!']);
        // }

        // return redirect()->route('dashboard')->with(['message'=> 'Wrong ID!!']);    
    }
}
