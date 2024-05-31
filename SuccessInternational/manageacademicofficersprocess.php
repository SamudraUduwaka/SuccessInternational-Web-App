<?php

require "connection.php";
$aid = $_POST['id'];

$resultset = Database::search("SELECT * FROM `academic_officer` WHERE `id`='".$aid."'");
$nresultset = $resultset->num_rows;

if($nresultset==1){

    $dresultset = $resultset->fetch_assoc();
    $statusId = $dresultset['status_id'];

    if($statusId=="1"){
        Database::iud("UPDATE `academic_officer` SET `status_id`='2' WHERE `id`='".$aid."'");
        echo "2";
    }else if($statusId=="2"){
        Database::iud("UPDATE `academic_officer` SET `status_id`='1' WHERE `id`='".$aid."'");
        echo "1";
    }

}else{
    echo "3";
}

?>