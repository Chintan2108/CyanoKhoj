<?php
session_start();
// for demo purpose
if($_POST['email']=='admin@email.com' && $_POST['pass']=='admin')
{
	$_SESSION['uname']='Demo User';
	$_SESSION['user_id']=0;
	$_SESSION['static_user']=true;
	header("Location:index.php");
}
else{
	require_once("db-connection.php");
		if(isset($_POST['email']) && isset($_POST['pass']))
		{
			$pass = $_POST['pass'];
			$pass=md5($pass);
			$email =$_POST['email'];
			$query="SELECT * FROM register_user WHERE user_email= :email";
			$statement=$conn->prepare($query);
			$statement->execute(array(":email"=>$email));
			$row=$statement->fetch(PDO::FETCH_ASSOC);
			if($row === false)
			{
				$_SESSION['message']="User does not exist.<br/>Register to create a new account.";
				header("Location:login.php");
				return;
			}
			else
			{
				if($pass != $row['user_password'])
				{
					$_SESSION['message']="Email and Password Combination Mismatch!";
					header("Location:login.php");
					return;
				}
				
				else
				{
					$_SESSION['uname']=$row['full_name'];
					$_SESSION['user_id']=$row['user_id'];
					header("Location:index.php");
				}
			}
		}
		else
		{
			header("Location:login.php");
			return;
		}
}

?>
