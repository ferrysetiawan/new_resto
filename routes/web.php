<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryNewsController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EventController as ControllersEventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/event/{slug}', [ControllersEventController::class, 'detail'])->name('events.detail');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/search', [NewsController::class, 'search'])->name('news.search');
Route::get('/kategori/{slug}', [NewsController::class, 'category'])->name('news.category');
Route::get('/tag/{slug}', [NewsController::class, 'tag'])->name('news.tag');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/contact', [HomeController::class, 'kontak'])->name('kontak.store');

Route::group(['prefix' =>'dashboard', 'middleware' => ['auth']], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'event'], function(){
        Route::get('/', [EventController::class, 'index'])->name('event.index');
        Route::get('/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/store', [EventController::class, 'store'])->name('event.store');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
        Route::put('/update/{id}', [EventController::class, 'update'])->name('event.update');
        Route::delete('/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    });
    Route::group(['prefix' => 'hero'], function(){
        Route::get('/', [HeroController::class, 'index'])->name('hero.index');
        Route::post('/store', [HeroController::class, 'store'])->name('hero.store');
        Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('hero.edit');
        Route::put('/update/{id}', [HeroController::class, 'update'])->name('hero.update');
        Route::post('/storeimage', [HeroImageController::class, 'store'])->name('heroImage.store');
        Route::delete('/destroy/{id}', [HeroImageController::class, 'destroy'])->name('heroImage.destroy');
    });
    Route::group(['prefix' => 'chef'], function(){
        Route::get('/', [ChefController::class, 'index'])->name('chef.index');
        Route::get('/create', [ChefController::class, 'create'])->name('chef.create');
        Route::post('/store', [ChefController::class, 'store'])->name('chef.store');
        Route::get('/edit/{id}', [ChefController::class, 'edit'])->name('chef.edit');
        Route::put('/update/{id}', [ChefController::class, 'update'])->name('chef.update');
        Route::delete('/destroy/{id}', [ChefController::class, 'destroy'])->name('chef.destroy');
    });
    Route::group(['prefix' => 'about'], function(){
        Route::get('/', [AboutController::class, 'index'])->name('about.index');
        Route::post('/store', [AboutController::class, 'store'])->name('about.store');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/update/{id}', [AboutController::class, 'update'])->name('about.update');
        Route::post('/special_recipe', [AboutController::class, 'specialRecipe'])->name('specialRecipe.store');
        Route::delete('/destroy/{id}', [AboutController::class, 'destroy'])->name('about.destroy');
    });
    Route::group(['prefix'=> 'news'], function(){
        Route::group(['prefix'=>'categories'], function(){
            Route::get('/', [CategoryNewsController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryNewsController::class, 'create'])->name('categories.create');
            Route::post('/store', [CategoryNewsController::class, 'store'])->name('categories.store');
            Route::get('/edit/{id}', [CategoryNewsController::class, 'edit'])->name('categories.edit');
            Route::put('/update/{id}', [CategoryNewsController::class, 'update'])->name('categories.update');
            Route::delete('/destroy/{id}', [CategoryNewsController::class, 'destroy'])->name('categories.destroy');
        });
        Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');
        Route::group(['prefix'=>'tags'], function(){
            Route::get('/', [TagController::class, 'index'])->name('tags.index');
            Route::get('/create', [TagController::class, 'create'])->name('tags.create');
            Route::post('/store', [TagController::class, 'store'])->name('tags.store');
            Route::get('/edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
            Route::put('/update/{id}', [TagController::class, 'update'])->name('tags.update');
            Route::delete('/destroy/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
        });
        Route::group(['prefix'=>'post'], function(){
            Route::get('/', [PostController::class, 'index'])->name('post.index');
            Route::get('/create', [PostController::class, 'create'])->name('post.create');
            Route::post('/store', [PostController::class, 'store'])->name('post.store');
            Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
            Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
            Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
        });
    });
    Route::group(['prefix' => 'product'], function(){
        Route::group(['prefix'=>'categoryproduct'], function(){
            Route::get('/', [CategoryProductController::class, 'index'])->name('categoryProduct.index');
            Route::get('/create', [CategoryProductController::class, 'create'])->name('categoryProduct.create');
            Route::post('/store', [CategoryProductController::class, 'store'])->name('categoryProduct.store');
            Route::get('/edit/{id}', [CategoryProductController::class, 'edit'])->name('categoryProduct.edit');
            Route::put('/update/{id}', [CategoryProductController::class, 'update'])->name('categoryProduct.update');
            Route::delete('/destroy/{id}', [CategoryProductController::class, 'destroy'])->name('categoryProduct.destroy');
        });
        Route::group(['prefix'=>'productitems'], function(){
            Route::get('/', [ProductController::class, 'index'])->name('product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::post('/update-status', [ProductController::class, 'updateStatus'])->name('product.update-status');
            Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        });
    });
    Route::group(['prefix' => 'user'], function(){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    Route::group(['prefix' => 'filemanager'], function () {
        \Unisharp\LaravelFilemanager\Lfm::routes();
    });

    Route::resource('gallery', GalleryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
