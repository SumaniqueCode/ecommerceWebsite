<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name= $request->product_name;
        $product->product_price= $request->product_price;
        $product->product_description= $request->product_description;
        $product_image = $request->file('product_image');
        $image_name = time().$product_image->getClientOriginalName();
        $product_image->move('images/productImages/',$image_name);
        $product->product_image ='images/productImages/'.$image_name;
        $product->category_id= $request->category_id;

        $product->save();

        return back()->with('message','Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::find($id);
        $categories = Category::latest()->get();
        return view('admin.product.productEdit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::find($id);
        $product->product_name= $request->product_name;
        $product->product_price= $request->product_price;
        $product->product_description= $request->product_description;
        $product->category_id= $request->category_id;

        if($request->hasFile('product_image')){
            $image = $request->file('product_image');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('images/productImages/',$image_new_name);
            // storing name
            $product->product_image = 'images/productImages/'.$image_new_name;
        }else{
            $product->product_image = 'images/productImages//default.jpg';
        }

        $product->update();

        return redirect('/products')->with('message','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('message','Product Deleted Successfully.');
    }
}
