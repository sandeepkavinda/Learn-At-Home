<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Invite Staff | Learn At Home</title>

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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Space -->
            <div class="col-12" style="height: 50px;"></div>

            <!-- Content -->
            <div class="col-12">
                <div class="row">



                    <!-- Type Email -->
                    <div class="col-12">
                        <div class="row d-flex justify-content-center">
                            <div class="headerBackground boxShadow" style="width: 500px;">
                                <div class="row m-3">

                                    <!-- Title -->
                                    <div class="col-12">
                                        <h4 class="text-center my-4">Academic Officer and Teacher Registration</h3>
                                    </div>

                                    <!-- Horizontal Line -->
                                    <hr>

                                    <!-- Space -->
                                    <div class="col-12 m-3"></div>
                                    <!-- Select Character -->
                                    <div class="col-12">
                                        <select class="form-select text-center" id="accType">
                                            <option disabled selected hidden value="0">Select Position</option>
                                            <option class="text-dark" value="3">Academic Officer</option>
                                            <option class="text-dark" value="2">Teacher</option>

                                        </select>
                                    </div>

                                    <!-- First Name -->
                                    <div class="col-6 my-2">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fName">
                                    </div>

                                    <!-- Last Name -->
                                    <div class="col-6 my-2">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lName">
                                    </div>

                                    <!-- Mobile Number 1 -->
                                    <div class="col-6 my-2">
                                        <label class="form-label">Mobile Number 01</label>
                                        <input type="text" class="form-control" id="mobile1">
                                    </div>

                                    <!-- Mobile Number 2 -->
                                    <div class="col-6 my-2">
                                        <label class="form-label">Mobile Number 02</label>
                                        <input type="text" class="form-control" id="mobile2">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-6 my-2">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>

                                    <!-- NIC number -->
                                    <div class="col-6 my-2">
                                        <label class="form-label">NIC Number</label>
                                        <input type="text" class="form-control" id="nic">
                                    </div>

                                    <!-- Address -->
                                    <div class="col-12 my-2">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" rows="3" id="address"></textarea>
                                    </div>

                                    <!-- Register Button -->
                                    <div class="col-12 py-4">
                                        <button class="btn btn-primary col-12" style="height: 35px; color:white;" onclick="registerStaff();">Register the student and send email</button>
                                    </div>

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
                            <button type="button" class="btn btn-success px-5" data-bs-dismiss="modal" id="modalOkBtn">Ok</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Loading Spin -->
            <div style="width: 100%; height:100vh; position:absolute;" class="d-flex justify-content-center align-items-center bg-dark bg-opacity-75 d-none" id="loadingSpin">
                <div class="spinner-border text-light" role="status">
                </div>
            </div>


        </div>
    </div>




    <script src="./sources/bootstrap.bundle.js"></script>
    <script src="./script.js"></script>

</body>

</html>