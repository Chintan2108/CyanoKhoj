<?php

$users = array('dyvavanikrishna' => 'minion123', 'chhayasharma' => 'betipushpa', 'bandatejaswari' => 'gisexpert', 'chintanmaniyar' => 'vampire123', 'admin' => 'admin' );

session_start();

$uname = $_POST['uname'];
$pass = $_POST['pass'];

if (array_key_exists($uname, $users))
{
	if ($users[$uname] == $pass) {
		$_SESSION['uname'] = $uname;

		echo "<script> location.href='index.php' </script>";
	}
	else {
		echo "<script> alert('Username and password combination mismatch!') </script>";
		echo "<script> location.href='login.php' </script>";
	}
}
else {
	echo "<script> alert('User does not exist!') </script>";
	echo "<script> location.href='login.php' </script>";
}
?>