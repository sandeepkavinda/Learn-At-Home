<?php

session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    $_SESSION["user"]=null;
    session_destroy();
    echo ("Logged out successfully");
}
?>