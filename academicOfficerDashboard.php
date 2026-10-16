<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 3) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Page Title -->
            <title>Academic Officer's Dashboard | Learn At Home</title>

            <!-- Link page icon -->
            <link rel="icon" href="./images/icon.png">

            <!-- Link Css Files -->
            <link rel="stylesheet" href="./sources/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="./style.css">

        </head>

        <body>

            <div class="container-fluid">
                <div class="row">


                    <?php include "header.php" ?>
                    <!-- Space -->
                    <div class="col-12" style="height: 10px;"></div>

                    <!-- Content -->
                    <div class="col-12">
                        <div class="row">

                            <!-- Title -->
                            <div class="col-12 d-flex justify-content-center p-5 bg-black-50">
                                <h2 class="text-center fw-bold text-white-50">Academic Officer's Dashboard</h2>
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                                <div class="btn btn-secondary academicOfficerDashboardButton d-flex flex-column justify-content-center align-items-center m-4" onclick="window.location='studentRegister.php'">
                                    <i class="bi bi-person-plus-fill" style="font-size: 40px;"></i>
                                    <span>Register New Student</span>
                                </div>

                                <div class="btn btn-secondary academicOfficerDashboardButton d-flex flex-column justify-content-center align-items-center m-4 d-none" onclick="window.location='manageAssignments.php'">
                                    <i class="bi bi-card-text" style="font-size: 40px;"></i>
                                    <span>Manage Assignments</span>
                                </div>

                                <div class="btn btn-secondary academicOfficerDashboardButton d-flex flex-column justify-content-center align-items-center m-4" onclick="logout();">
                                    <i class="bi bi-box-arrow-left" style="font-size: 40px;"></i>
                                    <span>Logout</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="d-none" id="modalBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-dark">

                                <div class="modal-body d-flex justify-content-evenly align-items-center">
                                    <span id="modalSpan"></span>
                                    <button type="button" class="btn btn-success px-5" data-bs-dismiss="modal" onclick="window.location.reload();">Ok</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="d-none" id="modalBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-dark">

                                <div class="modal-body d-flex justify-content-evenly align-items-center">
                                    <span id="modalSpan">Your changes have been updated successfully</span>
                                    <button type="button" class="btn btn-success px-5" data-bs-dismiss="modal" onclick="window.location.reload();">Ok</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>




            <script src="./sources/bootstrap.bundle.js"></script>
            <script src="./script.js"></script>

        </body>

        </html>

<?php
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>