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
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
	  
		<h1 class="logo mx-2 pt-2">CyanoKhoj<span>.</span></h1>	

  		<div class="container-login100">

			<div class="wrap-login100 p-t-50 p-b-90">

				<form class="login100-form validate-form flex-sb flex-w" action="validate_login.php" method="POST" autocomplete="off">
					<span class="login100-form-title mb-5">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input class="input100" type="text" name="uname" id="uname" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<i class="fa fa-eye" aria-hidden="true"></i>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						

						<div>
							<a href="#" class="txt1" style="color: #DD9106; font-size:20px;" onclick="alert('Please contact administrator!')">
								Forgot?
							</a>
						</div>
						
						<div>
							<a href="#" class="txt1" style="color: #DD9106; font-size:20px;" onclick="alert('Please login with username: admin & password: admin for demo.')">
								Demo
							</a>	
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>


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
	

</body>
</html>
