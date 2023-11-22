@extends('admin.layout.main')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->payment_status}}</td>
                <td><a class="me-1" href="/viewOrderDetails/{{$order->id}}"><button class="btn btn-success">View Details</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection