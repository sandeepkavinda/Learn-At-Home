<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 2) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Page Title -->
            <title>Add Assignment | Learn At Home</title>

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
                    <div class="col-12">
                        <div class="row">
                            <!-- Space -->
                            <div class="col-12" style="height: 10px;"></div>

                            <!-- Title -->
                            <div class="col-12 d-flex justify-content-center p-5 bg-black-50">
                                <h2 class="text-center fw-bold text-white-50">Add Assignment</h2>
                            </div>

                            <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                                <div class="row">
                                    <div class="col-12 p-3">
                                        <label class="form-label">Assignment Name</label>
                                        <input type="text" class="form-control " value="" id="name" />
                                    </div>
                                    <div class="col-12 p-3">
                                        <label class="form-label">End Date</label>
                                        <input type="date" class="form-control" value="" id="end"/>
                                    </div>
                                    <div class="col-12 p-3">
                                        <label class="form-label">Attach Assignment</label>
                                        <input type="file" class="form-control" id="assignmentFile"/>
                                    </div>
                                    <div class="col-12 p-3">
                                        <button class="btn btn-success col-12 p-3" onclick="addNewAssignment();">Add Assignment</button>
                                    </div>

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
                                    <button type="button" class="btn btn-success px-5" data-bs-dismiss="modal" id="modalOkBtn">Ok</button>
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