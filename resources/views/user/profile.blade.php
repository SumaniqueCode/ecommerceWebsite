@extends('user.layout.main')
@section('content')  
<section class="container">
    <div class="row m-3">
    <div class="col-md">
        <table class="table">
            <tbody>
                <tr>
                    <th>Name: </th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>Email: </th>
                    <td>{{$user->email}}</td>
                </tr>
            </tbody>
        </table>
    </div> 
    <div class="col-md">
        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
</section>
@endsection