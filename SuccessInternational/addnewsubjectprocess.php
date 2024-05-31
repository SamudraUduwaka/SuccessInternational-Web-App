<?php

$id = 1;
require "connection.php";

$sub = $_POST["nc"];
$med = $_POST['m'];
$class = $_POST['c'];

if($class=="0"){
    echo "Select class";
}else if($med=="0"){
    echo "Select medium";
}else if(empty($sub)){
    echo "Give a subject name";
}else{
    $subject = Database::search("SELECT * FROM `subject` WHERE `name`='".$sub."' AND `medium_id`='".$med."'");
    $nsubject = $subject->num_rows;
    if($nsubject==0){
        Database::iud("INSERT INTO `subject`(`name`,`medium_id`) VALUES('".$sub."','".$med."')");
        $subj = Database::search("SELECT * FROM `subject` WHERE `name`='".$sub."' AND `medium_id`='".$med."'");
        $dsubj = $subj->fetch_assoc();
        $subID = $dsubj['id'];
        Database::iud("INSERT INTO `subject_has_class`(`subject_id`,`class_id`) VALUES('".$subID."','".$class."')");
        echo "Success";
    }else{
        $dsubject = $subject->fetch_assoc();
        $shc = Database::search("SELECT * FROM `subject_has_class` WHERE `subject_id`='".$dsubject['id']."' AND `class_id`='".$class."'");
        $nshc = $shc->num_rows;
        if($nshc==0){
            Database::iud("INSERT INTO `subject_has_class`(`subject_id`,`class_id`) VALUES('".$dsubject['id']."','".$class."')");
            echo "Success";
        }else{
            echo "Subject to that class is already available";
        }
    }
}

?>