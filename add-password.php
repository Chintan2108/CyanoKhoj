<?php 
require_once ("db-connection.php");
session_start();

if(isset($_POST['pwd']) && isset($_POST['code'])){
    $password=md5($_POST['pwd']);
    $code=htmlentities($_POST['code']);
    $query="UPDATE register_user SET user_password =:pwd WHERE activation_code= :code";
    $statement=$conn->prepare($query);
    $statement->execute(array(":pwd"=>$password,":code"=>$code ));
    $_SESSION['message']="Your account is set successfully. You can log in now.";
    header("Location:login.php");
    return;
}

?>