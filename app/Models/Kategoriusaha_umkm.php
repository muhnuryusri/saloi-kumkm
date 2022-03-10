<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriusaha_umkm extends Model
{
    use HasFactory;
    protected $table = 'kategoriusaha_umkm';
    protected $guarded = [
        'id'
    ];
    protected $hidden = [];
}
