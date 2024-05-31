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
    $teacher = Database::search("SELECT * FROM `teacher` WHERE `email`='".$username."' AND `password`='".$password."' AND `verification_code`='".$vcode."'");
    $nteacher = $teacher->num_rows;
    if($nteacher==1){
        $dteacher = $teacher->fetch_assoc();
        if($dteacher['status_id']=="2"){
            Database::iud("UPDATE `teacher` SET `status_id`='1' WHERE `id`='".$dteacher['id']."'");
            $_SESSION["teacher"] = $dteacher;
            echo "Success";
        }
        
    }else{
        echo "Invalid Credentials.Try again";
    }
}

?>