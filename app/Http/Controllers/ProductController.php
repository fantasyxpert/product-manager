<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('category.index',compact('products'));
    }

    public function create ()
    {   
        return view('category.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            

            
        ]);
        $product=Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            
         ]);
        
        $product->added_by = auth()->user()->id;
        return redirect()->back()->with('success', 'Product created successfully.');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('category.edit',['product' => $product]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'price' => 'required',
           
        ]);
        $product = Product::findOrFail($id)->update([

        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
    ]);
    
        return redirect()->back()->with('success', 'Product updated successfully.');
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    
}