<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageHero extends Model
{
    use HasFactory;
    protected $table = 'image_heroes';
    protected $fillable = [
        'gambar'
    ];
}
