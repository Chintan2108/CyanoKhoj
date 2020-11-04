<?php
require_once("db-connection.php");
if(isset($_POST['userId']))
{
    $stmt=$conn->prepare("UPDATE register_user SET full_name =:name, state=:state, organisation=:organisation WHERE user_id=:user_id");
    $stmt->execute(array(
        ':name'             => $_POST['name'],
        ':organisation'     => $_POST['organisation'],
        ':state'            => $_POST['state'],
        ':user_id'          => $_POST['userId'] 
    ));
    echo("Record Updated");
}
else{
    echo("POST Data Not Set");
}
?>