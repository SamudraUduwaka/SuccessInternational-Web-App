<?php

require "connection.php";
$id = 1;//from session
$idt = $_POST['id'];

$resultset = Database::search("SELECT * FROM `teacher` WHERE `id`='".$idt."'");
$nresultset = $resultset->num_rows;

if($nresultset==1){

    $dresultset = $resultset->fetch_assoc();
    $statusId = $dresultset['status_id'];

    if($statusId=="1"){
        Database::iud("UPDATE `teacher` SET `status_id`='2' WHERE `id`='".$idt."'");
        echo "2";
    }else if($statusId=="2"){
        Database::iud("UPDATE `teacher` SET `status_id`='1' WHERE `id`='".$idt."'");
        echo "1";
    }

}else{
    echo "3";
}

?>