<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admincss/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

<!-- Font Awesome CSS-->
<link rel="stylesheet" href="{{ asset('admincss/vendor/font-awesome/css/font-awesome.min.css') }}">
<!-- Custom Font Icons CSS-->
<link rel="stylesheet" href="{{ asset('admincss/css/font.css') }}">
<!-- Google fonts - Muli-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
<!-- Theme stylesheet -->
<link rel="stylesheet" href="{{ asset('admincss/css/style.default.css') }}" id="theme-stylesheet">
<!-- Custom stylesheet - for your changes -->
<link rel="stylesheet" href="{{ asset('admincss/css/custom.css') }}">
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('admincss/img/favicon.ico') }}">

<style>
    .product-form-desigh{
        display: flex;
    justify-content: center;  
    align-items: center;
    margin-top: 60px;       
    }
    h1{
        color: white;
        text-align: center;
        font-size: 50px;
        font-weight: bold;

    }
    label{
        display: inline-block;
        width: 250px;
        font-size: 18px !important;
        color: white !important;

    }
    input[type="text"]{
      width: 250px;
      height: 50px;
    }
    textarea{
      width: 450px;
      height: 80px;
    }
    .input-div{
      margin-bottom: 20px;
    }
   

</style>
<!-- Tweaks for older IEs--><!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
        
       
            <!-- Log out               -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <input type="submit" value="Logout">
            </form>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="/admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_product')}}">Add Products</a></li>
                    <li><a href="{{url('view_product')}}">View Product</a></li>
                  </ul>
                </li>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      
<div>

    <h1>Add Product</h1>

    <div class="product-form-desigh">

    <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-div">
            <label for="title">Product Title</label>
            <input type="text" name="title"  id="title" required>
        </div>

        <div class="input-div">
            <label for="description">Description</label>
            <textarea type="text" name="description"  id="description" required></textarea>
        </div>

        <div class="input-div">
            <label for="pricee">Price</label>
            <input type="text" name="price"  id="title">
        </div>

        <div class="input-div">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity">
        </div>

        <div class="input-div">
            <label for="category">Product Category</label>
            <select  name="category" required>
                <option>Select a Option</option>

                @foreach ($category as $categories)
                    
                <option value="{{$categories->Category_name}}">{{$categories->Category_name}}</option>

                @endforeach

            </select>
        </div>

        <div class="input-div">
            <label>Product image</label>
            <input type="file" name="image">
        </div>

        
        <div class="input-div">
          <input class="btn btn-success" type="submit" value="Add product">
      </div>
    </form>

</div>
</div>
        
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom">2018 &copy;All rights reserved <a target="_blank" href="#">Developed By Ali zaib(Laravel Developer)</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->


   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  </body>
</html>