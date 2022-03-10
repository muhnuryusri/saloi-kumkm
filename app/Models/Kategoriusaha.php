<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriusaha extends Model
{
    use HasFactory;
    protected $table = 'kategoriusahas';
    protected $fillable = [
        'nama_kategori','slug'
    ];
    protected $hidden = [];

    public function umkm() {
       return  $this->belongsToMany(Umkm::class);
    }
}
