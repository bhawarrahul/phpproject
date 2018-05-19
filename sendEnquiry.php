

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/



<?php
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/Exception.php");
date_default_timezone_set('America/Toronto');

//require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer\PHPMailer\PHPMailer();
;

$body = "gdssdh";
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
$mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port = 465;                   // set the SMTP port for the GMAIL server
$mail->Username = "bhawar.rahul7@gmail.com";  // GMAIL username
$mail->Password = "";            // GMAIL password

$mail->SetFrom('bhawar.rahul7@gmail.com', 'PRSPS');

//$mail->AddReplyTo("user2@gmail.com', 'First Last");

$mail->Subject = "PRSPS password";

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "bhawar.rahul7@gmail.com";
$mail->AddAddress($address, "user2");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
$ReturnMsg = "";
if (!$mail->Send()) {
    $ReturnMsg = "Mailer Error: " . $mail->ErrorInfo;
} else {
    $ReturnMsg = "Message sent!";
}
$data->success= true;
$data->error = false;
$data->msg= $ReturnMsg;
header('Content-Type: application/json');
echo json_encode($data);
?>

