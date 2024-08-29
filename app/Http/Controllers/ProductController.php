<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function redirect()
     {
         $usertype = Auth::user()->usertype;
 
         if($usertype == 1){
 
             return view('admin.home');
         }else{

            $products = Product::paginate(3);
            $user = Auth::user();
            $count = Cart::where('phone', $user->phone)->count();
             return view('user.home', compact('products', 'count'));
         }
     }


     public function index()
     {
         if (Auth::check()) {
             $user = Auth::user();
             
             if ($user->usertype == 1) {
                return view('admin.product');
             }
             
            return redirect('ecommerce');
         } 
         else{
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
        if(Auth::user()->usertype == 1){
            $products = Product::all();
            return view('admin.showproduct', compact('products'));        
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        if(Auth::user()->usertype == 1){
            return view('admin.updateview', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

            'title' => 'nullable',
            'price' => 'nullable',
            'description' => 'nullable',
            'quantity' => 'nullable',
            'image' => 'nullable|image',
        ]);

        
            $dir = 'images';
            
            $file = $request->file('image');

        if($request->file('image')){
    
            $extension = $file->getClientOriginalExtension();
    
            $filename = time(). '.'. $extension;
    
            $path = $file->storeAs('public/'.$dir, $filename);
        }
        
        $product-> title = $request->input('title');
        $product-> price = $request->input('price');
        $product-> description = $request->input('description');
        $product-> quantity = $request->input('quantity');
        if($request->file('image')){
            $product-> image = $path;
        }
        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully!')
        ->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted!');
    }


    public function search(Request $request){

        $request->validate([

            'search' => 'required',
        ]);

        $search = $request->input('search');

        if($search == ''){
            $products = Product::paginate(3);
            return view('user.home', compact('products'));
        }

        $products = Product::Where('title', 'like', "%{$search}%")->get();

        return view('user.home', compact('products'));
    }
}
