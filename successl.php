<?php
require_once('validation.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
session_start();
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$user = $_POST['user'];
$pass = $_POST['password'];
$_SESSION['username']=$user;
echo $_SESSION['username'];
$userData=[
'user'=>$user,
'pass'=>$pass];
$num=0;
$registration = new registration();

$userDataP=$registration->getUser();
foreach($userDataP as $p){
	if(($p->Username==$user)and($p->Password==$pass))
		$num++;
}
if ($num==1) {
	header('location:pricing.php');
}
else{
header('location:login.php');
}
?>