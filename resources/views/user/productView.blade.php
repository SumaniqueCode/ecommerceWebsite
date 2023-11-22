@extends('user.layout.main')
@section('content')

<?php
use App\Models\Product\Product;

$product = Product::find($id);
?>
<!--product details start-->
<div class="product_details mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="{{asset($product->product_image)}}" data-zoom-image="{{asset($product->product_image)}}" alt="big-1">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset($product->product_image)}}" data-zoom-image="{{asset($product->product_image)}}">
                                    <img src="{{asset($product->product_image)}}" alt="zo-th-1" />
                                </a>

                            </li>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset($product->product_image)}}" data-zoom-image="{{asset($product->product_image)}}">
                                    <img src="{{asset($product->product_image)}}" alt="zo-th-1" />
                                </a>

                            </li>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset($product->product_image)}}" data-zoom-image="{{asset($product->product_image)}}">
                                    <img src="{{asset($product->product_image)}}" alt="zo-th-1" />
                                </a>

                            </li>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset($product->product_image)}}" data-zoom-image="{{asset($product->product_image)}}">
                                    <img src="{{asset($product->product_image)}}" alt="zo-th-1" />
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <div class="product_d_right">
                    <form action="/add-to-cart/{{$product->id}}" method="post">
                        @csrf
                        <h1>{{$product->product_name}}</h1>
                        <div class="price_box">
                            <span class="current_price">NPR {{$product->product_price}}</span>
                        </div>
                        <div class="product_desc">
                           {{$product->product_description}}
                        </div>
                       
                        <div class="product_variant quantity">
                            <label>quantity</label>
                            <input min="1" name="product_quantity" max="100" value="1" type="number">
                            <button class="button" type="submit">Add to cart</button>

                        </div>
                        <div class="product_meta">
                            <span>Category: <a href="#">{{$product->category['category_name']}}</a></span>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

@endsection