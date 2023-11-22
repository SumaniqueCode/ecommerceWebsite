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
        <h1>Add Category Details</h1>
            <form action="/add-category" method="post" class="mt-3">
            @csrf
            <label class="form-label mt-3" for="category_name">Category Name</label>
            <input type="text" class="form-control border-info" value="" class="mt-3"placeholder="Enter the category name" id="category_name" name="category_name"><br>
            <button type="Submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

            <div class="container">
            <table class="table table-striped table-hover">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                <tr>

                <?php
              $i =1
              ?>

                    @foreach($categories as $category)
                    
                    <td scope="row">{{$i}}</td>
                    <td>{{$category->category_name}}</td>
                    <td><a href="/edit-category/{{$category->id}}" class="btn btn-primary">Edit</a>
                      <a href="/delete-category/{{$category->id}}" class="btn btn-danger">Delete</a></td>

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