<?php

session_start();
require "connection.php";

$email = $_POST["em"];
$password = $_POST["pw"];
$remeberMe = $_POST["rme"];

if ($email == "") {
    echo ("Please Enter Your Email");
} else if ($password == "") {
    echo ("Please Enter Your Password");
} else {
    $academic_officer_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' AND `account_type_id`='3' ");
    $academic_officer_num = $academic_officer_rs->num_rows;

    if ($academic_officer_num == 1) {
        $academic_officer_data = $academic_officer_rs->fetch_assoc();

        if($remeberMe==1){
            setcookie("acoEmail",$email,time()+(1*60*60*24*365));
            setcookie("acoPassword",$password,time()+(1*60*60*24*365));
        }else{
            setcookie("acoEmail",$email,time());
            setcookie("acoPassword",$password,time());
        }

        if ($academic_officer_data["verification_status_id"] == 2) {
            echo ("not_verified");
        } else if ($academic_officer_data["verification_status_id"] == 1) {
            echo ("correct");
            $_SESSION["user"]=$academic_officer_data;
        } else {
            echo ("Somthing Went Wrong");
        }
    } else if ($academic_officer_num == 0) {
        echo ("Incorrect Email Or Password");
    } else {
        echo ("Somthing Went Wrong");
    }
}

?>