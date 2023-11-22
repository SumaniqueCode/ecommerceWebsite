@extends('admin.layout.main')
@section('content')
<section class="container">
    <div class="row mt-2">
        <h3>USERS</h3>
        <div class="col-sm-3 col-lg-2 m-3">
            <div class="overview-item overview-item--c1 bg-success-subtle rounded">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="text p-3">
                            <h2>{{$users}}</h2>
                            <span>Total Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 m-3">
            <div class="overview-item overview-item--c2 bg-success-subtle rounded">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="text p-3">
                            <h2>{{$monthlyUsers}}</h2>
                            <span>Monthly New User</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 m-3">
            <div class="overview-item overview-item--c3 bg-success-subtle rounded">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="text p-3">
                            <h2>{{$yearlyUsers}}</h2>
                            <span>Yearly New User</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <h3>Orders</h3>
        <div class="col-sm-3 col-lg-2 m-3">
            <div class="overview-item overview-item--c1 bg-info-subtle rounded">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="text p-3">
                            <h2>{{$orders}}</h2>
                            <span>Total Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 m-3">
            <div class="overview-item overview-item--c2 bg-info-subtle rounded">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="text p-3">
                            <h2>{{$orderPrice}}</h2>
                            <span>Total Order Price</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <h3>Products</h3>
        <div class="col-sm-3 col-lg-2 m-3">
            <div class="overview-item overview-item--c1 bg-danger-subtle rounded">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="text p-3">
                            <h2>{{$category}}</h2>
                            <span>Total Product Categoty</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-2 m-3">
            <div class="overview-item overview-item--c2 bg-danger-subtle rounded">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="text p-3">
                            <h2>{{$product}}</h2>
                            <span>Total Products</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection