<?php

   session_start();
   if($_POST['show']){//same write if($_POST['show'])
    header('location:register.php');//query from $query ,$connection from index.php file
   }
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "function.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["emails"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["emails"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["pass"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM admin WHERE email = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $username;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($connection);
}
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
        width:100px;
        font-size:14px;
     }
     .box {
        border:#666666 solid 1px;
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
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Email  :</label><input type = "email" name = "emails" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "pass" class = "box" /><br/><br />
                  <input type = "submit" name="login" value = " Login "/>
                  <input name="show" type = "submit" value = " Create Account "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>
