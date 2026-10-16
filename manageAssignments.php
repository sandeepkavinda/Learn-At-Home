<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Manage Assignments | Learn At Home</title>

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
                                <div class="d-flex justify-content-center align-items-center" style="cursor: pointer;">
                                    <img src="./images/profile_images/user1.png" class="profileImage me-3">
                                    <div class="d-none d-md-flex flex-column justify-content-center align-items-start me-3">
                                        <span>Sandeep Kavinda</span>
                                        <span class="text-white-50" style="font-size: 11px;">Accedemic Officer</span>
                                    </div>

                                    <a href="updateProfile.php"><i class="bi bi-pencil-square editProfileIcon"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Space -->
            <div class="col-12" style="height: 10px;"></div>

            <!-- Content -->
            <div class="col-12 col-md-10 offset-md-1">
                <div class="row">

                    <!-- Title -->
                    <div class="col-12 d-flex justify-content-center p-5 bg-black-50">
                        <h2 class="text-center fw-bold text-white-50">Manage Assignments</h2>
                    </div>

                    <!-- Assignmet Table Title -->
                    <div class="col-12 bg-light bg-opacity-25 border-bottom border-1 border-light border-opacity-25">
                        <div class="row d-flex align-items-center">
                            <div class="col-4 col-lg-2 text-center p-4 fw-bold">Assignment Id</div>
                            <div class="col-2 text-center p-4 d-none d-lg-block fw-bold">Assignment Name</div>
                            <div class="col-2 text-center p-4 d-none d-lg-block fw-bold">End Date</div>
                            <div class="col-2 text-center p-4 d-none d-lg-block fw-bold">No Of Submitted</div>

                        </div>
                    </div>

                    <!-- Assignmet Table Body -->
                    <div class="col-12 col-12 bg-dark bg-opacity-25 border-bottom border-1 border-light border-opacity-25 py-2">
                        <div class="row d-flex align-items-center">
                            <div class="col-4 col-lg-2 text-center p-4">asg001585</div>
                            <div class="col-2 text-center p-4 d-none d-lg-block">e-shop Web Project</div>
                            <div class="col-2 text-center p-4 d-none d-lg-block">2023.01.31</div>
                            <div class="col-2 text-center p-4 d-none d-lg-block">56</div>

                            <div class="col-4 col-lg-2 text-center p-4">
                                <button class="btn btn-primary" onclick="window.location='viewMarks.php'">View Marks</button>
                            </div>
                            <div class="col-4 col-lg-2 text-center p-4">
                                <button class="btn btn-success" onclick="window.location='releaseMarks.php'">Release Marks</button>
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