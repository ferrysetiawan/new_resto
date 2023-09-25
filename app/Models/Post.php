<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'slug',
        'description',
        'thumbnail',
        'content',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsToMany(CategoriesNews::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function attachTags($tags_id){
        $tags = Tags::find($tags_id);
        return $this->kategori()->attach($tags);
    }

    public function detachTags($tags_id){
        $tags = Tags::find($tags_id);
        return $this->kategori()->detach($tags);
    }

    public function attachCategories($categories_id){
        $categories = CategoriesNews::find($categories_id);
        return $this->kategori()->attach($categories);
    }

    public function detachCategories($categories_id){
        $categories =  CategoriesNews::find($categories_id);
        return $this->kategori()->detach($categories);
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('judul','LIKE',"%{$title}%");
    }

    public function scopePublish($query)
    {
        return $query->where('status', "publish");
    }

    public function scopeDraft($query)
    {
        return $query->where('status', "draft");
    }
}
