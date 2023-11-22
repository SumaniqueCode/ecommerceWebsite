<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S & S Store</title>
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

<!-- navbar starts -->

    <section class="container">
          <nav class="navbar navbar-expand-lg bg-primary-subtle">
        <div class="container-fluid">
          <a class="navbar-brand logo" href="/dashboard"><img src="{{asset('user/assets/img/logo/logo.png')}}" alt="" height="60px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/categories">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/products">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/orders">Orders</a>
              </li>
            </ul>
            <div>
              <a class="btn btn-outline-primary" href="">Profile</a>
            <a class="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
          </div>
        </div>
      </nav>
    </section>

    <!-- navbar ends -->

    <!--main content starts -->

    @yield('content')

    <!-- main content ends -->

    <!-- footer starts -->
    <section class="footer">
    <div class="container footer_bottom">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-md-6">
                  <div class="copyright_area">
                      <p> <a href="#"> &copy2023 S&S store. All rights are reserved.</a></p>
                  </div>
              </div>
          </div>
      </div>
      <!-- footer ends -->
  </div>
</section>
</body>
</html>