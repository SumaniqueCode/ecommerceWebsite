@extends('admin.layout.main')
@section('content')
<div class="container">
    <div class="container">
    

        @if (session('message'))
            <div class="alert alert-primary">
                {{session('message')}}
            </div>
                
            @endif

        <div class="form-group">
        <h1>Add product Details</h1>
            <form action="/update-product/{{$product->id}}" method="post" class="mt-3" enctype="multipart/form-data">
            @csrf
            <label for="product_name" class=" form-label mt-3"> Product Name</label>
            <input type="text" value="{{$product->product_name}}" class="form-control border-info"placeholder="Enter the product name" id="product_name" name="product_name">
            <label for="product_name" class=" form-label mt-3"> Product Price</label>
            <input type="text" value="{{$product->product_price}}" class="form-control border-info"placeholder="Enter the product price" id="product_price" name="product_price">
           
            <label for="category_id" class=" form-label mt-3">Product Category</label>
            <select name="category_id" class="form-control border-info" id="">  
            @foreach ($categories as $category)
                    
                <option value="{{$category->id}}">{{$category->category_name}}</option>

                @endforeach
            </select>
            <label for="product_name" class=" form-label mt-3"> Product Image</label>
            <input type="file" value="{{$product->product_image}}" class="form-control border-secondary" id="product_image" name="product_image">
            <label for="product_name" class=" form-label mt-3"> Product Description</label>
            <input type="text" value="{{$product->product_description}}" class="form-control border-info"placeholder="Enter the product description" id="product_description" name="product_description">
            <button type="Submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection