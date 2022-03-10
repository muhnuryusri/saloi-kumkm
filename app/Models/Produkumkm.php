<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkumkm extends Model
{
    use HasFactory;
    protected $table = 'produkumkms';
    protected $guarded = ['id'];
    protected $hidden = [];
    public function users() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function umkm() 
    {
        return $this->belongsTo(Umkm::class, 'umkm_id', 'id');
    }
}
