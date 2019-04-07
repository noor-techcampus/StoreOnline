<?php
require_once "config.php";
session_start();
if($_POST['create']){//same write if($_POST['show'])
  $error=array();
  $fname=check($_POST['fname']);
  $lname=check($_POST['lname']);
  $email=check($_POST['email']);
  if(!$_POST['country']) $error[country]="please choose your country";
  else $status=$_POST['country'];
  $phone=check($_POST['phone']);
  $password=check($_POST['password']);
  if(!$_POST['gender']) $error[gender]="please choose your gender";
  else $gender=$_POST['gender'];
  $date=check($_POST['date']);


if(!$fname || !ctype_alpha($fname) || strlen($fname)>15)
  $error[fname]="invalid first name";
if(!$lname || !ctype_alpha($lname) || strlen($lname)>15)
  $error[lname]='invalid last name';
if(!$email || !filter_var($email,FILTER_VALIDATE_EMAIL))
  $error[email]='invalid email address';
if(!$phone || !ctype_digit($phone) || strlen($phone)!=10)
  $error[phone]='invalid phone number';
if(!$password || !ctype_alnum($password) || strlen($password)<6 || strlen($password)>20)
  $error[password]='invalid password';
if(!$error[password]) $password=md5($password);
if(!$date ||strlen($date)>10)
  $error[date]='invalid years number';
    if(!$error){
    $f=$_POST['fname'];
    $l=$_POST['lname'];
    $e=$_POST['email'];
    $c=$_POST['country'];
    $p=$_POST['phone'];
    $pa=$_POST['password'];
    $g=$_POST['gender'];
    $d=$_POST['date'];
    $query= "INSERT INTO admin (id,firstname,lastname,email,country,phonenum,password,gender,datebr)
    VALUES (NULL,'$f','$l','$e','$c','$p','$pa','$g','$d')";
    if(mysqli_query($link,$query)) header('location:welcome.php');//query from $query ,$connection from index.php file
    else header('location:register.php?err=error');}
}
  mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
     body {
        font-family:Arial, Helvetica, sans-serif;
        font-size:14px;
        line-height: 1.8;
        background-color: pink;
        color: #818181;
     }
     label {
        font-weight:bold;
        width:200px;
        font-size:14px;
     }
     .box {
        border:#666666 solid 1px;
        width:100%;
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
        <li><a href="home.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
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

      <div align = "center">
         <div style = "background-color:#333333; width:500px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px; text-align:center;"><b>Register</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                 <label>First name  :</label><input type = "text" name = "fname" class = "box"/><?php echo $error[fname]; ?><br /><br />
                 <label>Last name  :</label><input type = "text" name = "lname" class = "box"/><?php echo $error[lname]; ?><br /><br />
                  <label>Email  :</label><input type = "email" name = "email" class = "box"/><?php echo $error[email]; ?><br /><br />
                  <label>Country  :</label><input list="Country" name="country" class = "box"/><?php echo $error[country]; ?>
                  <datalist id="Country">
                  <option value="Riyadh">
                  <option value="Jeddah">
                  <option value="Makah">
                  <option value="Taif">
                  <option value="Medina">
                  </datalist><br /><br />
                  <label>Phone number  :</label><input type="text" name="phone" class = "box"/><?php echo $error[phone]; ?><br/><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><?php echo $error[password]; ?><br/><br />
                  <label>Gender  :</label><input type="radio" value="Male" name="gender"> Male
                  <input type="radio" value="Female" name="gender"> Female <?php echo $error[gender]; ?><br/><br />
                  <label>Date of birth  :</label><input type = "date" name = "date" class = "box" /><?php echo $error[date]; ?><br/><br />
                  <input type = "submit" name="create" value = " Create "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $_GET[err]; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>
