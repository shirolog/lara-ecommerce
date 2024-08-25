<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.product');
    }

    public function show(){
        $products = Product::all();
        return view('admin.showproduct', compact('products'));
    }
}
