<?php
require 'function.php';
session_start();
if($_POST['show']){//same write if($_POST['show'])
  $error=array();
  $email=check($_POST['email']);

if(!$email || !filter_var($email,FILTER_VALIDATE_EMAIL))
  $error[email]='invalid email address';

    if(!$error){
    $e=$_POST['email'];
    $query= "INSERT INTO email (id,email) VALUES (NULL,'$e')";
    if(mysqli_query($connection,$query)) header('location:welcome.php');//query from $query ,$connection from index.php file
    else header('location:home.php?err=Re-type your email correctly');}
}
  mysqli_close($connection);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flowers Stor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
        background-color: pink;
        color: #818181;
      }
      h2 {
        font-size: 24px;
        text-transform: uppercase;
        color: #303030;
        font-weight: 600;
        margin-bottom: 30px;
      }
      h4 {
        font-size: 19px;
        line-height: 1.375em;
        color: #303030;
        font-weight: 400;
        margin-bottom: 30px;
      }
      .item span {
    font-style: normal;
  }
      /* Remove the navbar's default rounded borders and increase the bottom margin */
      .navbar {
        margin-bottom: 50px;
        border-radius: 0;
      }

      /* Remove the jumbotron's default bottom margin */
       .jumbotron {
        margin-bottom: 0;
        background-image:url("image/backg.png");
      }
  .carousel-control.right, .carousel-control.left {
   background-image: none;
   color: #f4511e;
 }
 .carousel-indicators li {
   border-color: #f4511e;
 }
 .carousel-indicators li.active {
   background-color: #f4511e;
 }
 .item img {
   height: 500px;
   width:1000px;
  }

#map{
  height: 500px;
  width:700px;
}
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: pink;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Flowers Store</h1>
    <p>The Smell Of Beauty...</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <?php
if(!empty($_SESSION["shopping_cart"])) {
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
$cart_count = $cart_count + $values["item_quantity"];}
}
     ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span>
   <?php echo $cart_count; ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
  <h2>Our New Products</h2>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <span><img src="image/flo2.jpg"></span>
    </div>
    <div class="item">
      <span><img src="image/lo1.jpg"></span>
    </div>
    <div class="item">
      <span><img src="image/lo2.jpg"></span>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<footer class="container-fluid text-center">
  <div>
  <form class="form-inline" method="post" enctype="multipart/form-data" align="center">
    <h2>Get our new:</h2>
    <input type="email" name="email" class="form-control" size="50" placeholder="Email Address"><br><br>
    <input name='show' type="submit" class="btn btn-danger" value="Sign Up" ><?php echo $_GET[err]; ?>
  </form>
</div>
</footer>
</body>
</html>
