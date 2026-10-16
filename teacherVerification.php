<?php

session_start();
require "connection.php";

$email = $_POST["em"];
$password = $_POST["pw"];
$vcode = $_POST["vc"];

if ($vcode == "") {
    echo ("Please Enter Verification Code");
} else{
    $teacher_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' AND `verification_code`='".$vcode."' AND `account_type_id`='2'");
    $teacher_num = $teacher_rs->num_rows;

    if ($teacher_num == 1) {
        $teacher_data = $teacher_rs->fetch_assoc();
        $_SESSION["user"]=$teacher_data;
        Database::iud("UPDATE `user` SET `verification_status_id`='1' WHERE `email`='".$teacher_data['email']."' AND `account_type_id`='2' ");
        echo("correct");

    } else if ($teacher_num == 0) {
        echo ("Incorrect Verification Code");
    } else {
        echo ("Somthing Went Wrong");
    }
}
