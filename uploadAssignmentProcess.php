<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 1) {

        if (isset($_FILES["answersheet"])) {
            $file = $_FILES["answersheet"];
            $assgnment_id = $_POST["id"];
            $allowed_image_extentions = array("application/pdf", "x-zip-compressed", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            $file_ex = $file["type"];

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $now = $d->format("Y-m-d H:i:s");

            if (in_array($file_ex, $allowed_image_extentions)) {
                $new_file_extention;

                if ($file_ex == "application/pdf") {
                    $new_file_extention = ".pdf";
                } else if ($file_ex == "x-zip-compressed") {
                    $new_file_extention = ".zip";
                } else if ($file_ex == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    $new_file_extention = ".docx";
                }

                $file_name = "assignmentAnswers/" . $_SESSION["user"]["fName"] . "_" . "assignment_" . $assgnment_id . uniqid() . $new_file_extention;
                move_uploaded_file($file["tmp_name"], $file_name);

                $answesheets_rs = Database::search("SELECT * FROM `assignment_answers` WHERE `assignments_id`='" . $assgnment_id . "' AND `user_email`='" . $_SESSION["user"]["email"] . "' ");
                $answesheets_num = $answesheets_rs->num_rows;

                if ($answesheets_num == 1) {
                    Database::iud("UPDATE `assignment_answers` SET `answersheet_path`='" . $file_name . "', `submitted_date_time`='".$now."' WHERE `assignments_id`='" . $assgnment_id . "' AND `user_email`='" . $_SESSION["user"]["email"] . "' ");

                    $answesheets_data = $answesheets_rs->fetch_assoc();
                    $old_answesheet = $answesheets_data["answersheet_path"];

                    unlink($old_answesheet);

                    echo ("Assignment Re Uploaded Successfully");
                } else if ($answesheets_num == 0) {
                    Database::iud("INSERT INTO `assignment_answers` (`answersheet_path`,`assignments_id`,`user_email`,`submitted_date_time`) VALUES ('" . $file_name . "','" . $assgnment_id . "','" . $_SESSION["user"]["email"] . "','".$now."') ");
                    echo ("Assignment Uploaded Successfully");
                } else {
                    echo ("Somthing Went Wrong");
                }
            } else {
                echo ("Invalid File Type");
            }
        } else {
            echo ("Something Went Wrong");
        }
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>