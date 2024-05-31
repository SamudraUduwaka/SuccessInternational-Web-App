<?php

session_start();
require "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];

if(empty($username)){
    echo "Enter Username";
}else if(empty($password)){
    echo "Enter Password";
}else{
    $admin = Database::search("SELECT * FROM `admin` WHERE `email`='".$username."' AND `password`='".$password."'");
    $nadmin = $admin->num_rows;
    if($nadmin==1){
        $dadmin = $admin->fetch_assoc();
        $_SESSION["admin"] = $dadmin;
        echo "Success";
    }else{
        echo "Invalid Credentials.Try again";
    }
}

?>