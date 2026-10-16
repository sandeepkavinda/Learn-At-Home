<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Academic Officer Login | Learn At Home</title>

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

            <!-- Header -->
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Space -->
                    <div class="col-12" style="height: 50px;"></div>


                    <!-- Type Email -->
                    <div class="col-12">
                        <div class="row d-flex justify-content-center" id="teacherEmail">
                            <div class="headerBackground boxShadow" style="width: 500px;">
                                <div class="row m-3">

                                    <!-- Title -->
                                    <div class="col-12">
                                        <h4 class="text-center my-4">Academic Officer Log In</h3>
                                    </div>

                                    <!-- Horizontal Line -->
                                    <hr>

                                    <!-- Space -->
                                    <div class="col-12 m-3"></div>

                                    <!-- Email -->
                                    <div class="col-12 my-2">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Email">
                                    </div>

                                    <!-- Log In Button -->
                                    <div class="col-12 my-2">
                                        <button class="btn btn-primary col-12" style="height: 35px; color:white;" onclick="changeTeacherLogIn();">Send Verification Code</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Type Verification Code -->
                    <div class="col-12 ">
                        <div class="row d-flex justify-content-center d-none" id="teacherVerificationCode">
                            <div class="headerBackground boxShadow" style="width: 500px;">
                                <div class="row m-3">

                                    <!-- Title -->
                                    <div class="col-12">
                                        <h4 class="text-center my-4">Academic Officer Log In</h3>
                                    </div>

                                    <!-- Horizontal Line -->
                                    <hr>

                                    <!-- Space -->
                                    <div class="col-12 m-3"></div>

                                    <!-- Email -->
                                    <div class="col-12 my-2">
                                        <label class="form-label">Verification Code</label>
                                        <input type="text" class="form-control" placeholder="Enter Verification Code">
                                        <label class="form-label text-white-50" style="font-size: 12px;">Enter the 6-digit code sent to s***********203@gmail.com</label>

                                    </div>

                                    <!-- Log In Button -->
                                    <div class="col-12 my-2">
                                        <button class="btn btn-primary col-12" style="height: 35px; color:white;">Log In</button>
                                    </div>

                                    <!-- Already Have an Account Link -->
                                    <div class="col-6 my-2 form-check d-flex justify-content-center">
                                        <a href="teacherLogIn.php" class="link-primary myLink">Change Email</a>
                                    </div>

                                    <div class="col-6 my-2 form-check d-flex justify-content-center">
                                        <a href="teacherLogIn.php" class="link-primary myLink">Resend Code</a>
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