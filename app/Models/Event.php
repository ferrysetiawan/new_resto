<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'nama_event',
        'nama_penyelenggara',
        'background',
        'thumbnail',
        'tanggal',
        'summary',
        'detail_event',
        'slug'
    ];
}
