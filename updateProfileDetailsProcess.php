<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    $mobile1 = $_POST["m1"];
    $mobile2 = $_POST["m2"];
    $address = $_POST["ad"];

    if(strlen($mobile1)!=10){
        echo("Contact Number 1 is Not Valid");
    }else if(strlen($mobile2)!=10){
        echo("Contact Number 2 is Not Valid");
    }else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile1)){
        echo("Contact Number 1 is Not Valid");
    }else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile2)){
        echo("Contact Number 2 is Not Valid");
    }else{
        $userdata_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$_SESSION["user"]["email"]."'");
        $userdata_num = $userdata_rs->num_rows;
        if($userdata_num=1){
            $user_data = $userdata_rs->fetch_assoc();
            Database::iud("UPDATE `user` SET `contact1`='" . $mobile1 . "', `contact2`='".$mobile2."', `address`='".$address."' WHERE `email`='".$_SESSION["user"]["email"]."' ");
            echo("Profile Updated Successfully");
        }else{
            echo ("Somthing Went Wrong");
        }
    }
} else {
    header("Location:index.php");
}
