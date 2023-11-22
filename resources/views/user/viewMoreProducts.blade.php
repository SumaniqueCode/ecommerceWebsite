@extends('user.layout.main')
@section('content')
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row d-flex">
            @foreach ($products as $product)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-tranding">
                    <a href="/view-product/{{$product->id}}">
                        <div class="pro-img">
                            <img src="{{asset($product->product_image)}}" alt="">
                        </div>
                        <div class="pro-title">
                            <h3>{{$product->product_name}}</h3>
                            <h4>{{$product->category['category_name']}}</h4>
                        </div>
                        <div class="pro-price">
                            <div class="price_box">
                                <span class="current_price">{{$product->product_price}}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection