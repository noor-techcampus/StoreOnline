<?php
session_start();

?>
<!DOCTYPE html>
<html>
     <head>
          <title>Flowers Stor</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <style>
          body {
              font: 400 15px Lato, sans-serif;
              line-height: 1.8;

              background-color: #90DEA2;
              color: #818181;
            }
            del{
              color: red;
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
               <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
               <li class="active"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span>
          <?php echo $cart_count; ?></span></a></li>
             </ul>
           </div>
         </div>
       </nav>
<h3>Order Details</h3>
<div class="table-responsive">
     <table class="table table-bordered">
          <tr>
               <th width="40%">Item Name</th>
               <th width="10%">Quantity</th>
               <th width="20%">Price</th>
               <th width="15%">Total</th>
               <th width="5%">Action</th>
          </tr>
          <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
               $total = 0;
               foreach($_SESSION["shopping_cart"] as $keys => $values)
               {
          ?>
          <tr>
               <td><?php echo $values["item_name"]; ?></td>
               <td><?php echo $values["item_quantity"]; ?></td>
               <td>$ <?php echo $values["item_price"]; ?></td>
               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
               <td><a href="products.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
          </tr>
          <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
               }
          ?>
          <tr>
               <td colspan="3" align="right">Total</td>
               <td align="right">$ <?php echo number_format($total, 2); ?></td>
               <td></td>
          </tr>
          <?php
          }
          ?>
     </table>
     <div class="form-group" align = "center">
         <input type="submit" class="btn btn-danger" value="checkout">
     </div>
</div>
</body>
</html>
