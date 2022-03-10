<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorikoperasi extends Model
{
    use HasFactory;
    protected $table = 'kategorikoperasi';
    protected $fillable = [
        'nama_kategori','slug'
    ];
    protected $hidden = [];
}
