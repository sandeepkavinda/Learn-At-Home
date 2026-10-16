<?php
session_start();
require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 3) {

        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $mobile1 = $_POST["mobile1"];
        $mobile2 = $_POST["mobile2"];
        $email = $_POST["email"];
        $nic = $_POST["nic"];
        $address = $_POST["address"];
        $password = $fName . uniqid();
        $vcode = uniqid();

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $datetime = $d->format("Y-m-d H:i:s");

        if (empty($fName)) {
            echo ("Please Enter Student First Name");
        } else if (empty($lName)) {
            echo ("Please Enter Student Last Name");
        } else if (empty($mobile1)) {
            echo ("Please Enter Student Mobile Number 1");
        } else if (empty($mobile2)) {
            echo ("Please Enter Student Mobile Number 2");
        } else if (empty($email)) {
            echo ("Please Enter Student Email");
        } else if (empty($nic)) {
            echo ("Please Enter Student NIC");
        } else if (empty($address)) {
            echo ("Please Enter Student address");
        } else if (strlen($fName) >= 45) {
            echo ("The First Name is Too long");
        } else if (strlen($lName) >= 45) {
            echo ("The Last Name is Too long");
        } else if (strlen($mobile1) != 10) {
            echo ("Mobile Number 01 is not valid");
        } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile1)) {
            echo ("Mobile Number 01 is not valid");
        } else if (strlen($mobile2) != 10) {
            echo ("Mobile Number 02 is not valid");
        } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile2)) {
            echo ("Mobile Number 02 is not valid");
        } else if (!filter_var($email . FILTER_VALIDATE_EMAIL)) {
            echo ("Invalid Email");
        } else if (strlen($email) >= 50) {
            echo ("Email Is too long");
        } else if (strlen($nic) >= 20) {
            echo ("Email Is too long");
        } else {
            $student_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
            $student_num = $student_rs->num_rows;
            if ($student_num == "0") {

                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'learnathome.edu@gmail.com';
                $mail->Password = 'rslcssvvakerpuwg';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('learnathome.edu@gmail.com', 'Lean At Home Student Login Details');
                $mail->addReplyTo('learnathome.edu@gmail.com', 'Lean At Home Student Login Details');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Learn At Home Student Account Log In Details';
                $bodyContent = '<p>Email : ' . $email . '</p><p>Password : ' . $password . '</p><p>Verification Code : ' . $vcode . '</p>';
                $mail->Body    = $bodyContent;

                if (!$mail->send()) {
                    echo ("The system does not send email");
                } else {
                    Database::search("INSERT INTO `user` (`email`,`fName`,`lName`,`password`,`verification_code`,`verification_status_id`,`account_type_id`,`contact1`,`contact2`,`address`,`nic`,`registered_date_time`) 
                VALUES ('" . $email . "','" . $fName . "','" . $lName . "','" . $password . "','" . $vcode . "','2','1','" . $mobile1 . "','" . $mobile2 . "','" . $address . "','" . $nic . "','" . $datetime . "')");
                    echo ("Student Registered Successfully And Sent Email to Student");
                }
            } else if ($student_num == "1") {
                echo ("This Email is Already Registerd");
            } else {
                echo ("Something Went Wrong");
            }
        }
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
