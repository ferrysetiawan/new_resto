<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChefRequest;
use App\Http\Requests\UpdateChefRequest;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = Chef::get();
        return view('backend.chef.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChefRequest $request)
    {
        Chef::create([
            'nama' => $request->nama,
            'gambar' => parse_url($request->gambar)['path'],
            'posisi' => $request->posisi,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter
        ]);

        return redirect()->route('chef.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $chef = Chef::findOrFail($id);
        return view('backend.chef.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChefRequest $request, string $id)
    {
        $chef = Chef::findOrFail($id);
        $chef->update([
            'nama' => $request->nama,
            'gambar' => parse_url($request->gambar)['path'],
            'posisi' => $request->posisi,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter
        ]);

        return redirect()->route('chef.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chef = Chef::findOrFail($id);
        $chef->delete();
        if($chef){
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
