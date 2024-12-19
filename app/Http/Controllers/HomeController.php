<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CategoryProduct;
use App\Models\Chef;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\ImageHero;
use App\Models\Post;
use App\Models\Product;
use App\Models\SpesialRecipe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroTitle = Hero::where('id','1')->first();
        $specialRecipe = SpesialRecipe::get();
        $galleries = Gallery::get();
        $chefs = Chef::get();
        $about = About::where('id', 1)->first();
        $countEvent = Event::where('tanggal', '>=', Carbon::now())->count();
        $countNews = Post::count();
        $events = Event::where('tanggal', '>=' , Carbon::now())->take(3)->get();
        $news = Post::publish()->latest()->take(4)->get();
        $categoryProduct = CategoryProduct::all();
        $product = Product::all();
        return view('index', compact('product','countNews','countEvent','galleries','events','heroTitle','chefs','categoryProduct','about','specialRecipe','news'));
    }

    public function kontak(Request $request)
    {
        $nama_pemesan = $request->nama_pemesan;
        $email = $request->email;
        $phone = $request->phone;
        $tanggal = Carbon::parse($request->date)->isoFormat('dddd, D MMMM Y');
        $time = $request->time;
        $jumlah_tamu = $request->jumlah_tamu;
        $pesan = $request->message;

        return redirect('https://wa.me/6281398059979/?text=Nama%20Pemesan%3A%20'. $nama_pemesan .'%0AEmail%20Pemesan%20%3A%20'. $email .'%0ANomor%20Telepon%3A%20'. $phone .'%0ATanggal%20Reservasi%3A%20'. $tanggal .'%0AWaktu%20Reservasi%3A%20Pukul%20'. $time .'%0AJumlah%20Tamu%3A%20'. $jumlah_tamu .'%20orang%0APesan%3A%20'. $pesan .'.');
    }
}
