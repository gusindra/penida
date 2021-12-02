<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallerys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'tag',
        'status',
        'halaman_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function halaman()
    {
        return $this->belongsTo('App\Models\Halaman', 'halaman_id');
    }
}
