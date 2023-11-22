<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){
        return view('user.index');
    }

    function viewProduct($id){
        return view('user.productView',compact('id'));
    }

    public function allProducts(){
        $categories = Category::latest()->get();
        return view('user.allProducts', compact('categories'));
    }
    function contactUs(){
        return view('user.contactUs');
    }
    function profile(){
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }
    function viewMoreProducts($id){
        $products = Product::where('category_id', $id)->get();
        return view('user.viewMoreProducts',compact('products'));
    }
    
    function searchProduct(Request $request){
       $name = $request-> product_name;
       $product = Product::where('product_name', $name)->first();
       if ($product) {
           $id = $product->id;
        return view('user.productView',compact('id'));
    } else {
        return redirect()->back()->with('error', 'No products found with the given name.');
    }
    }

    function orderHistory(){
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Order::where('user_id', $user_id) ->get();
        return view('user.orderHistory', compact('orders'));
    }
}
