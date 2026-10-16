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
    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
    $admin_num = $admin_rs->num_rows;

    if ($admin_num == 1) {
        $admin_data = $admin_rs->fetch_assoc();

        if ($remeberMe == 1) {
            setcookie("adminEmail", $email, time() + (1 * 60 * 60 * 24 * 365));
            setcookie("adminPassword", $password, time() + (1 * 60 * 60 * 24 * 365));
        } else {
            setcookie("adminEmail", $email, time());
            setcookie("adminPassword", $password, time());
        }

        echo ("correct");
        $_SESSION["user"] = $admin_data;
    } else if ($aadmin_num == 0) {
        echo ("Incorrect Email Or Password");
    } else {
        echo ("Somthing Went Wrong");
    }
}
?>