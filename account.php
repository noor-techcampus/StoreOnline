<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
      h1 {
        color: #303030;
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
        <li><a href="home.php">Home</a></li>
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
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span>
   <?php echo $cart_count; ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="carousel slide text-center" data-ride="carousel">
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to our site.</h1>
  <img src="image/logo.png">
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    </div>
</body>
</html>
