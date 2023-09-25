<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Event;
use App\Models\Post;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $news = Post::count();
        $product = Product::count();
        $kategoriProduk = CategoryProduct::count();
        $event = Event::where('tanggal', '>=', Carbon::now())->count();
        return view('backend.index', compact('news','product','kategoriProduk','event'));
    }
    
}
