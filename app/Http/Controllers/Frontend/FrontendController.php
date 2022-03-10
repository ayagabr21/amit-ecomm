<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //show trending category and products
    public function index(){
        $featured_products=Product::where('trending','1')->take('15')->get();
        $featured_category=Category::where('popular','1')->take('15')->get();
        return view('frontend.index',compact('featured_products','featured_category'));
    }
    // category page
    public function category(){
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));

    }
    // fetch products by category
    public function viewcategory($slug){
        if(Category::where('slug' ,$slug)->exists()){
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('category_id',$category->id)->where('status','0')->get();

            return view('frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('status','product doesnot exist');
        }
    }
    // display products details
    public function viewproduct($cate_slug,$prod_slug){

        if(Category::where('slug' ,$cate_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){
                $products=Product::where('slug',$prod_slug)->first();

                return view('frontend.products.view',compact('products'));
            }
            else{
                return redirect('/')->with('status','error');
            }
        }
        else{
            return redirect('/')->with('status','category not found');

        }
    }
    // set list of products in search engin
    public function productListajax(){

        $products= Product::select('name')->where('status','0')->get();
        $data=[];
        foreach($products as $item){
            $data[] =$item['name'];
        }
        return $data;
    }
    public function searchproduct(Request $request){
        $search_product= $request->product_name;
        if($search_product !=' '){
            $product=Product::where('name','LIKE',$search_product)->first();
            if($product){
                return redirect('category/'.$product->category->slug. '/'.$product->slug);
            }
            else {
                return redirect()->back()->with('status','no product mathch your search');
            }
        }

        else {
            return redirect()->back();
        }
    }
}
