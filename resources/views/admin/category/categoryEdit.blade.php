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
        <h1>Edit Category Details</h1>
            <form action="/update-category/{{$category->id}}" method="post" class="mt-3">
            @csrf
            <input type="text" value="{{$category->category_name}}" class="mt-3"placeholder="Enter the category name" id="category_name" name="category_name"><br>
            <button type="Submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection