<?php
 session_start();
 $connect = mysqli_connect("localhost", "root", "root1234", "storeonline");
 if(isset($_POST["add_to_cart"]))
 {
      if(isset($_SESSION["shopping_cart"]))
      {
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'               =>     $_GET["id"],
                     'item_name'               =>     $_POST["hidden_name"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'          =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="cart.php"</script>';
           }
      }
      else
      {
           $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }
 if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                if($values["item_id"] == $_GET["id"])
                {
                     unset($_SESSION["shopping_cart"][$keys]);
                     echo '<script>alert("Item Removed")</script>';
                     echo '<script>window.location="cart.php"</script>';
                }
           }
      }
 }
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
             /* Remove the navbar's default rounded borders and increase the bottom margin <li><a href="#">Deals</a></li>
             <li><a href="#">Stores</a></li>*/
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
                <li class="active"><a href="products.php">Products</a></li>
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
           <div class="container" style="width:1000px;">
                <?php
                $query = "SELECT * FROM products ORDER BY id ASC";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                     while($row = mysqli_fetch_array($result))
                     {
                ?>
                <div class="col-md-4">
                     <form method="post" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:0px; margin-bottom:50px;" align="center">
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" />
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                               <h4 class="text-danger"><?php echo $row["price"]; ?> SR </h4>
                               <input type="text" name="quantity" class="form-control" value="1" />
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                               <input type="submit" name="add_to_cart" style="margin-top:5px; margin-bottom:5px" class="btn btn-danger" value="Add to Cart" />
                          </div>
                     </form>
                </div>
                <?php
                     }
                }
                ?>

           </div>
           <br />
      </body>
 </html>
