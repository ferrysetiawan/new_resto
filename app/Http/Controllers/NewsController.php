<?php

namespace App\Http\Controllers;

use App\Models\CategoriesNews;
use App\Models\Event;
use App\Models\Post;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->categories = CategoriesNews::all();
        $this->countEvent = Event::where('tanggal', '>=', Carbon::now())->count();
        $this->tags = Tags::all();
        $this->recentPost = Post::publish()->latest()->take(10)->get();
    }

    public function index()
    {
        $countEvent = $this->countEvent;
        $recentPost = $this->recentPost;
        $categories = $this->categories;
        $tags = $this->tags;
        $posts = Post::publish()->paginate(5);
        return view('news.index', compact('countEvent','posts','categories','recentPost','tags'));
    }

    public function search(Request $request)
    {
        $countEvent = $this->countEvent;
        $recentPost = $this->recentPost;
        $categories = $this->categories;
        $tags       = $this->tags;

        if (!$request->get('keyword')) {
            return redirect()->route('news');
        }

        return view('news.search', [
            'countEvent' => $countEvent,
            'recentPost' => $recentPost,
            'categories' => $categories,
            'tags' => $tags,
            'posts' => Post::search($request->keyword)
                ->paginate(5)
                ->appends(['keyword' => $request->keyword])
        ]);
    }

    public function category($slug)
    {
        $countEvent = $this->countEvent;
        $recentPost = $this->recentPost;
        $categories = $this->categories;
        $tags = $this->tags;
        $posts = Post::publish()->whereHas('kategori', function($query) use ($slug){
            return $query->where('slug', $slug);
        })->latest()->paginate(10);
        $category = CategoriesNews::where('slug', $slug)->first();

        return view('news.kategori',[
            'countEvent' =>$countEvent,
            'posts' => $posts,
            'categories' => $categories,
            'recentPost' => $recentPost,
            'category' => $category,
            'tags' => $tags
        ]);
    }

    public function tag($slug)
    {
        $countEvent = $this->countEvent;
        $recentPost = $this->recentPost;
        $categories = $this->categories;
        $tags = $this->tags;
        $posts = Post::publish()->whereHas('tag', function($query) use ($slug){
            return $query->where('slug', $slug);
        })->latest()->paginate(10);
        $tag = Tags::where('slug', $slug)->first();

        return view('news.tag',[
            'countEvent' => $countEvent,
            'posts' => $posts,
            'categories' => $categories,
            'recentPost' => $recentPost,
            'tag' => $tag,
            'tags' => $tags
        ]);
    }

    public function show($slug)
    {
        $countEvent = $this->countEvent;
        $recentPost = $this->recentPost;
        $categories = $this->categories;
        $tags = $this->tags;
        $post = Post::where('slug', $slug)->first();
        return view('news.detail', compact('post','recentPost','categories','tags', 'countEvent'));
    }
}
