<?php

$id = 1;//from session

require "connection.php";

$password = $_POST["p"];
$verification_code = $_POST["v"];
$user_role = $_POST["role"];
$user_email = $_POST["e"];
$class = $_POST['c'];

if(empty($user_email)){
    echo "First enter the email address";
}else if($class=="0"){
    echo "Select the class";
}else if(empty($password)){
    echo "Generate a password";
}else if(empty($verification_code)){
    echo "Generate a verification code";
}else{
    $resultset = Database::search("SELECT * FROM `".$user_role."` WHERE `password`='".$password."' OR `verification_code`='".$verification_code."'");
    $nresultset = $resultset->num_rows;

    if($nresultset==0){
        $res = Database::search("SELECT * FROM `".$user_role."` WHERE `email`='".$user_email."'");
        $nres = $res->num_rows;
        if($nres==1){
            echo "1";
        }else{
            echo "2";
        }
    }else{
        echo "3";
    }
}

?>