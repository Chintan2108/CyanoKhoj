<?php

session_start();

if(isset($_SESSION['uname'])) {
	$_SESSION['loggedOut']=true;
	$_SESSION['message']=$_SESSION['uname']." Logged Out succesfully!";
	echo "<script> location.href='login.php' </script>";
}
else {
	echo "<script> location.href='login.php' </script>";
}

?>
