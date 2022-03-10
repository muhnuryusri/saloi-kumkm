<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;
    protected $table = 'koperasi';
    protected $guarded = ['id'];
    protected $hidden = [];

     public function kategori() 
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
     public function kategorikoperasi() 
    {
        return $this->belongsTo(Kategorikoperasi::class, 'kategorikoperasi_id', 'id');
    }

    public function users() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
