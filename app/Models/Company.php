<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',

    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
