<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if (isset($_FILES["profileImg"])) {
        $image = $_FILES["profileImg"];
        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (in_array($file_ex, $allowed_image_extentions)) {
            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg+xml";
            }

            $file_name = "images/profile_images/" . $_SESSION["user"]["fName"] . "_" . uniqid() . $new_file_extention;
            move_uploaded_file($image["tmp_name"], $file_name);

            $profileImg_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $_SESSION['user']['email'] . "'");
            $profileImg_num = $profileImg_rs->num_rows;

            if ($profileImg_num == 1) {

                Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE `user_email`='" . $_SESSION["user"]["email"] . "' ");

                $profileImage_data = $profileImg_rs->fetch_assoc();
                $old_image = $profileImage_data["path"];

                unlink($old_image);

                echo ("Profile picture have been updated");
            } else if ($profileImg_num == 0) {
                Database::iud("INSERT INTO `profile_image` (`path`,`user_email`) VALUES ('" . $file_name . "','" . $_SESSION["user"]["email"] . "') ");
                echo ("Profile picture have been updated");
            } else {
                echo ("Profile picture have been updated");
            }
        } else {
            echo ("Somthing Went Wrong");
        }
    }
}
