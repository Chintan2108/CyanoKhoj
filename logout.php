<?php

session_start();

if(isset($_SESSION['uname'])) {
	session_destroy();
	echo "<script> alert('" . $_SESSION['uname'] . " logged out succesfully!') </script>";
	echo "<script> location.href='login.php' </script>";
}
else {
	echo "<script> location.href='login.php' </script>";
}

?>