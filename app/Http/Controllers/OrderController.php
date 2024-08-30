<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
            'product_name.*' => 'required|string',
            'quantity.*' => 'required|integer',
            'price.*' => 'required|string',
        ]);

        $user = Auth::user();

        $productNames = $request->input('product_name');
        $quantities = $request->input('quantity');
        $prices = $request->input('price');

        foreach($productNames as $index => $productName){
            
            $order = new Order;

            $order-> name = $user->name;
            $order-> phone = $user->phone;
            $order-> address = $user->address;
            $order-> product_name = $productName;
            $order-> quantity = $quantities[$index];
            $order->price = $prices[$index];
            $order->status = 'not delivered';
            $order->save();
        }
        
        DB::table('carts')->where('phone', $user->phone)->delete();
        return redirect()->back()->with('message', 'Product Ordered Successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
