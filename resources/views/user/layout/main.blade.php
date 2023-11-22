<!doctype html>
<html class="no-js" lang="en">

<!--   03:20:39 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>S & S Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/img/favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- CSS 
    ========================= -->


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('user/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/custom.css')}}">

</head>

<body>

    <?php

    use App\Models\Cart;

    if (auth()->user()) {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
    } else {
        $carts = null;
    }

    ?>

    <header>
        <div class="main_header">
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="{{asset('user/assets/img/logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                    <form action="/search-product" method="post">
                                        @csrf
                                        <div class="search_box">
                                            <input name="product_name" placeholder="Search product..." type="text">
                                            <button type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 d-flex">
                                <div class="middel_right_info top_right text-right">
                                    @if(Auth::user())
                                    <div class="mini_cart_wrapper">
                                        <a href="javascript:void(0)"><img
                                                src="{{asset('user/assets/img/shopping-bag.png')}}" alt=""></a>
                                        <span class="cart_quantity">{{$carts->count()}}</span>
                                        <!--mini cart-->
                                        <div class="mini_cart">
                                            <?php $total=0 ?>
                                                @foreach ($carts as $cart)

                                            <div class="cart_item">
                                                
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{asset($cart->product['product_image'])}}" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">{{$cart->product['product_name']}}</a>
                                                    <p>{{$cart->quantity}}<span> x Rs. {{$cart->product['product_price']}}</span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="/remove-cart/{{$cart->id}}"><i class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                            <?php $total= $total+($cart->unit_price * $cart->quantity) ?>
                                            @endforeach
                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">{{$total}}</span>
                                                </div>
                                            </div>

                                            <div class="mini_cart_footer">
                                                <div class="cart_button">
                                                    <a href="cart.html">View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a href="/checkout">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--mini cart end-->
                                    </div>
                                    @endif
                                            @if(Auth::user())
                                            <div>
                                                <a class=" ms-4" href="/checkout"><button class="btn btn-primary">Checkout</button></a>
                                            </div>
                                            <div class=" ms-2 header_wishlist">
                                                <a href="/profile" ><img src="{{asset('user/assets/img/user.png')}}" alt=""></a>
                                            </div>
                                                @else
                                                <div>
                                                <button class="btn btn-primary me-2"><a href="/login">Login</a></button>
                                                </div>
                                                <div>
                                                <button class="btn btn-primary"><a href="/register">Register</a></button>
                                            </div>
                                                @endif
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!--header middel end-->
                    <!--header bottom satrt-->
                    <div class="main_menu_area">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12">
                                    <div class="main_menu menu_position">
                                        <nav>
                                            <ul>
                                                <li><a href="/">home</a></li>
                                                <li><a href="/allProducts">Categories</a></li>
                                                <li><a href="/contactUs"> Contact Us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header bottom end-->
                </div>
    </header>
    <!--header area end-->

    <!-- content -->
    @yield('content')
    <!-- content ends -->

    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#"><img src="{{asset('user/assets/img/logo/logo.png')}}" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p>We are top ecommerce platform for local products</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="blog.html">Delivery Information</a></li>
                                    <li><a href="contact.html">Privacy Policy</a></li>
                                    <li><a href="services.html">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>My Account</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="/profile">My Account</a></li>
                                    <li><a href="/orderHistory">Order History</a></li>
                                    <li><a href="wishlist.html">Wish List</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Follow Us</h3>
                            <div class="footer_social_link">
                                <ul>
                                    <li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a class="instagram" href="#" title="instagram"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li><a class="rss" href="#" title="rss"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p> <a href="#"> &copy2023 S&S store. All rights are reserved.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
    <!-- JS
============================================ -->



    <!-- Plugins JS -->
    <script src="{{asset('user/assets/js/plugins.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('user/assets/js/main.js')}}"></script>
</body>

</html>