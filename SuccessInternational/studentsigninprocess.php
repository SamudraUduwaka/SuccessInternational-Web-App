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
    $student = Database::search("SELECT * FROM `student` WHERE `email`='".$username."' AND `password`='".$password."'");
    $nstudent = $student->num_rows;
    if($nstudent==1){
        $dstudent = $student->fetch_assoc();
        if($dstudent['status_id']=="1"){
            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d");

            $datejoined = $dstudent['dateadded'];
            $dj = new DateTime($datejoined);
            $d = new DateTime($date);
            $interval = $dj->diff($d);
            if($interval->m==1){
                $_SESSION["unstudent"] = $dstudent;
                echo "2";
            }else{
                $_SESSION["student"] = $dstudent;
                echo "success";
            }
            
            // echo "Success";
        }else{
            echo "1";
        }
        
    }else{
        echo "Invalid Credentials.Try again";
    }
}
