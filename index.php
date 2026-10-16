<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Learn At Home | Home</title>

    <!-- Link page icon -->
    <link rel="icon" href="./images/icon.png">

    <!-- Link Css Files -->
    <link rel="stylesheet" href="./sources/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">

            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center homeMainDiv">

                <!-- Logo -->
                <a href="index.php"><img src="./images/logo.png" style="width:250px;"></a>

                <!-- Small Vertical Line -->
                <div class="verticalLine mx-5 d-none d-md-block"></div>

                <!-- Student Login And Register Buttons -->
                <div class="d-flex justify-content-center align-items-center my-3">
                    <button class="myButton m-1" style="width: 80px; height: 35px;" onclick="accountTypeModal();">Log In</button>
                    <!-- <button class="myButton-outline m-1" style="width: 80px; height: 35px;" onclick="window.location.href='adminLogin.php'">Admin</button> -->
                </div>

            </div>

            <div class="selectAccountTypeModal d-flex justify-content-center align-items-center d-none" id="selectAccountTypeModal">
                <div class="d-flex flex-column justify-content-center align-items-center boxShadow selectAccountMainDiv bg-dark">
                    <h1 class="selectAccountTypeClose" id="selectAccountTypeClose" onclick="accountTypeModal();"><i class="bi bi-x-circle text-light" style="font-size:20px;"></i></h1>
                    <h5 class="m-4 text-light">Select Your Account Type</h5>
                    <div class="d-flex accountTypes">
                        <div class="btn btn-dark m-2 boxShadow" onclick="window.location='studentLogin.php'">Student</div>
                        <div class="btn btn-dark m-2 boxShadow" onclick="window.location='teacherLogIn.php'">Teacher</div>
                        <div class="btn btn-dark m-2 boxShadow" onclick="window.location='academicOfficerLogin.php'">Acedemic Officer</div>
                        <div class="btn btn-dark m-2 boxShadow" onclick="window.location='adminLogin.php'">Administrator</div>

                    </div>


                </div>

            </div>


        </div>
    </div>




    <script src="./sources/bootstrap.bundle.js"></script>
    <script src="./script.js"></script>

</body>

</html>