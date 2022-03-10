<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    //  protected $guarded = ['id'];
    protected $primaryKey="id";
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'no_ktp',
    //     'name',
    //     'tempat_lahir',
    //     'tgl_lahir',
    //     'image',
    //     'alamat_rumah',
    //     'kota',
    //     'kecamatan',
    //     'kelurahan',
    //     'no_telpon',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function umkms() 
    {
        return $this->hasMany(Umkm::class);
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

    public function getImageAttribute($value){
        if($value){
            return asset($value);
        }else {
            return asset('users/images/no-image.svg');
        }
    }

    
}
