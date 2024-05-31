<?php

session_start();
require "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
// $vcode = $_POST["v"];

if(empty($username)){
    echo "Enter Username";
}else if(empty($password)){
    echo "Enter Password";
}else{
    $aofficer = Database::search("SELECT * FROM `academic_officer` WHERE `email`='".$username."' AND `password`='".$password."'");
    $naofficer = $aofficer->num_rows;
    if($naofficer==1){
        $daofficer = $aofficer->fetch_assoc();
        if($daofficer['status_id']=="1"){
            $_SESSION["aofficer"] = $daofficer;
            echo "Success";
        }else{
            echo "1";
        }
        
    }else{
        echo "Invalid Credentials.Try again";
    }
}

?>