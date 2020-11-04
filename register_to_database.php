<?php
require_once("db-connection.php");
require_once("external-links.php");
use PHPMailer\PHPMailer\PHPMailer;

require_once 'vendor/phpmailer/Exception.php';
require_once 'vendor/phpmailer/PHPMailer.php';
require_once 'vendor/phpmailer/SMTP.php';
 
 $query = "
	SELECT * FROM register_user 
	WHERE user_email = :user_email
	";
	$statement = $conn->prepare($query);
	$statement->execute(
		array(
			':user_email'	=>	$_POST['email']
		)
	);
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	if($row!==false)
	{
		$alert = 'This Email Id is already registered';
		if($row['verification_status']==="not verified")
		{
			$alert.=". But not verified, check your email for verification mail";
		}
		else{
			$alert.=" and verified. <br/><br/> You will need to create a password for your account, through the link sent to your email.
			 <br/> If you have set the password, then <a href='login.php' >LOG IN</a> ";
		}
    }
    else{
        
		$salt='*Xx@1?';
		$activation_code = md5($_POST['email'].$salt);
		$insert_query = "
        INSERT INTO register_user 
		(full_name, user_email,date_of_birth,organisation,city,state,organisation_type,contact_no,activation_code,
		verification_status) 
		VALUES (:full_name, :user_email,:date_of_birth,:organisation,:city,:state,:organisation_type,:contact_no,
		:activation_code, :verification_status)
		";
		$statement = $conn->prepare($insert_query);
		$statement->execute(
			array(
				':full_name'			=>	$_POST['fullname'],
				':user_email'			=>	$_POST['email'],
                ':date_of_birth'		=>	$_POST['dob'],
                ':organisation'			=>	$_POST['org'],
                ':city'			        =>	$_POST['city'],
                ':state'			    =>	$_POST['state'],
                ':organisation_type'	=>	$_POST['org_type'],
                ':contact_no'	        =>	$_POST['contact_no'],
				':activation_code'	    =>	$activation_code,
				':verification_status'	=>	'not verified'
			)
		);
		

		$base_url = "http://34.67.7.17/CyanoKhoj/"; 
		
		$recipient = $_POST['email'];
		$subject = "Verify your email address for CyanoKhoj";

		$message = "<p>Hi ".htmlentities($_POST['fullname']).",</p>
		<p>Thank you for the registration with Cyanokhoj. To be able to use CyanoKhoj, please verify your email by clicking on the 
		link below.</p>
		<form  method='post' action=".$base_url.'verify_mail.php'.">
			<input type='hidden' target='blank' name='activation_code' value=".$activation_code.">
			<input type='submit' class='btn btn-info' value='Click Here'>
		</form>	
		<p>This an auto-generated email. Please do not reply to this email.</p>";
	

	
		$mail = new PHPMailer(true);
		try{
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = ''; // Gmail address which you want to use as SMTP server
			$mail->Password = ''; // Gmail address Password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = '587';

			$mail->setFrom(''); // Gmail address which you used as SMTP server
			$mail->addAddress($_POST['email']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $message;

			$mail->send();
			$alert = 'Thank You '.htmlentities($_POST['fullname']).' for registring with CyanoKhoj.<br/>
			Verification Link has been sent to your email. Click on that link to verify your account.</span>
						';
		} 
		catch (Exception $e){
			$alert = '<div class="alert-error">
						<span>'.$e->getMessage().'</span>
					</div>';
		}
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Message</title>
	    <!-- Template Main CSS File -->
		<link href="assets/css/style.css" rel="stylesheet">
	<!--===============================================================================================-->	
		<link href="images/icons/gee.ico" rel="icon">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/register.css">

		<style>

		body,.parent-container{
			background: radial-gradient(circle at 60% 100%,#5146b0  5%, #1b1754 94%) ;
			height: 100vh;
		}

		.message{
			position: absolute;
			top: 40%;
			left: 50%;
			transform: translate(-50%,-50%);
			font-size: 2.6rem;
			color: #ffd32a;
			width: 100%;
		}
    
		.message a{
			color: floralwhite;
			font-size: 2.6rem;
		}
		</style>
</head>
<body>
	
<div class="parent-container container-fluid">

	<a href="login.php" style="text-decoration:none;">
		<h1 class="logo pl-2 pt-2">CyanoKhoj<span>.</span></h1>	
	</a>
	
	<div class="message px-5">
		<?php echo($alert)?>
	</div>

</div>
    
</body>
</html>