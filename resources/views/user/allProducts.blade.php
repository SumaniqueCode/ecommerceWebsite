@extends('user.layout.main')
@section('content')
<?php use App\Models\Product\Product;
?>
<section class="container">
@foreach ($categories as $category )
<?php $products = Product::where('category_id', $category->id)->take(3)->get(); ?>
<div class="pro-title">
    <h4 class="ms-5 mt-2 ps-5 pe-5">{{$category->category_name}}</h4>
</div>
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row d-flex">
            @foreach ($products as $product)
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
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
            <div class="col-md"><a href="/viewMoreProducts/{{$category->id}}"><button class="btn btn-primary">View More >></button></a></div>
        </div>
    </div>
</section>
@endforeach
</section>
@endsection