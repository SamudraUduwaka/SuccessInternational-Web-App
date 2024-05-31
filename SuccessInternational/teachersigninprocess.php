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
    $teacher = Database::search("SELECT * FROM `teacher` WHERE `email`='".$username."' AND `password`='".$password."'");
    $nteacher = $teacher->num_rows;
    if($nteacher==1){
        $dteacher = $teacher->fetch_assoc();
        if($dteacher['status_id']=="1"){
            $_SESSION["teacher"] = $dteacher;
            echo "Success";
        }else{
            echo "1";
        }
        
    }else{
        echo "Invalid Credentials.Try again";
    }
}

?>