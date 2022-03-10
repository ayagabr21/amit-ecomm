<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //add products to a certain category
        $category=Category::all();
        return view('admin.products.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        //insert image
        $products=new Product();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). "." .$ext;
            $file->move(public_path('assets/uploads/products/'), $filename);
            $products->image=$filename;
        }
        // store data
        $products->category_id=$request->input('category_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->price=$request->input('price');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status')==TRUE ?'1':'0';
        $products->trending=$request->input('trending')==TRUE ?'1':'0';
        $products->meta_title=$request->input('meta_title');
        $products->meta_keywords=$request->input('meta_keywords');
        $products->meta_description=$request->input('meta_description');

        $products->save();
        return redirect('products')->with('status','product added successfuly');
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit on products
        $products=Product::find($id);
        return view('admin.products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update img
        $products=Product::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/products' . $products->image;
            if(File::exists($path)){

                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). "." .$ext;
            $file->move(public_path('assets/uploads/products/'), $filename);
            $products->image=$filename;
        }
        // store data
        $products->category_id=$request->input('category_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->price=$request->input('price');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status')==TRUE ?'1':'0';
        $products->trending=$request->input('trending')==TRUE ?'1':'0';
        $products->meta_title=$request->input('meta_title');
        $products->meta_keywords=$request->input('meta_keywords');
        $products->meta_description=$request->input('meta_description');

        $products->update();
        return redirect('products')->with('status','products updated successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $products=Product::find($id);
        $path='assets/uploads/products' . $products->image;
        if(File::exists($path)){

            File::delete($path);
        }
        $products->delete();
        return redirect('products')->with('status','products deleted successfuly');

    }
}
