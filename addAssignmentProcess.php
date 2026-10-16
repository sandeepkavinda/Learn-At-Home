<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 2) {

        $name = $_POST["name"];
        $end_date = $_POST["end"];

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $today = $d->format("Y-m-d");


        if (empty($name)) {
            echo ("Please Enter Asignment Name");
        }else if (strlen($name)>=100) {
            echo ("Assignment Name Is Too Long");
        }  else if (empty($end_date)) {
            echo ("Please Select End Date");
        } else if ($end_date < $today) {
            echo ("Please Select Valid End Date");
        } else if (!isset($_FILES["assignment"])) {
            echo ("Please Select Assignment File");
        } else {
            $assignment = $_FILES["assignment"];
            $allowed_extentions = array("application/pdf", "x-zip-compressed", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            $file_ex = $assignment["type"];

            if (in_array($file_ex, $allowed_extentions)) {
                $new_file_extention;

                if ($file_ex == "application/pdf") {
                    $new_file_extention = ".pdf";
                } else if ($file_ex == "x-zip-compressed") {
                    $new_file_extention = ".zip";
                } else if ($file_ex == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    $new_file_extention = ".docx";
                }

                $file_name = "assignments/assignment_" . $name . "_" . uniqid() . $new_file_extention;
                move_uploaded_file($assignment["tmp_name"], $file_name);

                Database::iud("INSERT INTO `assignments` (`name`,`started_date`,`end_date`,`file_path`,`user_email`) VALUES ('" . $name . "','" . $today . "','" . $end_date . "','" . $file_name . "','" . $_SESSION['user']['email'] . "')");

                echo ("Assignment Uploaded Successfully");
            }
        }
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>