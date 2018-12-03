<?php
include 'dbconn.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password= $_POST['password'];
$confirm = $_POST['confirm'];

if($password==$confirm){

$sql = "INSERT INTO users (name, email, password) values ('$name','$email','$password')";
mysqli_query($con, $sql);
header("location: login.php"); 
}
else{
$message="Password and Confirm Password should be the same";
	header("Location: register.php?message=".$message);
	exit;
}



?>
