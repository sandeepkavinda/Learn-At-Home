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
    $teacher_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' AND `account_type_id`='2' ");
    $teacher_num = $teacher_rs->num_rows;

    if ($teacher_num == 1) {
        $teacher_data = $teacher_rs->fetch_assoc();

        if($remeberMe==1){
            setcookie("teacherEmail",$email,time()+(1*60*60*24*365));
            setcookie("teacherPassword",$password,time()+(1*60*60*24*365));
        }else{
            setcookie("teacherEmail",$email,time());
            setcookie("teacherPassword",$password,time());
        }

        if ($teacher_data["verification_status_id"] == 2) {
            echo ("not_verified");
        } else if ($teacher_data["verification_status_id"] == 1) {
            echo ("correct");
            $_SESSION["user"]=$teacher_data;
        } else {
            echo ("Somthing Went Wrong");
        }
    } else if ($teacher_num == 0) {
        echo ("Incorrect Email Or Password");
    } else {
        echo ("Somthing Went Wrong");
    }
}

?>