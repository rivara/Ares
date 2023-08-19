<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // $products=Product::all();
    
     return response()->json(['name'=>'Got Simple Ajax Request.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product=Product::create($request->post());
        return response()->json(['products'=>$product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('home'); 
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->post)()->save();
        return response()->json(['products'=>$product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }

    public function new(){
        return view('create'); 
    }
}
