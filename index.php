<?php
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('products.php');
  if(!empty($_GET['PID']) ){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $pid = $GET['PID'];
     }else {
    header('Location: pricing.php');
  }
  $products = new products();
  $products = $products->getProduct();
  foreach ($products as $p){  
    if ($p->ID==$pid) {
      $title=$p->title;
      $price=$p->price;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv+"X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <title>Pay Page</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center"><?php echo $title ;?></h2>
    <?php
    echo'
<form action="./charge.php?PID='.$pid.'" method="post" id="payment-form">';
?>
  <div class="form-row">
      <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
      <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
      <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
    <label for="card-element">
      Credit Card details
    </label>
    <div id="card-element" class="form-control">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display Element errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>
</div>
<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/charge.js"></script>
</body>
</html> 