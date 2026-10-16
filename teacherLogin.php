<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Teacher Login | Learn At Home</title>

    <!-- Link page icon -->
    <link rel="icon" href="./images/icon.png">

    <!-- Link Css Files -->
    <link rel="stylesheet" href="./sources/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row homeMainDiv">
            <div class="col-12">
                <div class="row">

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

                                    <div class="col-5 offset-2 offset-md-0 d-flex justify-content-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Space -->
                    <div class="col-12" style="height: 50px;"></div>


                    <!-- Log In Form -->
                    <div class="col-12">
                        <div class="row d-flex justify-content-center">
                            <div class="headerBackground boxShadow" style="width: 500px;" id="loginSection">
                                <div class="row m-3">

                                    <!-- Title -->
                                    <div class="col-12">
                                        <h4 class="text-center my-4">Teacher Log In</h3>
                                    </div>

                                    <!-- Horizontal Line -->
                                    <hr>

                                    <!-- Space -->
                                    <div class="col-12 m-3"></div>

                                    <?php
                                    $email = "";
                                    $password = "";
                                    if (isset($_COOKIE["teacherEmail"])) {
                                        $email = $_COOKIE["teacherEmail"];
                                    }
                                    if (isset($_COOKIE["teacherPassword"])) {
                                        $password = $_COOKIE["teacherPassword"];
                                    }
                                    ?>

                                    <!-- Email -->
                                    <div class="col-12 my-2">
                                        <input type="text" class="form-control" placeholder="Email Address" id="email" value="<?php echo ($email); ?>" onclick="hideMsgBox(1);">
                                    </div>

                                    <!-- Password -->
                                    <div class="col-12 my-2">
                                        <input type="password" class="form-control" placeholder="Password" id="password" value="<?php echo ($password); ?>" onclick="hideMsgBox(1);">
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="col-6 my-2 form-check d-flex justify-content-center">
                                        <input type="checkbox" class="form-check-input" id="rememberMe" style="cursor: pointer;" checked>
                                        <label for="rememberMe" class="form-check-label" style="margin-top: 1px; cursor: pointer;">&nbsp; Remember Me</label>
                                    </div>

                                    <!-- Show Password -->
                                    <div class="col-6 my-2 form-check d-flex justify-content-center">
                                        <input type="checkbox" class="form-check-input" id="showPw" style="cursor: pointer;" onclick="showPw();">
                                        <label for="showPw" class="form-check-label" style="margin-top: 1px; cursor: pointer;">&nbsp; Show Password</label>

                                    </div>

                                    <!-- Space -->
                                    <div class="col-12 m-3"></div>

                                    <!-- Log In Button -->
                                    <div class="col-12">
                                        <button class="btn btn-primary col-12" style="height: 35px; color:white;" onclick="teacherLogin();">Log In</button>
                                    </div>

                                    <!-- Message Box -->
                                    <div class="col-12 d-flex justify-content-center p-3 d-none" id="msgBox1">
                                        <span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i></span>
                                    </div>

                                </div>
                            </div>
                            <!-- ============================================================= -->

                            <div class="headerBackground boxShadow d-none" style="width: 500px;" id="verifySection">
                                <div class="row m-3">

                                    <!-- Title -->
                                    <div class="col-12">
                                        <h4 class="text-center my-4">Your Account Is Not Verified</h3>
                                    </div>

                                    <!-- Horizontal Line -->
                                    <hr>

                                    <!-- Space -->
                                    <div class="col-12 m-3"></div>

                                    <!-- VErification Code -->
                                    <div class="col-12 my-2">
                                        <label class="form-label">Verification Code</label>
                                        <input type="text" class="form-control" id="vcode" onclick="hideMsgBox(2);">
                                        <label class="form-label text-white-50" style="font-size: 12px;">Enter the verification code mentioned in the invitation email</label>

                                    </div>

                                    <!-- Log In Button -->
                                    <div class="col-12 my-2">
                                        <button class="btn btn-primary col-12" style="height: 35px; color:white;" onclick="teacherVerification();">Verify And Log In</button>
                                    </div>

                                    <!-- Message Box 2 -->
                                    <div class="col-12 d-flex justify-content-center p-3 d-none" id="msgBox2">
                                        <span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i></span>
                                    </div>


                                </div>
                            </div>



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