<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 2) {
        if (isset($_GET["id"])) {

?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Page Title -->
                <title>Assignment <?php echo ($_GET["id"]); ?> Answers | Learn At Home</title>

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

                        <?php include "header.php"; ?>

                        <!-- Space -->
                        <div class="col-12" style="height: 10px;"></div>

                        <!-- Content -->
                        <div class="col-12 col-md-10 offset-md-1">
                            <div class="row">

                                <!-- Title -->
                                <div class="col-12 d-flex justify-content-center p-5 bg-black-50">
                                    <h2 class="text-center fw-bold text-white-50">Assignment <?php echo ($_GET["id"]); ?> - Answer Sheets</h2>
                                </div>

                                <!-- Table Title -->
                                <div class="col-12 bg-light bg-opacity-25 border-bottom border-1 border-light border-opacity-25">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-3 col-lg-2 text-center p-4 fw-bold">Student Nic</div>
                                        <div class="col-3 col-lg-3 text-center p-4 fw-bold">Student Name</div>
                                        <div class="col-3 text-center p-4 d-none d-lg-block fw-bold">Submitted Date And Time</div>
                                        <div class="col-3 col-lg-2 text-center p-4 fw-bold">Answer Sheets</div>
                                        <div class="col-3 col-lg-2 text-center p-4 d-lg-block fw-bold">Marks</div>
                                    </div>
                                </div>

                                <?php
                                $answersheet_rs = Database::search("SELECT * FROM `assignment_answers` WHERE `assignments_id`='" . $_GET['id'] . "'");
                                $answersheet_num = $answersheet_rs->num_rows;

                                if ($answersheet_num < 1) {
                                ?>
                                    <div class="col-12 bg-dark bg-opacity-25 py-3 d-flex justify-content-center">
                                        No Answer Sheets Found !
                                    </div>
                                <?php
                                }

                                for ($x = 0; $x < $answersheet_num; $x++) {
                                    $answersheet_data = $answersheet_rs->fetch_assoc();

                                    $student_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $answersheet_data['user_email'] . "'");
                                    $student_data = $student_rs->fetch_assoc();
                                ?>
                                    <!-- Table Body -->
                                    <div class="col-12 bg-dark bg-opacity-25 border-bottom border-1 border-light border-opacity-25 py-2">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-3 col-lg-2 text-center p-4"><?php echo ($student_data["nic"]); ?></div>
                                            <div class="col-3 col-lg-3 text-center p-4"><?php echo ($student_data["fName"] . " " . $student_data["lName"]); ?></div>
                                            <div class="col-3 text-center p-4 d-none d-lg-block"><?php echo ($answersheet_data["submitted_date_time"]); ?></div>
                                            <div class="col-3 col-lg-2 text-center p-4k">
                                                <button class="btn btn-primary" onclick="window.open('<?php echo ($answersheet_data['answersheet_path']); ?>','_blank')">View Answer Sheet</button>
                                            </div>
                                            <div class="col-3 col-lg-2 text-center p-4">
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-center" style="border-radius: 0;" value="<?php echo ($answersheet_data['marks']); ?>" id="marks_<?php echo ($answersheet_data['user_email']); ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button" style="border-bottom-left-radius:0; border-top-left-radius:0;" onclick="marksSubmit('<?php echo ($answersheet_data['user_email']); ?>','<?php echo ($_GET['id']); ?>');">Submit</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                <?php

                                }

                                ?>
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
                                        <button type="button" class="btn btn-success px-5" data-bs-dismiss="modal">Ok</button>
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
            header("Location:teacherDashboard.php");
        }
        ?>





<?php
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>