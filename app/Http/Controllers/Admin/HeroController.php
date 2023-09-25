<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\ImageHero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroCount = Hero::count();
        $heroes = Hero::get();
        $gambars = ImageHero::get();
        return view('backend.hero.index', compact('heroes','heroCount','gambars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hero = new Hero();
        $hero->judul_hero = $request->judul_hero;
        $hero->gambar = parse_url($request->gambar)['path'];
        $hero->deskripsi = $request->deskripsi;
        $hero->save();

        if($hero){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
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
        $hero = Hero::findOrFail($id);
        return view('backend.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hero = Hero::find($id);
        $hero->judul_hero = $request->judul_hero;
        $hero->gambar = parse_url($request->get('gambar'))['path'];
        $hero->deskripsi = $request->get('deskripsi');
        $hero->save();

        return redirect()->route('hero.index')->with(['success' => 'Data berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
