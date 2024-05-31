<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'email/Exception.php';
require 'email/PHPMailer.php';
require 'email/SMTP.php';
require "connection.php";

$user_name = $_POST["e"];
$password = $_POST["p"];
$verification_code = $_POST["v"];
$user_role = $_POST["role"];
$user_email = $_POST["e"];

if (empty($user_email)) {
    echo "Verify First";
} else if (empty($password)) {
    echo "Verify First";
} else if (empty($verification_code)) {
    echo "Verify First";
} else {

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'samuuduwaka@gmail.com';
    $mail->Password = 'simergoiokwpjzfo';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('samuuduwaka@gmail.com', 'SuccessInternational');
    $mail->addReplyTo('samuuduwaka@gmail.com', 'SuccessInternational');
    $mail->addAddress($user_email);
    $mail->isHTML(true);
    $mail->Subject = 'SuccessInternational SignIn Details';

    $bodyContent = '<h1 style="width: 100%;
background-color: #379FB7;
padding: 15px;
color: black;
text-align: center;
">SuccessInternational College</h1>';  //header 

    $bodyContent .= '<h2 style="color:black;">Sign In Details for SuccessInternational system</h2>'; //title

    $bodyContent .=  '<span style="display:block: color:#696969">Hello, We checked your information. Below is the username, password and verification code you need to enter this application. You can Sign In using that username, password, and verification code.<br/> Thease are private to you. Do not let others see this.</span>'; //description 

    $bodyContent .=  '<span style="display:block; margin-top: 25px;"> Your Role : ' . $user_role . '</span>'; //content
    $bodyContent .=  '<span style="display:block; margin-top: 5px;"> Username : ' . $user_name . '</span>'; //content 
    $bodyContent .=  '<span style="display:block; margin-top: 5px;"> Password : ' . $password . '</span>'; //content 
    $bodyContent .=  '<span style="display:block; margin-top: 5px;"> Verification Code : ' . $verification_code . '</span>'; //content 

    $bodyContent .= '<span style="color:black; display:block; margin-top: 35px;">Thank You..</span>'; //thanking area

    $bodyContent .= '<div style="width: 100%;
background-color: #379FB7;
padding: 30px;
margin-top: 25px;
color: black;">
<span style=" display: block;">SuccessInternational College</span>
<span style=" display: block;">No 32, Piliyandala, Colombo</span>
<span style=" display: block;">Contact : 0776380882</span>
</div>';  //footer 

    $mail->Body    = $bodyContent;

    if (!$mail->send()) {

        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d");

        Database::iud("INSERT INTO `" . $user_role . "`(`email`,`password`,`verification_code`,`status_id`,`dateadded`) VALUES('" . $user_email . "','" . $password . "','" . $verification_code . "','2','" . $date . "')");

        echo 'ok';
    }
}
