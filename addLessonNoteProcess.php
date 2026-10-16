<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 2) {

        $name = $_POST["name"];

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $today = $d->format("Y-m-d");


        if (empty($name)) {
            echo ("Please Enter Lesson Name");
        }else if (strlen($name)>=100) {
            echo ("Lesson Name Is Too Long");
        }  else if (!isset($_FILES["note"])) {
            echo ("Please Select Note File");
        } else {
            $note = $_FILES["note"];
            $allowed_extentions = array("application/pdf", "x-zip-compressed", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            $file_ex = $note["type"];

            if (in_array($file_ex, $allowed_extentions)) {
                $new_file_extention;

                if ($file_ex == "application/pdf") {
                    $new_file_extention = ".pdf";
                } else if ($file_ex == "x-zip-compressed") {
                    $new_file_extention = ".zip";
                } else if ($file_ex == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    $new_file_extention = ".docx";
                }

                $file_name = "lesson_notes/note_" . $name . "_" . uniqid() . $new_file_extention;
                move_uploaded_file($note["tmp_name"], $file_name);

                Database::iud("INSERT INTO `lesson_notes` (`name`,`uploaded_date`,`file_path`,`user_email`) VALUES ('" . $name . "','" . $today . "','" . $file_name . "','" . $_SESSION['user']['email'] . "')");

                echo ("Note Uploaded Successfully");
            }
        }
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>