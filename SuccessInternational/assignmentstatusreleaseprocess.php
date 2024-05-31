<?php

$id = 1;
require "connection.php";

if(isset($_POST['aid'])){
    $assignmentmarkid = $_POST["aid"];

    $shas = Database::search("SELECT * FROM `student_has_assignmentmark` WHERE `id`='".$assignmentmarkid."'");
    $nshas = $shas->num_rows;

    if($nshas==1){
        $dshas = $shas->fetch_assoc();
        $shasStatusId = $dshas["status_id"];

        if($shasStatusId=="1"){
            Database::iud("UPDATE `student_has_assignmentmark` SET `status_id`='2'");
            echo "2";
        }else if($shasStatusId=="2"){
            Database::iud("UPDATE `student_has_assignmentmark` SET `status_id`='1'");
            echo "1";
        }
    }else{
        echo "No such record available";
    }
    
}else{
    echo "An error occured";
}

?>