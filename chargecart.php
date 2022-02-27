<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');
require_once('products.php');
\Stripe\Stripe::setApiKey('sk_test_Pv9uXGpkF3pM1uBGxff3aSiB00mJxUuvSk');
  if((!empty($_GET['amount']))and(!empty($_GET['PID']))){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $pid = $GET['PID'];
    $amount = $GET['amount'];
     }else {
    header('Location:addtocart.php');
  }

//Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create customer in stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
    "amount" => $amount,
    "currency" => "INR",
    "description" => "Cart",
    "customer" => $customer->id
));

// Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];

// Instantiate Customer
$customer = new Customer();

// Add Customer TO DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => "cart",
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction TO DB
$transaction->addTransaction($transactionData);

// Redirect to Succes
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);