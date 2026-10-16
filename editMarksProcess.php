<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 2) {
        $marks = $_POST["marks"];
        $std_email = $_POST["std_email"];
        $asg_id = $_POST["asg_id"];
        
        if(is_numeric($marks) && $marks<=100 && $marks>=0 ){
            if ($marks == "") {
                echo ("You have not entered the marks");
            } else {
                $answersheet_rs = Database::search("SELECT * FROM `assignment_answers` WHERE `assignments_id`='" . $asg_id . "' AND `user_email`='".$std_email."' ");
                $answersheet_num = $answersheet_rs->num_rows;
                if($answersheet_num==1){
                    $answersheet_data= $answersheet_rs->fetch_assoc();
                    Database::iud("UPDATE `assignment_answers` SET `marks`='".$marks."' WHERE `assignments_id`='" . $asg_id . "' AND `user_email`='".$std_email."'" );
                    echo("Marks Updated Successfully");
    
                }else{
                    echo("Somthing Went Wrong");
                }
            }
        }else{
            echo("Invalid Marks");
        }
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>