<?php

session_start();
require "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
$vcode = $_POST["v"];

if(empty($username)){
    echo "Enter Username gain via email";
}else if(empty($password)){
    echo "Enter Password gain via email";
}else if(empty($vcode)){
    echo "Enter verification code gain via email";
}else{
    $aofficer = Database::search("SELECT * FROM `student` WHERE `email`='".$username."' AND `password`='".$password."' AND `verification_code`='".$vcode."'");
    $naofficer = $aofficer->num_rows;
    if($naofficer==1){
        $daofficer = $aofficer->fetch_assoc();
        if($daofficer['status_id']=="2"){
            Database::iud("UPDATE `student` SET `status_id`='1' WHERE `id`='".$daofficer['id']."'");
            $_SESSION["student"] = $daofficer;
            echo "Success";
        }
        
    }else{
        echo "Invalid Credentials.Try again";
    }
}

?>