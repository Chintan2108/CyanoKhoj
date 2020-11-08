<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - CyanoKhoj</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	<link href="https://fonts.googleapis.com/css2?family=Acme&family=Arvo&family=Commissioner&family=Josefin+Sans&family=Jost:wght@500&family=Noto+Sans+JP:wght@500&family=Raleway:wght@500&family=Roboto&family=Ubuntu&family=Varela+Round&display=swap" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
	
	<div class="limiter">
	  
	<a href="login.php" style="text-decoration:none;">
        <h1 class="logo pl-2 pt-2"> CyanoKhoj<span>.</span> </h1>	
    </a>

  		<div class="container-login100">

			<div class="wrap-login100 p-t-50 p-b-90">

				<form class="login100-form validate-form flex-sb flex-w" action="validate_login.php" method="POST" autocomplete="off">
					<span class="login100-form-title mb-5">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input class="input100" type="email" name="email" id="uname" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input mb-3" data-validate = "Password is required">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<i class="fa fa-eye" id="password-toggle" aria-hidden="true"></i>
					</div>
					
					<div class="flex-sb-m w-full pt-3 pb-4">
						

						<div>
							<a href="#" class="txt1" style="color: #DD9106; font-size:2rem;" onclick="alert('Please contact administrator!')">
								Forgot?
							</a>
						</div>
						
						<div>
							<a href="#" class="txt1" style="color: #DD9106; font-size:2rem;" onclick="alert('Please login with email: admin@email.com & password: admin for demo.')">
								Demo
							</a>	
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="register-container w-100 mt-4">
						<button class="register-btn" onclick="window.location.href='register.php';">
							Register
						</button>
						<h2 class="text-center my-3">New Here? Register </h2>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- LIMITER END -->


	<!-- TOAST CONTAINER -->
	<div class="toast-container">
		<div class="toast" data-autohide="false" id="toast">
			<div class="toast-header">
				<strong class="mr-auto text-black">CyanoKhoj.</strong>
				<button type="button" id="toast-close" class="ml-2 mb-1 close" data-dismiss="toast" style="font-size:3rem;">&times;</button>
			</div>
			<div class="toast-body text-black text-capitalize" style="font-weight: 600;background: #DD9106;">
				<?php if(isset($_SESSION['message']))
					echo($_SESSION['message']); ?>
			</div>
		</div>
	</div>
	<!-- END OF TOAST CONTAINER -->

	


  <!-- Template Main JS File -->
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
<!--===============================================================================================-->

<!-- TOAST MESSAGE SCRIPT	 -->
<script>
$(document).ready(function(){
	<?php  
		//Display Toast only if Session['message'] is set
		if(isset($_SESSION['message'])) 
		{	
			echo("$('.toast-container').fadeIn();$('.toast').toast('show');");  
			unset($_SESSION['message']);
			
			//Destroy Session after Displaying 'Log out' Message
			if(isset($_SESSION['loggedOut']))
			{
				if($_SESSION['loggedOut'] === true)
					session_destroy();
			}
		}
	?>

	$toast=$(".toast");
	$inputField= $("#uname");
	//Hide Toast & Toast Container if clicked outside of Toast
	$(document).mouseup(event => {
		//Only if toast is being displayed
		if($toast.hasClass("show"))
		{
			if (!$toast.is(event.target) && $toast.has(event.target).length === 0) 
			{
				$('.toast').toast('hide');
				$('.toast-container').fadeOut();				
			}
			$inputField.focus();
		}
	});

	//Toast Close Button: Hide Toast & Container
	$("#toast-close").click( () =>{			
			$('.toast').toast('hide');
			$('.toast-container').fadeOut();
		});
});
</script>  


</body>
</html>
