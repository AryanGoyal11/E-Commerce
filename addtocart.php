<?php
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('products.php');
require_once('cart.php');
  if(!empty($_GET['PID']) ){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $pid = $GET['PID'];
     }else {
    header('Location: productDisplay.php');
  }
  $products = new products();
  $category = $products->getCategory();
    $cart = new cart();
  if($pid!="VIEW"){
  $product = $products->getProduct();
  foreach ($product as $p){
    if ($p->ID==$pid) {
    $cartData = [
    'id' => $p->ID,
    'title' => $p->title,
    'price' => $p->price,
    'category'=>$p->category
];
}}
    $num3=0;

  $cd = $cart->getProduct();
 foreach ($cd as $c1) {
  if ($c1->id==$pid) {
    $num3++;
    $q=$c1->quantity+1;
  }}
  if($num3==1){
    print_r($product);
      echo $q;
      echo $pid;
  $cart->addquantity($pid,$q);
  }
  else{
  $cart->addProduct($cartData);
  }
}
$cd2 = $cart->getProduct();

?>
<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width-device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Cart</title>
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
   <li class="nav-item ">
      <a class="nav-link " href="logout.php">Logout</a>
    </li> 
    </ul>
    </nav>
    <br>
  <br>
  <hr>
  <div class="container mt-4">
    <h1 style="text-align: center;">Cart</h1>
    <hr>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Price</th>          
          <th>Quantity</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $amount=0;
        foreach ($cd2 as $c2){
          $amount+=($c2->price)*($c2->quantity);
          echo'
          <tr>
            <td>'.$c2->id.'</td>
            <td>'.$c2->title.'</td>
            <td>'.$c2->category.'</td>
            <td>'.sprintf('%.2f', $c2->price / 100).'</td>
            <td>'.$c2->quantity.'</td>
          </tr>'; }        
        ?>
      </tbody>
    </table>
    <?php echo'
    <a href="indexcart.php?amount='.$amount.'&PID=cart" class="btn btn-primary btn-block mt-4 buy">BUY NOW</a> ';
    ?>
    </div>
</body>
</html>