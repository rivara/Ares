<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products =  Product::all();
        return DataTables::of($products)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Product $product)
    {
        $product->fill($request->all())->save();
        return view('home');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('home');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->input('id'));
        $product->name =  $request->input('name');
        $product->description = $request->input('description');
        $product->units = $request->input('units');
        $product->save();
        return view('home');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->input('id'));
        $product->delete();
        return view('home');
    }

    public function new()
    {
        return view('create');
    }
}
