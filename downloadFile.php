<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {

    if (isset($_GET["id"])) {
        $assignmet_rs = Database::search("SELECT * FROM `assignments` WHERE `id`='" . $_GET['id'] . "' ");
        $assignmet_num = $assignmet_rs->num_rows;

        if ($assignmet_num == 1) {
            $assignmet_data = $assignmet_rs->fetch_assoc();
            $file_url = $assignmet_data["file_path"];

            header("Content-disposition: attachment; filename=" . basename($file_url));
            readfile($file_url);
        }
    }
}
?>