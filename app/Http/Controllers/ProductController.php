<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        return view('products.show',compact('product'));
    }

    public function show2($id){
        $product=Product::find($id);
        return view('products.show',compact('product'));
    }
}
