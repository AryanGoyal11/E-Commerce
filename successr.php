<?php
require_once('validation.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
header('location:login.php');
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$user = $_POST['user'];
$pass = $_POST['password'];
$userData=[
'user'=>$user,
'pass'=>$pass];
$num=0;
$registration = new registration();

$userDataP=$registration->getUser();
foreach($userDataP as $p){
	if($p->Username==$user)
		$num++;
}
if ($num==1) {
	echo "Username Already Taken";
}
else{
	echo "Registration Successfull";
	$registration->addUser($userData);
}
?>