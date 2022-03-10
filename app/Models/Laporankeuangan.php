<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporankeuangan extends Model
{
    protected $table = 'laporankeuangan';
    protected $guarded = ['id'];
    protected $hidden = [];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id', 'id');
    }
}
