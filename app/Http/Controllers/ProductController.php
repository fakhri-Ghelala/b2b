<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function shop(){
        $categories = Sector::all();
        $products = Product::all();
        return view('shop',[
            'categories'=> $categories,
            'products'=> $products
        ]);
    }
    public function shopByCategory(int $s){

        $products = DB::table('products')->where(  'sector_id',$s)->get();
        $categories = Sector::all();
        return view('shop',[
            'categories'=> $categories,
            'products'=> $products
        ]);
    }

    public function show(Product $product){
        return view('product_show',[
            'product'=> $product
        ]);
    }
}
