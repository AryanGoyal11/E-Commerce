<?php
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('products.php');
session_start();
if(!isset($_SESSION['username']))
header('location:login.php'); 
$products = new products();
$category = $products->getCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,
  initial-scale=1.0">
  <meta http-equiv+"X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 <title>Add Products</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#">Logo</a>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="pricing.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addp.php">Add Product</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Category
      </a>
      <div class="dropdown-menu">
	  <?php
      foreach ($category as $c){
        echo'
        <a class="dropdown-item" href="category.php?Cat='.$c->category.'">'.$c->category.'</a>';
	    }
      ?>
      </div>
    </li>
    </ul>

    
    <div id="search">
          <form method="get" action="search.php" enctype="multipart/form-data">
             <input type="text" name="user_query" placeholder="Search...">
             <button type="submit" name="search">Search</button>
          </form>
          
       </div>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
      <a class="nav-link " href="addtocart.php?PID=VIEW">Cart</a>
    </li>
    <ul class="navbar-nav ml-auto">
   <li class="nav-item ">
      <a class="nav-link " href="logout.php">Logout</a>
    </li> 
    </ul>
</nav>
    <hr>
    <div class="container mt-4">
    <h1 class="mt-4 text-center">Product Details</h1>
      <hr>
<form action="./successp.php" method="POST" id="Product_addition" enctype="multipart/form-data">
  <div class="form-row">
      <input type="text" name="id" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="ID">
      <input type="text" name="title" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Title">
      <input type="text" name="price" class="form-control mb-3 StripeElement StripeElement--empty"  placeholder="Price">
      <input type="text" name="category" class="form-control mb-3 StripeElement StripeElement--empty"  placeholder="Category">
      <input type="text" name="feature" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Feature">
      <textarea name="description" class="form-control" cols="160" rows="5" wrap="physcial" placeholder="Description"></textarea>
    <div class="custom-file">
      <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
      <label for="customFile" class="custom-file-label">Select Image</label>
    </div>  
  <input type="submit" name="submit" class="btn btn-primary btn-block mt-4" value="Submit Product">
</form>
</div>
<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/charge.js"></script>
</body>
</html> 