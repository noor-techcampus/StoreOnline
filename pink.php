<?php

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Pink Flower</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  .panel {
    border: 1px solid #f4511e;
    border-radius:0;
    transition: box-shadow 0.5s;
  }

  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }

  .panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  }

  .panel-heading {
  background-image:url("image/flopro.png");
  height: 585px;
  width:1300px;
  }

  .panel-footer {
    background-color: #fff !important;
  }

  .panel-footer h3 {
    font-size: 32px;
  }

  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }

  .panel-footer .btn {
    margin: 15px 0;
    background-color: #f4511e;
    color: #fff;
  }
  </style>
</head>
<body>


  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <li> <a href="prodect.php">
        <span class="glyphicon glyphicon-arrow-left"></span> Back</a>
        </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        </ul>
      </div>
    </div>
  </nav>

<!-- Container (Pricing Section) -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          
        </div>
        <div class="panel-body">
          <p><strong>20</strong> Lorem</p>
          <p><strong>15</strong> Ipsum</p>
          <p><strong>5</strong> Dolor</p>
          <p><strong>2</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$19</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
