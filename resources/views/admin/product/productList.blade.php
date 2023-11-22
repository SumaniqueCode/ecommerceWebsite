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
            <form action="/add-product" method="post" class="mt-3 col-md-8" enctype="multipart/form-data">
            @csrf
            <label for="product_name" class=" form-label mt-3"> Product Name</label>
            <input type="text" value="" class="form-control border-info"placeholder="Enter the product name" id="product_name" name="product_name">
            <label for="product_name" class=" form-label mt-3"> Product Price</label>
            <input type="text" value="" class="form-control border-info"placeholder="Enter the product price" id="product_price" name="product_price">
            <label for="category_id" class=" form-label mt-3">Product Category</label>
            <select name="category_id" class="form-control border-info" id="">
                @foreach ($categories as $category)
                    
                <option value="{{$category->id}}">{{$category->category_name}}</option>

                @endforeach
            </select>
            <label for="product_name" class=" form-label mt-3"> Product Image</label>
            <input type="file" value="" class="form-control border-secondary" id="product_image" name="product_image">
            <label for="product_name" class=" form-label mt-3"> Product Description</label>
            <input type="text" value="" class="form-control border-info"placeholder="Enter the product description" id="product_description" name="product_description">
            <button type="Submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

            <div class="container">
            <table class="table table-striped table-hover">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Details</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                <tr>

                <?php
              $i =1
              ?>

                    @foreach($products as $product)
                    
                    <td scope="row">{{$i}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->category['category_name']}}</td>
                    <td>{{$product->product_description}}</td>
                    <td><img src="{{$product->product_image}}" alt="" width="100"></td>
                    <td class="d-flex"><a href="/edit-product/{{$product->id}}" class="m-3 btn btn-primary">Edit</a>
                      <a href="/delete-product/{{$product->id}}" class="btn btn-danger m-3">Delete</a></td>

                      <?php
              $i++;
              ?>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection