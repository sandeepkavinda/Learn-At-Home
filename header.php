<!-- Header -->
<div class="col-12">
    <div class="row  d-flex align-items-center headerBackground boxShadow">
        <div class="col-12">
            <div class="row my-4 mx-2 d-flex align-items-center">

                <div class="col-5 offset-md-1">
                    <a href="index.php">
                        <img src="./images/logo.png" alt="Logo.png" style="width: 180px;">
                    </a>
                </div>

                <?php
                $user = $_SESSION["user"];

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user['email'] . "'");
                $image_num = $image_rs->num_rows;

                $image_path = "";

                if ($image_num == 1) {
                    $image_data = $image_rs->fetch_assoc();
                    $image_path = $image_data['path'];
                } else {
                    $image_path = "images/profile_images/defaultProfileImage.png";
                }


                ?>

                <div class="col-5 offset-2 offset-md-0 d-flex justify-content-end">
                    <div class="d-flex justify-content-center align-items-center" style="cursor: pointer;" onclick="window.location='myProfile.php'">
                        <div class="profileImage me-3" style="background-image: url('<?php echo ($image_path); ?>');"></div>
                        <div class="d-none d-md-flex flex-column justify-content-center align-items-start me-3">
                            <span><?php echo ($user["fName"] . " " . $user["lName"]); ?></span>
                            <?php
                            $account_type_rs = Database::search("SELECT * FROM `account_type` WHERE `id`='" . $user["account_type_id"] . "' ");
                            $account_type_data = $account_type_rs->fetch_assoc();
                            ?>
                            <span class="text-white-50" style="font-size: 11px;"><?php echo ($account_type_data["name"]); ?> <i class="bi bi-check-circle-fill text-white-50" style="font-size:10px;"></i></span>
                        </div>

                        <a href="myProfile.php"><i class="bi bi-pencil-square editProfileIcon"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>