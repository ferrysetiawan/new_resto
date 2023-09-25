<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::all();
        return view('backend.news.tag.index', compact('tags'));
    }

    public function select(Request $request)
    {
        $tags = [];
        if($request->has('q')){
            $tags = Tags::select('id','title')->search($request->q)->get();
        } else {
            $tags = Tags::select('id','title')->limit(10)->get();
        }

        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.news.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tags::create([
            'title' => $request->title,
            'slug' => $request->slug
        ]);

        return redirect()->route('tags.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tags::findOrFail($id);
        return view('backend.news.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tags::findOrFail($id);
        $tag->update([
            'title' => $request->title,
            'slug' => $request->slug
        ]);

        return redirect()->route('tags.index')->with(['success'=>'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tags::findOrFail($id);
        $tag->delete();
        if($tag){
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
