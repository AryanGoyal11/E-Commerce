<?php  
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('products.php');
session_start();
if(!isset($_SESSION['username']))
header('location:login.php');
if(!empty($_GET['PID']) ){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $pid = $GET['PID'];
     }else {
    header('Location: pricing.php');
  }
  $products = new products();
  $category = $products->getCategory();
  $product = $products->getProduct();

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width-device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Product Details Page</title>
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
         <div>
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
</nav><div class="container mt-4">
    <div class="container">
    <?php
   	foreach ($product as $p){
    	If($p->ID==$pid){    
        echo'
        <h1 class="text-center">'.$p->title.'</h1>
        <hr>
        <div class="row">
        <div class="col-md-4">
                <img src="'.$p->product_image.'" class="w-100">
                </div>
        <div class="col-md-6 text-center">
        		<br>
                <br>
                <br>
                <h5 class="text-center">Category: '.$p->category.'</h5>
                <h5>Feature: '.$p->feature.'</h5>
                <h5>Price: Rs.'.sprintf('%.2f', $p->price / 100).'</h5>
                <h5>Description:</h5>
                <p>'.$p->description.'</p>
                <a href="addtocart.php?PID='.$p->ID.'" class="btn btn-primary btn-block cart px-auto">ADD TO CART</a>
            <a href="index.php?PID='.$p->ID.'" class="btn btn-primary btn-block mt-4">BUY NOW</a>

        </div>';
        }}
    ?>
</div>
</BODY>
</html>