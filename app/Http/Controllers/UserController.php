<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){

            return view('admin.home');
        }else{
            $products = Product::paginate(3);
            return view('user.home', compact('products'));
        }
    }


    public function index()
    {
        if(Auth::id())
        {
            return redirect('ecommerce');
        }
        else
        {   
            $products = Product::paginate(3);
            return view('user.home', compact('products'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
