<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function fetchProducts()
{
    $products = Product::all();

    return view('index1', ['products' => $products]);
}

public function products()
{
    $products = Product::all();

    return view('products', compact('products'));
}


    
    public function product()
    {
        $products = DB::table('products')->get();
    
        return view('products', ['products' => $products]);
    }

public function single_product1(Request $request, $id)
{
    $product = DB::table('products')->where('id', $id)->first();
    return view('single_product', ['product' => $product]);
}

}
