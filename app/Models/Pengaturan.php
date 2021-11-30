<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'pengaturan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'judul',
        'konten',
        'deskripsi',
        'media'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
