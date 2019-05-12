<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>
        
<div class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Home</a></li>
            <li><a href="about">About</a></li>
            <li><a href="users/login">Login</a></li>
            <li><a href="users/signup">Register</a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <input type="text" class="form-control col-lg-8" placeholder="Search">
          </form>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="users/logout">Logout</a></li>
            <li><a href="addproduct">Add Products</a></li>
            <li><a href="addcategory">Add Category</a></li>
            <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            My Profile <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
          </ul>
        </div>
      </div>
        <div class="flex-center position-ref full-height">
            <div class="containner-fluid">
                <div class="row">
                </div>

            </div>
        </div>
    </body>
</html>
