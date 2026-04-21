<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title', 'user_id'];

    public function images()
    {
        return $this->hasMany(AlbumImage::class);
    }
}
