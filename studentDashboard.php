<?php
session_start();

if (isset($_SESSION["user"])) {
    if ($_SESSION["user"]["account_type_id"] == 1) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Page Title -->
            <title>Student Dashboard | Learn At Home</title>

            <!-- Link page icon -->
            <link rel="icon" href="./images/icon.png">

            <!-- Link Css Files -->
            <link rel="stylesheet" href="./sources/bootstrap.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="./style.css">

        </head>

        <body>
            <?php
            require "connection.php";

            ?>

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
                                <h2 class="text-center fw-bold text-white-50">Student Dashboard</h2>
                            </div>

                            <div class="col-12 d-lg-none py-2 px-4" style="position: relative;">
                                <!-- Small Screen Menu Button -->
                                <div id="menuButton" style="cursor: pointer;" onclick="showHideMenu();">
                                    <i class="bi bi-list text-light menuButtonIcon"></i>
                                </div>
                            </div>



                            <!-- Tab Buttons -->
                            <div class="col-6 offset-3 offset-lg-0 col-lg-2 d-none d-lg-block" id="menu">
                                <div class="row">
                                    <button class="btn btn-secondary dashboardButton" style="border-radius: 0;" id="tabButton1" onclick="changeTabContent(1,2);">Assignments</button>
                                    <button class="btn btn-outline-secondary dashboardButton" style="border-radius: 0;" id="tabButton2" onclick="changeTabContent(2,2);">Lesson Notes</button>
                                    <button class="btn btn-outline-secondary dashboardButton" style="border-radius: 0;" onclick="window.location='myProfile.php'">My Profile</button>
                                    <button class="btn btn-outline-secondary dashboardButton" style="border-radius: 0;" onclick="logout();">Log Out</button>
                                </div>
                            </div>

                            <!-- Tab Body -->
                            <div class="col-12 col-lg-10 bg-secondary p-5">
                                <div class="row">


                                    <!-- Tab 01 Body -->
                                    <div class="col-12 d-block" id="tabBody1">
                                        <div class="row">
                                            <!-- Assignments Title -->
                                            <div class="col-12 d-flex justify-content-center p-3">
                                                <h4 class="fw-bolder">Assignments</h4>
                                            </div>

                                            <!-- Find Unfinished Assignments Checkbox -->
                                            <!-- <div class="col-12 d-flex justify-content-center p-3 bg-dark bg-opacity-75">
                                                <input type="checkbox" id="unfinished" class="form-check-input" style="cursor: pointer;" />
                                                <label for="unfinished" class="form-check-label" style="cursor: pointer;">&nbsp; Unfinished Assignments</label>
                                            </div> -->

                                            <!-- Assignmet Table Title -->
                                            <div class="col-12 bg-dark bg-opacity-75">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 col-lg-2 text-center p-4 fw-bold">Assignment Id</div>
                                                    <div class="col-2 text-center p-4 d-none d-lg-block fw-bold">Assignment Name</div>
                                                    <div class="col-2 text-center p-4 d-none d-lg-block fw-bold">Started Date</div>
                                                    <div class="col-2 text-center p-4 d-none d-lg-block fw-bold">End Date</div>
                                                </div>
                                            </div>

                                            <?php
                                            $assignment_rs = Database::search("SELECT * FROM `assignments` ORDER BY `id` desc ");
                                            $assignment_num = $assignment_rs->num_rows;

                                            for ($x = 0; $x < $assignment_num; $x++) {
                                                $assignment_data = $assignment_rs->fetch_assoc();
                                            ?>

                                                <!-- Assignmet Table Body -->
                                                <div class="col-12 bg-dark bg-opacity-50">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-4 col-lg-2 text-center p-4"><?php echo ($assignment_data["id"]); ?></div>
                                                        <div class="col-2 text-center p-4 d-none d-lg-block"><?php echo ($assignment_data["name"]); ?></div>
                                                        <div class="col-2 text-center p-4 d-none d-lg-block"><?php echo ($assignment_data["started_date"]); ?></div>
                                                        <div class="col-2 text-center p-4 d-none d-lg-block"><?php echo ($assignment_data["end_date"]); ?></div>
                                                        <div class="col-4 col-lg-2 text-center p-4">
                                                            <?php
                                                            $end_date = $assignment_data["end_date"];
                                                            $current_date = date("Y-m-d");

                                                            if ($current_date <= $end_date) {
                                                            ?>
                                                                <button class="btn btn-success" onclick="downloadFile(<?php echo $assignment_data['id']; ?>);">Download</button>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <label>-</label>
                                                            <?php
                                                            }

                                                            ?>
                                                        </div>
                                                        <div class="col-4 col-lg-2 text-center p-4">
                                                            <input type="file" id="assignmentUpload<?php echo $assignment_data['id']; ?>" class="d-none" onchange="uploadAssignment(<?php echo $assignment_data['id']; ?>);" accept=".pdf,.zip,.docx" />
                                                            <?php

                                                            $answesheets_rs = Database::search("SELECT * FROM `assignment_answers` WHERE `assignments_id`='" . $assignment_data["id"] . "' AND `user_email`='" . $_SESSION["user"]["email"] . "' ");
                                                            $answesheets_num = $answesheets_rs->num_rows;

                                                            if ($current_date > $end_date && $answesheets_num != 0) {
                                                                //Deadline Passed And Subimitted

                                                                $answersheet_data = $answesheets_rs->fetch_assoc();
                                                                if ($answersheet_data["marks"] == null) {
                                                            ?>
                                                                    <label class="">(Marks Pending)</label>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <label class="fw-bold">Marks: <?php echo $answersheet_data["marks"]; ?></label>
                                                                <?php
                                                                }

                                                                ?>
                                                            <?php
                                                            } else if ($current_date > $end_date && $answesheets_num == 0) {
                                                                //Deadline Passed And Not Subimitted
                                                            ?>
                                                                <label class=" text-warning">Not Sumbitted</label>
                                                            <?php
                                                            } else {
                                                                //Deadline Not Passed
                                                            ?>
                                                                <label class="btn btn-primary" for="assignmentUpload<?php echo $assignment_data['id']; ?>"><?php if ($answesheets_num == 1) {
                                                                                                                                                                echo ("Re Upload");
                                                                                                                                                            } else {
                                                                                                                                                                echo ("Upload");
                                                                                                                                                            } ?></label>
                                                            <?php

                                                            }


                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>

                                            <?php

                                            }

                                            ?>





                                        </div>
                                    </div>

                                    <!-- Tab 02 Body -->
                                    <div class="col-12 d-none" id="tabBody2">
                                        <div class="row">

                                            <!-- Lesson Notes Title -->
                                            <div class="col-12 d-flex justify-content-center p-3">
                                                <h4 class="fw-bolder">Lesson Notes</h4>
                                            </div>

                                            <!-- Lesson Notes Sort -->
                                            <!-- <div class="col-12 d-flex justify-content-center p-3 bg-dark bg-opacity-75">
                                                <div class="row">
                                                    <div class="col-10 offset-1 text-end p-4 d-none d-lg-block fw-bold"><i class="bi bi-filter"></i></div>

                                                </div>

                                            </div> -->

                                            <!-- Lesson Notes Table Title -->
                                            <div class="col-12 bg-dark bg-opacity-75">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 col-lg-2 text-center p-4 fw-bold">Notes Id</div>
                                                    <div class="col-4 col-lg-3 text-center p-4">Lesson Name</div>
                                                    <div class="col-3 text-center p-4 d-none d-lg-block fw-bold">Uploaded By</div>
                                                    <div class="col-2 text-center p-4 d-none d-lg-block fw-bold">Uploaded Date</div>

                                                </div>
                                            </div>

                                            <?php
                                            $lesson_notes_rs = Database::search("SELECT * FROM `lesson_notes` INNER JOIN `user` ON `lesson_notes`.`user_email` = `user`.`email`");
                                            $lesson_notes_num = $lesson_notes_rs->num_rows;

                                            for ($x = 0; $x < $lesson_notes_num; $x++) {
                                                $lesson_notes_data = $lesson_notes_rs->fetch_assoc();
                                            ?>
                                                <!-- Lesson Notes Table Body -->
                                                <div class="col-12 bg-dark bg-opacity-50">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-4 col-lg-2 text-center p-4"><?php echo ($lesson_notes_data["id"]); ?></div>
                                                        <div class="col-4 col-lg-3 text-center p-4"><?php echo ($lesson_notes_data["name"]); ?></div>
                                                        <div class="col-3 text-center p-4 d-none d-lg-block"><?php echo ($lesson_notes_data["fName"] . " " . $lesson_notes_data["lName"]); ?></div>
                                                        <div class="col-2 text-center p-4 d-none d-lg-block"><?php echo ($lesson_notes_data["uploaded_date"]); ?></div>
                                                        <div class="col-4 col-lg-2 text-center p-4">
                                                            <button class="btn btn-success" onclick="window.open('<?php echo $lesson_notes_data['file_path']; ?>', '_blank');">View Note</button>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php
                                            }
                                            ?>


                                        </div>
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