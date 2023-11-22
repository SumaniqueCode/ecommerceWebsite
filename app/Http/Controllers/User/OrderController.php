<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        $user = Auth::user();
        $userId = $user->id;
        $order =  new Order();
        $order->user_id = $userId;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->note = $request->note;
        $order->payment_method = $request->payment_method;

        $order->save();

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($carts as $cart) {
            $order_details = new OrderDetail();
            $order_details->order_id = $order->id;
            $order_details->product_id = $cart->product_id;
            $order_details->quantity = $cart->quantity;
            $order_details->unit_price = $cart->unit_price;
            $order_details->save();
            $cart->delete();
            $total += $order_details->quantity * $order_details->unit_price;
        }

        if ($request->payment_method == 'khalti') {
            $url = '/pay-with-khalti/' . $total . '/' . $order->id;
            return redirect($url);
        }
        return redirect()->back()->with('message', 'Sucessfully Ordered');
    }

    function payWithKhalti($price, $id)
    {
        return view('user.payWithKhalti', compact('price', 'id'));
    }

    function changeOrderStatus($id)
    {
        $order  = Order::find($id);
        $order->payment_status = 'paid';
        $order->update();

        return redirect('/');
    }

    function orderDetails($id)
    {
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        $quantitySum = $orderDetails->sum('quantity');
        $totalPrice = $orderDetails->sum('unit_price');
        return view('admin.orderDetails', compact('orderDetails','quantitySum','totalPrice'));
    }
}