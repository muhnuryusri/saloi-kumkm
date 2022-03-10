<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function index(Request $request){
		$data['country']=DB::table('provinces')->orderBy('name','asc')->get();
		return view('index',$data);
	}
	
	public function getState(Request $request){
		$cid=$request->post('cid');
		$state=DB::table('regencies')->where('province_id',$cid)->orderBy('name','asc')->get();
		$html='<option value="">Pilih Kabupaten/Kota';
		foreach($state as $list){
		$html.='<option value="'.$list->id.'" >'.strtolower($list->name).'</option>';
		}
		echo $html;
	}
	
	public function getCity(Request $request){
		$sid=$request->post('sid');
		$city=DB::table('districts')->where('regency_id',$sid)->orderBy('name','asc')->get();
		$html='<option value="">Pilih Kecamatan</option>';
		foreach($city as $list){
			$html.='<option value="'.$list->id.'">'.strtolower($list->name).'</option>';
		}
		echo $html;
	}
	public function getVillage(Request $request){
		$sid=$request->post('sid');
		$village=DB::table('villages')->where('district_id',$sid)->orderBy('name','asc')->get();
		$html='<option value="">Pilih Kelurahan</option>';
		foreach($village as $list){
			$html.='<option value="'.$list->id.'">'.strtolower($list->name).'</option>';
		}
		echo $html;
	}
}
