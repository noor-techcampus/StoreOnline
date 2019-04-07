<?php
$connect = mysqli_connect("localhost","root","root1234","storeonline");
if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    
  }
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
        <li class="active"><a href="prodect.php">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>Pink Flower</h4>
        </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo1.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">
          <div><input name='show' type="submit" class="btn btn-danger" value="-" >
            <input type="number" name="num">
          <input name='show' type="submit" class="btn btn-danger" value="+" ></div>
          price:50 SR</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>Color Flower</h4>
        </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo2.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading text-center">
          <h4>Red Tulip</h4>
        </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo3.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR<del> 150 SR</del></div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading text-center">
          <h4>Yellow Flowers</h4>
        </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo4.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR<del> 150 SR</del></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>Pink Roses</h4>
          </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo5.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>Baby Pink Roses<h4>
          </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo6.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>Baby Pink Tulip</h4>
        </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo7.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>White Roses</h4>
          </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo8.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading text-center">
          <h4>Yellow Roses<h4>
          </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo9.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR<del> 150 SR</del></div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>Pink-Baby Pink Roses</h4>
        </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo10.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading text-center">
          <h4>Pink Tulip</h4>
          </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo11.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price: 50 SR <del> 150 SR</del></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center">
          <h4>Yellow Tulip<h4>
          </div>
        <div class="panel-body">
          <a href="#">
          <img src="image/flo12.png" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer text-center">price:50 SR</div>
      </div>
    </div>
  </div>
</div><br><br>
<?php
$query = "SELECT * FROM  product ORDER BY id ASC";
$result = mysqli_query($connect,$query);
if(mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_array($result))
  {
?>
<div class="col-md-4">
<form method="post" action="prodect.php?action=add&id=<?php echo $row["id"];?>">
<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
  <img src="<?php echo $row["image"];?>" class="img-responsive"/><br/>
  <h4 class="text-info"><?php echo $row["name"];?></h4>
  <h4 class="text-danger"><?php echo $row["price"];?></h4>
  <input type="text" name="quantity" class="form-control" value="1" />
  <input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>" />
  <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>" />
  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
</div>
</form>
</div>
<?php
  }
}
 ?>
</body>
</html>
