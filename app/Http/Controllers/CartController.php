<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class CartController extends Controller
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
    public function store(Request $request, $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if(Auth::id()){

            $user = Auth::user();

            $cart = new Cart;

            $product = Product::find($product);

            $cart-> name = $user->name;
            $cart-> phone = $user->phone;
            $cart-> address = $user->address;
            $cart -> product_title = $product-> title;
            $cart -> quantity = $request-> quantity;
            $cart -> price = $product-> price;
            $cart->save();
            return redirect()->back()->with('message', 'Product Added Successfully!');
        }else{

            return redirect('login');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {   
        $user = Auth::user();
        $cart = Cart::where('phone', $user->phone)->get();
        $count = Cart::where('phone', $user->phone)->count();
        return view('user.showcart', compact('cart', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->back()->with('message', 'Product Removed Successfully!');
    }
}
