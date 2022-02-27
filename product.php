<?php
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('products.php');

  // Instantiate Customer
  $products = new products();

  // Get Customer
  $products = $products->getProduct();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>View Customers</title>
</head>
<body>
  <div class="container mt-4">
    <div class="btn-group" role="group">
      <a href="customers.php" class="btn btn-secondary">Customers</a>
      <a href="transactions.php" class="btn btn-secondary">Transactions</a>
       <a href="product.php" class="btn btn-primary">Products</a>
    </div>
    <hr>
    <h2>Products</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Title</th>
          <th>Amount</th>
          <th>Feature</th>
          <th>Category</th>
          <th>Description</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($products as $p): 
          echo'
          <tr>
            <td>'.$p->ID.'</td>
            <td>'.$p->title.'</td>
            <td>'.sprintf('%.2f', $p->price / 100).'</td>
            <td>'.$p->feature.'</td>
            <td>'.$p->category.'</td>
            <td>'.$p->description.'</td>
            <td><a href="'.$p->product_image.'" download>Download</a></td>
          </tr>';
         endforeach
         ?>
      </tbody>
    </table>
    <br>
    <p><a href="pricing.php" class="btn btn-primary mt-4">Product Page</a></p>
  </div>
</body>
</html>