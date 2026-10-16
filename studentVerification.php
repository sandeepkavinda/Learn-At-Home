<?php

session_start();
require "connection.php";

$email = $_POST["em"];
$password = $_POST["pw"];
$vcode = $_POST["vc"];

if ($vcode == "") {
    echo ("Please Enter Verification Code");
} else{
    $student_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' AND `verification_code`='".$vcode."' AND `account_type_id`='1'");
    $student_num = $student_rs->num_rows;

    if ($student_num == 1) {
        $student_data = $student_rs->fetch_assoc();
        $_SESSION["user"]=$student_data;
        Database::iud("UPDATE `user` SET `verification_status_id`='1' WHERE `email`='".$student_data['email']."' AND `account_type_id`='1' ");
        echo("correct");

    } else if ($student_num == 0) {
        echo ("Incorrect Verification Code");
    } else {
        echo ("Somthing Went Wrong");
    }
}
