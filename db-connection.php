<?php
$servername = "localhost";
$username = "username";
$password = "password";
try{
  $conn = new PDO("mysql:host=$servername;port=3306;dbname=cyanokhoj", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  header("Location:db-error.html");
}
 ?>