<?php
require_once('products.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$description=$_POST['description'];
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$category = $_POST['category'];
$feature = $_POST['feature'];
$filename = $_FILES['pImage']['name'];
$filesize = $_FILES['pImage']['size'];
$filetemp = $_FILES['pImage']['tmp_name'];
$tmp = explode('.',  $_FILES['pImage']['name']);
$fileext = end($tmp);
$filepos="image/".$filename;
$errors=array();
$expensions=array("jpeg","jpg","PNG");
if(in_array($fileext, $expensions)===false)
{ 
     $errors[]="this type of file is not allowed.
                Please select JPEG,JPG or PNG format.";         
}
if($filesize>=2097152){
    $errors[]="File size must be 2MB";
}
  $product_image="image/".$filename;
if(empty($errors)==true)
{
    move_uploaded_file($filetemp,"image/".$filename);
}
else{ 
     print_r($errors);
}
$productData = [
    'id' => $id,
    'title' => $title,
    'price' => $price,
    'feature' => $feature,
    'pImage' => $filepos,
    'category'=>$category,
    'description'=>$description
];
$num2=0;
$products = new products();
$product=$products->getProduct();
foreach($product as $p){
    if($p->ID==$id)
        $num2++;
}
if ($num2==1) {
    header('location:addp.php');}
$products->addProduct($productData)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Thank You</title>
</head>
<body>
    <div class="container mt-4">
    <?php
        if($num2!=1){
            echo'
        <h2>Product added successfully </h2>
        <hr>
        <p>Your product name is '.$title.'</p>';
    }
        else{
            echo'
        <h2>Product was not added successfully </h2>
        <hr>
        <p>Product ID Already Taken</p>';
        }
        ?>
        <p><a href="addp.php" class="btn btn-primary mt-2">Add Products</a></p>
        <p><a href="pricing.php" class="btn btn-primary mt-2">View Products</a></p>

    </div>
</body>
</html>