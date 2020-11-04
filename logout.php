<?php
require_once("db-connection.php");
session_start();

if(isset($_SESSION['user_id'])) {
	$stmt=$conn->prepare("SELECT full_name FROM register_user WHERE user_id=".$_SESSION['user_id']);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

	$_SESSION['loggedOut']=true;
	$_SESSION['message']=htmlentities($row['full_name'])." Logged Out succesfully!";
	echo "<script> location.href='login.php' </script>";
}
else {
	echo "<script> location.href='login.php' </script>";
}

?>
