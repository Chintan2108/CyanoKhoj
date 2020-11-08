<?php
require_once("db-connection.php");
if(isset($_POST['userId']))
{
    // echo($_POST['userId']);
    $stmt=$conn->prepare("SELECT * FROM register_user WHERE
    user_id=".$_POST['userId']);
    $stmt->execute();
    
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
    if($row!==false) 
	{
    $return_arr[] = array("name" => $row['full_name'],
                    "email" => $row['user_email'],
                    "organisation" => $row['organisation'],
                    "state" =>$row['state']);
                  
        echo json_encode($return_arr);
        
    }
    else
	echo "User Not Found";
}
else{
echo("POST Data Not Set");
}
?>