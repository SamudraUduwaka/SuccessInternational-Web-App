<?php

//admin availability from session

require "connection.php";
$sid = $_POST['id'];

$resultset = Database::search("SELECT * FROM `student` WHERE `id`='".$sid."'");
$nresultset = $resultset->num_rows;

if($nresultset==1){

    $dresultset = $resultset->fetch_assoc();
    $statusId = $dresultset['status_id'];

    if($statusId=="1"){
        Database::iud("UPDATE `student` SET `status_id`='2' WHERE `id`='".$sid."'");
        echo "2";
    }else if($statusId=="2"){
        Database::iud("UPDATE `student` SET `status_id`='1' WHERE `id`='".$sid."'");
        echo "1";
    }

}else{
    echo "3";
}

?>