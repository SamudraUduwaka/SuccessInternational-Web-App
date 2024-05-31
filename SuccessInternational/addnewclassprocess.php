<?php

$id = 1;
require "connection.php";

$class = $_POST["nc"];

if(empty($class)){
    echo "Give a class name first";
}else{
    $cla = Database::search("SELECT * FROM `class` WHERE `name`='".$class."'");
    $nclass = $cla->num_rows;
    if($nclass==0){
        Database::iud("INSERT INTO `class`(`name`) VALUES('".$class."')");
        echo "Success";
    }else{
        echo "This class already available";
    }
}

?>