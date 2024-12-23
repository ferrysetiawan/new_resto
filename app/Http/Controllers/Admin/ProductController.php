<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('backend.produk.item.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryProduct::get();
        return view('backend.produk.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'nama_produk' => $request->nama_produk,
            'gambar' => parse_url($request->gambar)['path'],
            'thumbnail' => parse_url($request->thumbnail)['path'],
            'penyajian' => $request->penyajian,
            'harga' => $request->harga,
            'category_id' => $request->category_id,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $product = Product::findOrFail($id);
        $categories = CategoryProduct::get();
        return view('backend.produk.item.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'nama_produk' => $request->nama_produk,
            'gambar' => parse_url($request->gambar)['path'],
            'thumbnail' => parse_url($request->thumbnail)['path'],
            'penyajian' => $request->penyajian,
            'harga' => $request->harga,
            'category_id' => $request->category_id,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function updateStatus(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'id' => 'required|exists:products,id',
                'is_spesial' => 'required|boolean',
            ]);

            // Temukan produk berdasarkan ID
            $product = Product::findOrFail($request->id);

            // Update status is_spesial
            $product->is_spesial = $request->is_spesial;
            $product->save();

            return response()->json(['status' => 'success', 'message' => 'Status berhasil diubah']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        if($product){
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
