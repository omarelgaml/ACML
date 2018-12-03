<?php
include 'dbconn.php';
session_start();
if (empty($_SESSION['user_id']) ) {
//header("Location: login.php");
    }

else{
    $user_id = $_SESSION['user_id'];

}

$user_id = $_SESSION['user_id'];
//echo $user_id ;

$lng = $_POST["pickup_addresslng"];
$lat = $_POST["pickup_addresslat"];
$desc = $_POST["desc"];
$details = $_POST["details"];
$place = $_POST["place"];

$sql = "INSERT INTO reminders (user_id,latitude,longitude,reminder_description,address_details,location) values('$user_id','$lat','$lng','$desc','$details','$place')";
mysqli_query($con, $sql);

header("location: reminder.php"); 



 ?>



















?>
