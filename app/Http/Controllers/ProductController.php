<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Quoteline;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'quantity' => "required"
        ]);
        $product = Product::find($request->input('product_id'));
        if ($validator->fails()) {
            return redirect('shop')
                ->withErrors($validator)
                ->withInput();
        }else if(($product->quantity-$request->input('quantity'))<0){
            return redirect('shop')
                ->withErrors('Not enough quantity in stock');
        }else{
            $quotation = DB::table('quotations')->where('user_id',$request->input('user_id') )->orderBy('created_at','desc')->first();

            if($quotation->status==1){
                $q = $quotation->id;
            }else{
                Quotation::create('1',"",$product->tax);
                $quotation = new Quotation;
                $quotation->status = 1;
                $quotation->user_id = $request->input('user_id');
                $quotation->save();
                $q = Quotation::latest()->id;
            }
            $quoteLine = new Quoteline;

            $quoteLine->quotation_id = $q;
            $quoteLine->product_id = $product->id;
            $quoteLine->quantity = $request->input('quantity');
            $quoteLine->save();

            $product->quantity -= $request->input('quantity');
            $product->save();

            return redirect('shop')
                ->with('status', 'Product Added to Quotation');
        }
    }
}
