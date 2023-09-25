<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriesNews;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'), ['publish', 'draft']) ? $request->get('status') : 'publish' ;
        $posts = $statusSelected == "publish" ? Post::publish() : Post::draft();
        

        if ($request->get('keyword')) {
            $posts->Search($request->get('keyword'));
        }

        return view('backend.news.post.index', [
            'posts' => $posts->paginate(5)->withQueryString(),
            'statusSelected' => $statusSelected,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoriesNews::all();
        return view('backend.news.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->judul = $request->judul;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->thumbnail = parse_url($request->thumbnail)['path'];
        $post->content = $request->content;
        $post->status = $request->status;
        $post->user_id = Auth::user()->id;
        $post->save();

        foreach ($request->category as $categories_id) {
            $post->attachCategories($categories_id);
        }
        
        $post->tag()->attach($request->tag);

        return redirect()->route('post.index')->with(['success' => 'berita berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('backend.news.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = CategoriesNews::all();
        return view('backend.news.post.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::FindOrFail($id);
        $post->update([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'description' => $request->description,
            'thumbnail' => parse_url($request->thumbnail)['path'],
            'content' => $request->content,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($post->kategori as $category) {
            $post->detachCategories($category->id);
        }

        foreach ($request->category as $categories_id) {
            $post->attachCategories($categories_id);
        }

        $post->tag()->sync($request->tag);

        return redirect()->route('post.index')->with(['success' => 'berita berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->tag()->detach();
        $post->kategori()->detach();
        $post->delete();

        if($post){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
