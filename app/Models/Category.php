<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'image',
        'title',
        'slug'
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
