<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([

            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);

        $product = New Product;

        $dir = 'images';

        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $filename = time(). '.'. $extension;

        $path = $file->storeAs('public/'.$dir, $filename);

        $product-> title = $request->input('title');
        $product-> price = $request->input('price');
        $product-> description = $request->input('description');
        $product-> quantity = $request->input('quantity');
        $product-> image = $path;
        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted!');
    }
}
