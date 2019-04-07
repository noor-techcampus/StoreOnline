<?php
// Include config file
//require_once "config.php";
require 'function.php';
// Define variables and initialize with empty values
$username = $password = $confirm_password = $fname =$lname =$phone = $country=$gender=$date="";
$username_err = $password_err = $confirm_password_err = $fname_err = $lname_err =$phone_err = $country_err = $gender_err= $date_err="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Validate firstname
  if(empty(trim($_POST["fname"]))){
      $fname_err = "Please enter firstname.";
  } elseif(strlen(trim($_POST["fname"])) < 4){
      $fname_err = "firstname must have atleast 4 characters.";
  } else{
      $fname = trim($_POST["fname"]);
  }
  // Validate lastnamme
  if(empty(trim($_POST["lname"]))){
      $lname_err = "Please enter lastname.";
  } elseif(strlen(trim($_POST["lname"])) < 4){
      $lname_err = "lastname must have atleast 4 characters.";
  } else{
      $lname = trim($_POST["lname"]);
  }
  // Validate phonenum
  if(empty(trim($_POST["phone"]))){
      $phone_err = "Please enter phone.";
  } elseif(strlen(trim($_POST["phone"])) != 10){
      $phone_err = "phone number must have atleast 10 numbers.";
  } elseif(!ctype_digit(trim($_POST["phone"]))){
      $phone_err = "phone number must have only numbers.";
  } else{
      $phone = trim($_POST["phone"]);
  }
  // Validate country
  if(empty(trim($_POST["country"]))){
      $country_err = "Please choose your country.";
  } else{
      $country = trim($_POST["country"]);
  }
  // Validate gender
  if(empty(trim($_POST["gender"]))){
      $gender_err = "Please choose your gender.";
  } else{
      $gender = trim($_POST["gender"]);
  }
  // Validate date
  if(empty(trim($_POST["date"]))){
      $date_err = "Please choose your date of birth.";
  } else{
      $date = trim($_POST["date"]);
  }
    // Validate email
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM adminn WHERE email = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email is already taken.";
                } else{
                    $username = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["pass"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["pass"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($fname_err) && empty($lname_err) &&
  empty($phone_err) && empty($country_err) && empty($gender_err)&& empty($date_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO adminn (email, password, firstname, lastname, phonenum, country,gender,datebr) VALUES (?,?,?,?,?,?,?,?)";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_username, $param_password, $param_fname, $param_lname,$param_phone
          ,$param_country,$param_gender,$param_date);

            // Set parameters
            $param_username = $username;
            $param_fname = $fname;
            $param_lname = $lname;
            $param_phone = $phone;
            $param_country = $country;
            $param_gender = $gender;
            $param_date = $date;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
        <li><a href="products.php">Products</a></li>>
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
      <div style = "background-color:#333333; color:#FFFFFF; padding:3px; text-align:center;"><b>Sign Up</b></div>

      <div style = "margin:30px">
      <p>Please fill this form to create an account.</p>
         <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
             <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                 <label>First name  :</label>
                 <input type="text" name="fname" class="box" value="<?php echo $fname; ?>">
                 <span class="help-block"><?php echo $fname_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                 <label>Last name  :</label>
                 <input type="text" name="lname" class="box" value="<?php echo $lname; ?>">
                 <span class="help-block"><?php echo $lname_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                 <label>Email  :</label>
                 <input type="email" name="email" class="box" value="<?php echo $username; ?>">
                 <span class="help-block"><?php echo $username_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($country_err)) ? 'has-error' : ''; ?>">
                 <label>Country  :</label>
                 <input list="Country" name="country" class="box" >
                 <datalist id="Country">
                 <option value="Riyadh">
                 <option value="Jeddah">
                 <option value="Makah">
                 <option value="Taif">
                 <option value="Medina">
                 </datalist>
                 <span class="help-block"><?php echo $country_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                 <label>Phone number  :</label>
                 <input type="text" name="phone" class="box" value="<?php echo $phone; ?>">
                 <span class="help-block"><?php echo $phone_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                 <label>Password  :</label>
                 <input type="password" name="pass" class="box" value="<?php echo $password; ?>">
                 <span class="help-block"><?php echo $password_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                 <label>Confirm Password  :</label>
                 <input type="password" name="confirm_password" class="box" value="<?php echo $confirm_password; ?>">
                 <span class="help-block"><?php echo $confirm_password_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                 <label>Gender  :</label>
                 <input type="radio" name="gender" value="Female">Female
                 <input type="radio" name="gender" value="Male">Male<br/><br />
                 <span class="help-block"><?php echo $gender_err; ?></span>
             </div>
             <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                 <label>Date of birth  :</label>
                 <input type="date" name="date" class="box" value="<?php echo $date; ?>">
                 <span class="help-block"><?php echo $date_err; ?></span>
             </div>
             <div class="form-group" align = "center">
                 <input type="submit" class="btn btn-danger" value="Create">
                 <input type="reset" class="btn btn-default" value="Reset">
             </div>
             <p>Already have an account? <a href="login.php">Login here</a>.</p>
         </form>
      </div>
   </div>
</div>
</body>
</html>
