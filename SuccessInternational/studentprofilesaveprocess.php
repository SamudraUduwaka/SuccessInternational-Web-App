<?php

$id =1;
require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$gender = $_POST["g"];

if(empty($fname)){
    echo "First name can't be empty";
}else if(empty($lname)){
    echo "Last name can't be empty";
}else if(empty($email)){
    echo "Email can't be empty";
}else if(empty($mobile)){
    echo "Mobile can't be empty";
}else if(strlen($mobile)!=10){
    echo "Invalid Mobile";
}else if($gender=="0"){
    echo "Select gender";
}else{
    Database::iud("UPDATE `student` SET `fname`='".$fname."',`lname`='".$lname."',`email`='".$email."',`mobile`='".$mobile."',`gender_id`='".$gender."'");
    echo "Success";
}


?>