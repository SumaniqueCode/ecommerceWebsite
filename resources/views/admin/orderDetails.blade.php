@extends('admin.layout.main')
@section('content')
<section class="container">
    <?php 
        use App\Models\Product\Product;
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $orderDetail)
            <?php
                    $products  = Product::where('id', $orderDetail->product_id)->get();

            ?>
            <tr>
                @foreach ($products as $product)
                <td>{{$orderDetail->order_id}}</td>
                <td>{{$orderDetail->product_id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$orderDetail->quantity}}</td>
                <td>{{$orderDetail->unit_price}}</td>
            </tr>
            @endforeach
                            
            @endforeach
            <tr>
                <th colspan="3">Total</th>
                <th>{{$quantitySum}} Items</th>
                <th>Rs. {{$totalPrice}}</th>
            </tr>
        </tbody>
    </table>
</section>

@endsection