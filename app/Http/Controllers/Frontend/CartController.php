<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
 public function addProduct(Request $request){
     $product_id=$request->input('product_id');
     $product_qty=$request->input('product_qty');
     if(Auth::check()){

        $prod_check=Product::where('id',$product_id)->first();
         if($prod_check){
             if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
             {
                return response()->json(['status'=>$prod_check->name.'Already Added to Cart']);

             }
             else{
             $cartItem=new Cart();
             $cartItem->prod_id=$product_id;
             $cartItem->user_id=Auth::id();
             $cartItem->prod_qty=$product_qty;
             $cartItem->save();
             return response()->json(['status'=>$prod_check->name.'Added to Cart']);
            }
         }
     }
     else{
         return response()->json(['status'=>'login to continue']);
     }

 }

 public function viewCart(){
     $cartItem=Cart::where('user_id',Auth::id())->get();
     return view('frontend.cart',compact('cartItem'));  
 }
 public function dleteProduct(Request $request){
    if(Auth::check()){

    $prod_id=$request->input('prod_id');
    if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
    {
        $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
        $cartItem->delete();
        return response()->json(['status'=>'product deleted']);

    }


    }
    else{
        return response()->json(['status'=>'login to continue']);
    }

 }
}
