<?php
require_once "Mail.php";

$from = "maher1130258@live.com";
$to = "the-maher@live.com";
$subject = "new task from";
$body = "a messege come from ";

$host = "smtp.gmail.com";
$username = "maher1130258@gmail.com";// your email
$password = "MAHER123";//your password

//https://accounts.google.com/DisplayUnlockCaptcha
//https://www.google.com/settings/security/lesssecureapps


$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'auth' => true,
'username' => $username,
'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("" . $mail->getMessage() . "");
} else {
echo("Message successfully sent!");
}
?>
