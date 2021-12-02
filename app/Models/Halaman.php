<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    protected $table = 'halaman';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'konten', 'slug', 'order', 'tipe', 'gambar', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\Gallery');
    }
}
