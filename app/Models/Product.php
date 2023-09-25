<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'gambar'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
