<?php
require_once("db-connection.php");
require_once("external-links.php");
$alert="Invalid Link";
$valid_link="";
if(isset($_POST['submit-btn'])){
	echo("POST");
	header("Location:login.php");
}


if(isset($_POST['activation_code']))
{
  
  $query = "
		SELECT * FROM register_user 
		WHERE activation_code = :activation_code
	";
	$statement = $conn->prepare($query);
	$statement->execute(
		array(
			':activation_code'	=>	$_POST['activation_code']
		)
	);
	
  $row = $statement->fetch(PDO::FETCH_ASSOC);
	
	if($row!==false)
	{
		
			if($row['verification_status'] === 'not verified')
			{
				$update_query = "
				UPDATE register_user 
				SET verification_status = 'verified' 
				WHERE user_id = '".$row['user_id']."'
				";
				$statement = $conn->prepare($update_query);
				$statement->execute();
				$alert = ' Your Email address has been successfully Verified.
				<br/> In order to log in, you need to create a password.';
				$valid_link=true;
				
			}
			else
			{
				if($row['user_password'] === NULL){
					$alert="Your Email Address is already verified.
					<br/> You will need to create a password, in order to log in.";
					$valid_link=true;
				}
				else{
					$alert="Your Email Address is already verified.
					<br/> You can log in with the password you created.";
				}
			}
		
	}
	else
	{
		$alert = 'Invalid Link';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
		<title>CyanoKhoj Email Verification</title>		
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<link rel="stylesheet" type="text/css" href="css/verify-mail.css">
		<link rel="stylesheet" type="text/css" href="css/media-queries.css">
	<!--===============================================================================================-->
	</head>
	<body>

<div class="parent-container container-fluid">
<a href="login.php"><h1 class="logo pl-2 pt-2">CyanoKhoj<span>.</span></h1>	</a>
	
	<div class="message">
		<?php echo($alert);
		if($valid_link===true) {
		?>
	
	  <form  action="add-password.php" method="post" class="needs-validation mt-4" novalidate >
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd"
			pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$"
			
  title="Must contain at least one  number and one uppercase and lowercase letter and special character, and at least 8 or atmost 15 characters" required>
			<i class="fa fa-eye password-toggle" aria-hidden="true"></i>
			<div class="invalid-feedback pwd-1-validation"> </div>
			<div class="pwd-1-feeback text-warning my-3"></div>
		</div>

		<div class="form-group">
			<label for="re-pwd">Enter Password Again:</label>
			<input type="password" class="form-control" id="re-pwd" placeholder="Re-enter password" name="re-pwd" required>
			<i class="fa fa-eye password-toggle" aria-hidden="true"></i>
			<div class="invalid-feedback pwd-2-validation"> </div>
			<div class="pwd-2-feedback text-warning my-3"></div>
		</div>

			<input type="hidden" name="code" value="<?php echo(htmlentities($_POST['activation_code'])); ?>">
		<button type="submit" class="btn btn-primary submit-btn">Create Password</button>
	  </form>
	
	<?php 
			} 
		?>

	</div>
</div>
<script src="assets/js/main.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    
	var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
		}
			
		$(".pwd-1-validation").html("");
		$(".pwd-2-validation").html("");

		// Password Field Validation
		if($("#pwd").val().length>0)
		{
			var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			if(!($("#pwd").val().match(passw))) 
			{ 
				$(".pwd-1-validation").html("Must contain at least one number, one uppercase and lowercase letter <br/>and a special character , and at least 8 or atmost 15 characters");
				$(".pwd-1-feeback").html("");
				event.preventDefault();
				event.stopPropagation();
			}
		}
			else
				$(".pwd-1-validation").html("Please fill this field.");

		// Re-enter Password Field Validation
		if($("#re-pwd").val().length > 0)
		{
			if( $("#re-pwd").val() !== $("#pwd").val())
			{
				$(".pwd-2-validation").html("Passwords do not Match");
				$(".pwd-2-feedback").html("");
				event.preventDefault();
				event.stopPropagation();
			}
		}
			else
				$(".pwd-2-validation").html("Please fill this field.")
			
		form.classList.add('was-validated');
		
      }, false);
    });
  }, false);


  $("#re-pwd").keyup(function(){
	$("form").removeClass('was-validated');
	if($(this).val().length>2)
	{
		if( $(this).val() !== $("#pwd").val())
			$(".pwd-2-feedback").html("Passwords do not match");
		
		else
			$(".pwd-2-feedback").html("Passwords Match");
	}
	else
		$(".pwd-2-feedback").html("");
	  
	  
  });

  $("#pwd").keyup(function(){
	$("form").removeClass('was-validated');

	if($(this).val().length>1)
	{
		var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
		if(!($("#pwd").val().match(passw))) 
		{ 
			$(".pwd-1-feeback").html("Must contain at least one number, one uppercase and lowercase letter <br/>and a special character , and at least 8 or atmost 15 characters");
		}
		else
		$(".pwd-1-feeback").html("");
	}  	
	else
		$(".pwd-1-feeback").html("");
	
	  
	
	if($("#re-pwd").val().length>1)
	{	
		if($("#re-pwd").val() !== $(this).val())
			$(".pwd-2-feedback").html("Passwords do not match");
		else
			$(".pwd-2-feedback").html("Passwords Match");	
	}
});

    //Show Password Button
    $(".password-toggle").click( function() {
		// let icon=document.querySelector(".password-toggle");
		console.log($(this));
        if($(this).prev()[0].type === "password"){

			$(this).removeClass("fa-eye").addClass("fa-eye-slash");
            $(this).prev()[0].type="text";
        }
        else{
		   $(this).removeClass("fa-eye-slash").addClass("fa-eye");
		   $(this).prev()[0].type="password";
        }

    });

})();
</script>
</body>
</html>