<?php

namespace App\Models;

use App\Models\Laporankeuangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umkm extends Model
{
    use HasFactory;
    protected $table = 'umkm';
    protected $guarded = ['id'];
    protected $hidden = [];
    
    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? $filters['search']:false){
        //     return $query->where('nama_badan_usaha','like','%'.$filters['search'].'%' )->orWhere('deskripsi_usaha','like','%'.$filters['search'].'%' );
        // }

        // $query->when($filters['search'] ?? false, function($query, $search){
        //     return $query->where('nama_badan_usaha','like','%'.$search.'%' )->orWhere('deskripsi_usaha','like','%'.$search.'%' );
        // });

        $query->when($filters['search'] ?? false, function($query, $search) {
           return $query->where(function($query) use ($search) {
                $query->where('nama_badan_usaha', 'like', '%' . $search . '%')
                            ->orWhere('deskripsi_usaha', 'like', '%' . $search . '%');
            });
        });
 
        $query->when($filters['kategori']??false, function($query, $kategori){
            return $query->whereHas('kategori', function($query) use($kategori){
                $query->where('slug',$kategori);
            });
        });

        $query->when($filters['kategoriusaha']??false, function($query, $kategoriusaha){
            return $query->whereHas('kategoriusaha', function($query) use($kategoriusaha){
                $query->where('slug',$kategoriusaha);
            });
        });
        // ----------------
       
        $query->when($filters['regency_id']??false, function($query, $regency_id){
            return $query->whereHas('regency', function($query) use($regency_id){
                $query->where('id', $regency_id);
            });
        });
        $query->when($filters['district_id']??false, function($query, $district_id){
            return $query->whereHas('district', function($query) use($district_id){
                $query->where('id',$district_id);
            });
        });
        $query->when($filters['village_id']??false, function($query, $village_id){
            return $query->whereHas('village', function($query) use($village_id){
                $query->where('id',$village_id);
            });
        });

    }
    
    public function kategori() 
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function kategoriusaha() 
    {
        return $this->belongsToMany(Kategoriusaha::class);
    }
    public function kategorikoperasi() 
    {
        return $this->belongsTo(Kategorikoperasi::class, 'kategorikoperasi_id', 'id');
    }
    public function produkumkm() 
    {
        return $this->hasMany(Produkumkm::class);
    }
    public function ratings() 
    {
        return $this->hasMany(Rating::class);
    }
    public function laporankeuangan() 
    {
        return $this->hasMany(Laporankeuangan::class);
    }
    public function province() 
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function regency() 
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }
    public function district() 
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function village() 
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
    
    public function users() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
