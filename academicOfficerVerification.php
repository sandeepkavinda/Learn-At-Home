<?php

session_start();
require "connection.php";

$email = $_POST["em"];
$password = $_POST["pw"];
$vcode = $_POST["vc"];

if ($vcode == "") {
    echo ("Please Enter Verification Code");
} else{
    $academicOfficer_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' AND `verification_code`='".$vcode."' AND `account_type_id`='3'");
    $academicOfficer_num = $academicOfficer_rs->num_rows;

    if ($academicOfficer_num == 1) {
        $academicOfficer_data = $academicOfficer_rs->fetch_assoc();
        $_SESSION["user"]=$academicOfficer_data;
        Database::iud("UPDATE `user` SET `verification_status_id`='1' WHERE `email`='".$academicOfficer_data['email']."' AND `account_type_id`='3' ");
        echo("correct");

    } else if ($academicOfficer_num == 0) {
        echo ("Incorrect Verification Code");
    } else {
        echo ("Somthing Went Wrong");
    }
}
