<?php
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'learnathome.edu@gmail.com';
$mail->Password = 'rslcssvvakerpuwg';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('learnathome.edu@gmail.com', 'Lean At Home Student Login Details');
$mail->addReplyTo('learnathome.edu@gmail.com', 'Reset Password');
$mail->addAddress('sandeepkavinda203@gmail.com');
$mail->isHTML(true);
$mail->Subject = 'Learn At Home Student Account Log In Details';
$bodyContent = '<p>Email : sandeepkavinda203@gmail.com</p><p>Password : sandeep12121212</p><p>Verification Code : 200205300222</p>';
$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo ("Verifacation Code Sending Failed ");
} else {
    echo ("Success");
}
?>