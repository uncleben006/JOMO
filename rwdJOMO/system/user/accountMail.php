<!--給signupCheck.php include-->
<!--給signupCheck.php include-->
<!--給signupCheck.php include-->

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
header("Content-Type:text/html; charset=utf-8");
require '../../include/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = false; // authentication enabled
$mail->SMTPSecure = false; // secure transfer enabled REQUIRED for Gmail
$mail->Host = 'localhost';
$mail->Port = 25; // 465 or 587
$mail->IsHTML(true);
$mail->Username = "ics.jomorparty@gmail.com";
$mail->Password = "Jomorparty";
$mail->SetFrom("ics.jomorparty@gmail.com");
$mail->Subject = mb_encode_mimeheader('A message from JOMO', "UTF-8");//email的主旨

?>