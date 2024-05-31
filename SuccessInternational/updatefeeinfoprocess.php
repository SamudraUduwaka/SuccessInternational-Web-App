<?php

session_start();
require "connection.php";

if(isset($_SESSION['unstudent'])){
    $id = $_SESSION['unstudent']['id'];

    $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d");
            $time = $d->format("H:i:s");

            $datejoined = $_SESSION['unstudent']['dateadded'];
                        $dj = new DateTime($datejoined);
                        $d = new DateTime($date);
                        $interval = $dj->diff($d);
                        $yearstudy;
                        if($interval->y==0){
                            $yearstudy=1;
                        }else if($interval->y==1){
                            $yearstudy=2;
                        }else if($interval->y==2){
                            $yearstudy=3;
                        }else if($interval->y==3){
                            $yearstudy=4;
                        }else if($interval->y==4){
                            $yearstudy=0;
                        }
    Database::iud("INSERT INTO `enrollment_payment` (`amount`,`time`,`year_study`,`student_id`,`status_id`,`date`) VALUES('$10','".$time."','".$yearstudy."','".$id."','1','".$date."')");
    
    $student = Database::search("SELECT * FROM `student` WHERE `id`='".$id."'");
    $dstudent = $student->fetch_assoc();
    $_SESSION["student"] = $dstudent;
    
    echo "success";
}
