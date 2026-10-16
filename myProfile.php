<?php
session_start();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Page Title -->
        <title>My Profile | Learn At Home</title>

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
                    <div class="row p-4">
                        <div class="col-5 d-flex flex-column align-items-center justify-content-center">
                            <?php
                            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user['email'] . "'");
                            $image_num = $image_rs->num_rows;

                            $image_path;

                            if ($image_num == 1) {
                                $image_data = $image_rs->fetch_assoc();
                                $image_path = $image_data['path'];
                            } else {
                                $image_path = "images/profile_images/defaultProfileImage.png";
                            }


                            ?>
                            <div class="myProfileImage m-2" style="background-image: url('<?php echo ($image_path); ?>');"></div>
                            <span class="text-white"><?php echo ($user["fName"] . ' ' . $user["lName"]); ?></span>
                            <span class="text-white-50"><?php echo ($user["email"]); ?></span>
                            <input type="file" id="profilePicInput" class="d-none" onchange="editProfilrPic();" accept="image/*" />
                            <label for="profilePicInput" class="btn btn-success m-2">Edit Profile Picture</label>
                        </div>
                        <div class="col-7">
                            <div class="row bg-dark p-4 boxShadow">
                                <?php 
                                $user_rs= Database::search("SELECT * FROM `user` WHERE `email`='".$_SESSION["user"]["email"]."'");
                                $user_data = $user_rs->fetch_assoc();

                                ?>
                                <div class="col-6 p-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control bg-light bg-opacity-75" value="<?php echo ($user_data["fName"]); ?>" disabled />
                                </div>
                                <div class="col-6 p-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control bg-light bg-opacity-75" value="<?php echo ($user_data["lName"]); ?>" disabled />
                                </div>
                                <div class="col-6 p-3">
                                    <label class="form-label">Contact Number 1</label>
                                    <input type="text" class="form-control text-opacity-75" id="mobile1" onchange="profileOnchange();" value="<?php echo ($user_data["contact1"]); ?>" />
                                </div>
                                <div class="col-6 p-3">
                                    <label class="form-label">Contact Number 2</label>
                                    <input type="text" class="form-control text-opacity-75" id="mobile2" onchange="profileOnchange();" value="<?php echo ($user_data["contact2"]); ?>" />
                                </div>
                                <div class="col-6 p-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control bg-light bg-opacity-75" id="" value="<?php echo ($user_data["email"]); ?>" disabled />
                                </div>
                                <div class="col-6 p-3">
                                    <label class="form-label">NIC Number</label>
                                    <input type="text" class="form-control bg-light bg-opacity-75" id="" value="<?php echo ($user_data["nic"]); ?>" disabled />
                                </div>
                                <div class="col-6 p-3">
                                    <label class="form-label">Registered Date And Time</label>
                                    <input type="text" class="form-control bg-light bg-opacity-75" id="" value="<?php echo ($user_data["registered_date_time"]); ?>" disabled />
                                </div>
                                <div class="col-12 p-3">
                                    <label class="form-label">Address</label>
                                    <textarea type="text" class="form-control text-opacity-75" rows="2" onchange="profileOnchange();" id="address"><?php echo ($user_data["address"]); ?></textarea>
                                </div>
                                <div class="col-12 p-3 d-flex justify-content-end d-none" id="profileOnchangeActions">
                                    <button class="btn btn-secondary m-1" onclick="window.location.reload();">Cancel</button>
                                    <button class="btn btn-success m-1" onclick="updateProfileDetails();">Save Changes</button>

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
?>