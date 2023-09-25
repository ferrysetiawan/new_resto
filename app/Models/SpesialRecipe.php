<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialRecipe extends Model
{
    use HasFactory;
    protected $table = 'spesial_recipes';
    protected $fillable = [
        'gambar',
        'judul'
    ];
}
