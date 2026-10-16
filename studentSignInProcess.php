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
    $student_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' AND `account_type_id`='1' ");
    $student_num = $student_rs->num_rows;

    if ($student_num == 1) {
        $student_data = $student_rs->fetch_assoc();

        if($remeberMe==1){
            setcookie("studentEmail",$email,time()+(1*60*60*24*365));
            setcookie("studentPassword",$password,time()+(1*60*60*24*365));
        }else{
            setcookie("studentEmail",$email,time());
            setcookie("studentPassword",$password,time());
        }

        if ($student_data["verification_status_id"] == 2) {
            echo ("not_verified");
        } else if ($student_data["verification_status_id"] == 1) {
            echo ("correct");
            $_SESSION["user"]=$student_data;
        } else {
            echo ("Somthing Went Wrong");
        }
    } else if ($student_num == 0) {
        echo ("Incorrect Email Or Password");
    } else {
        echo ("Somthing Went Wrong");
    }
}

?>