<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesNews extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'nama_kategori'
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
