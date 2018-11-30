<?php
include 'dbconn.php';
session_start();

$name = $_POST['name'];
$password= $_POST['password'];
$strId_sql = "select * from users where name ='$name' and password = '$password'" ;
$strId_result = mysqli_query($conn, $strId_sql);

if(mysqli_num_rows($strId_result)==1)
{                       session_start();
			ob_start();
			$row=mysqli_fetch_array($strId_result,MYSQLI_ASSOC);

		 	$_SESSION['user_id']=  $row['id'];
                        //echo $_SESSION['user_id'];
		 	
                          header("Location: reminder.php"); 
                     
}
else
{
    $message="Invaild Username or Password";
	header("Location: login.php?message=".$message);
	exit;
}






?>
