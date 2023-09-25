<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = [
        'title',
        'slug'
    ];

    public function scopeSearch($query, $title) {
        return $query->where('title','LIKE', "%{$title}%");
    }

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
