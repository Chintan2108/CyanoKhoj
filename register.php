<?php
require_once("db-connection.php");
require_once("external-links.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

</head>
<body>


<div class="parent-container container-fluid">
    <a href="login.php" style="text-decoration:none;">
        <h1 class="logo pl-2 pt-2"> CyanoKhoj<span>.</span> </h1>	
    </a>

    <div class="heading"> Register </div>
        <div class="main-container">
            <div class="form-container">

                <form action="register_to_database.php" method="POST" name="registration">

                    <div class="input-container">
                        <input type="text" name="fullname" id="fullname"  required>
                        <label for="name"> Full Name<span class="required">*</span> </label>
                    </div>

                    <div class="input-container">
                        <input type="email" name="email" id="email" required>
                        <label for="email"> Email<span class="required">*</span> </label>
                    </div>

                    <div class="input-container">
                        <input type="date" name="dob" id="dob" min="01/01/1930"  required>
                        <label for="dob"> Date of Birth<span class="required">*</span> </label>
                    </div>

                    <div class="input-container">
                        <input type="text" name="org" id="org" required>
                        <label for="org"> Organisation Name<span class="required">*</span></label>
                    </div>

                    <div class="input-container d-inline-block">
                        <input type="text" name="city" style="width: 16rem;overflow:hidden" id="city"  required>
                        <label for="city"> City<span class="required">*</span> </label>
                    </div>

                    <div class="input-container d-inline-block ml-4">
                        <input type="text" name="state" style="width: 18rem;overflow:hidden" id="state" required>
                        <label for="state"> State<span class="required">*</span> </label>
                    </div>

                    <div class="input-container">
                        <p style="font-size: 2.2rem;letter-spacing:.15rem;"> Organisation Type<span class="required">*</span>: </p>    
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required name="org_type" value="Government" class="name_field" > 
                            <span class="org_type ml-2"> Government </span> <br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required name="org_type" value="Private" class="name_field" > 
                            <span class="org_type ml-2"> Private </span> 
                    </div>

                    <div class="input-container">
                        <input type="text" name="contact_no" id="contact_no" placeholder="Mobile Number" 
                            pattern="[0-9]{3}" title="Only Digits Allowed">
                        <label for="mobile_no"> Contact No </label>
                    </div>

                    <div class="message-box text-warning" style="width: 36rem;">
                        Currently CyanoKhoj is operating only in India. So currently options for state and city are 
                        available for India Only.
                    </div>
                    <input type="submit" name="register-btn" id="submit-form" value="Register" class="btn">

                </form>
            </div>
            <div class="img-container">
                <img src="assets\img\register_page_art.svg" alt="Vector Art" class="img-fluid">
            </div>
        </div>
</div>    
</body>

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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    
<!--===============================================================================================-->
<script src="js/js-registration-validate.js"></script>

</html>