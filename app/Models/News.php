<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
        'category',
        'is_published',
    ];
    protected $table = 'news';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}