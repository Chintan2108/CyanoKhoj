<?php
session_start();

if(isset($_SESSION['user_id'])) 
{
		if(isset($_SESSION['static_user']))
		{
			unset($_SESSION['static_user']);
			$user_name=$_SESSION['uname'];
		}

		else
		{
			require_once("db-connection.php");
			$stmt=$conn->prepare("SELECT full_name FROM register_user WHERE user_id=".$_SESSION['user_id']);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			$user_name=$row['full_name'];
		}
		
		$_SESSION['loggedOut']=true;
		$_SESSION['message']=htmlentities($user_name)." Logged Out succesfully!";
		echo "<script> location.href='login.php' </script>";
}
else 
	echo "<script> location.href='login.php' </script>";



?>
