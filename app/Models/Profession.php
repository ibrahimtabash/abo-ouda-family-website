<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function professionals()
    {
        return $this->hasMany(Professional::class);
    }

    public function requests()
    {
        return $this->hasMany(ProfessionalRequest::class);
    }
}
