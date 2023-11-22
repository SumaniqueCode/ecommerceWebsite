<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $users = User::where('isRole', 'customer')->count();
        $week = now()->startOfWeek(); // first date of the current week
        $month = now()->startOfMonth(); // first date of the current month
        $year = now()->startOfYear(); // first date of the current year
        $to = now();
        $monthlyUsers = User::where('isRole', 'customer')->whereBetween('created_at', [$month, $to])->count();
        $yearlyUsers = User::where('isRole', 'customer')->whereBetween('created_at', [$year, $to])->count();


        $product = Product::latest()->count();
        $category = Category::latest()->count();

        $orders = OrderDetail::latest()->sum('quantity');
        $orderPrice = OrderDetail::latest()->sum('unit_price');
         return view('admin.index',compact('users','monthlyUsers','yearlyUsers','orderPrice','orders','product','category'));
     }


    function categories(){
        $categories = Category::latest()->get();
        return view('admin.category.categoryList',compact('categories'));
    }

    function products(){
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.product.productList',compact('categories','products'));
    }

    function orders(){
        $orders = Order::latest()->get();
        return view('admin.orders',compact('orders'));
    }
}