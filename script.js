// Select Account Type Modal
function accountTypeModal() {
    document.getElementById("selectAccountTypeModal").classList.toggle("d-none");
}

// Change to verification code section
function verifyAccount() {
    var loginSection = document.getElementById("loginSection");
    var verifySection = document.getElementById("verifySection");
    loginSection.classList.toggle("d-none");
    verifySection.classList.toggle("d-none");
}

function hideMsgBox(boxNum) {
    document.getElementById("msgBox" + boxNum).className = "col-12 d-flex justify-content-center p-3 d-none";
}

// After entering the teacher's email, going to enter the pin code
function changeTeacherLogIn() {
    var teacherEmail = document.getElementById("teacherEmail");
    var teacherVC = document.getElementById("teacherVerificationCode");
    teacherEmail.classList.toggle("d-none");
    teacherVC.classList.toggle("d-none");
}

//Small Screen Menu show and hide
function showHideMenu() {
    document.getElementById("menu").classList.toggle("d-none");
}


// Dashboard Tabs Changing
function changeTabContent(tabNum, tabCount) {
    document.getElementById("menu").classList.toggle("d-none");
    for (var x = 1; x <= tabCount; x++) {
        if (x == tabNum) {
            document.getElementById("tabButton" + x).classList = "btn btn-secondary dashboardButton";
            document.getElementById("tabBody" + x).classList = "col-12 d-block";
        } else {
            document.getElementById("tabButton" + x).classList = "btn btn-outline-secondary dashboardButton";
            document.getElementById("tabBody" + x).classList = "col-12 d-none";
        }

    }
}

function logout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (this.readyState == 4) {
            var t = r.responseText;
            document.getElementById("modalSpan").innerHTML = t;
            document.getElementById("modalBtn").click();
        }
    }
    r.open("GET", "logoutProcess.php", true);
    r.send();
}

// student Login Show Password
function showPw() {
    if (document.getElementById("showPw").checked) {
        document.getElementById("password").type = "text";
    } else {
        document.getElementById("password").type = "password";

    }

}

// Student Log In
function studentLogin() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var rememberMe = document.getElementById("rememberMe");
    var rme;

    if (rememberMe.checked) {
        rme = "1";
    } else {
        rme = "0";
    }

    var form = new FormData();
    form.append("em", em.value);
    form.append("pw", pw.value);
    form.append("rme", rme);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (this.readyState == 4) {
            var t = r.responseText;
            if (t == "not_verified") {
                verifyAccount();
            } else if (t == "correct") {
                window.location = "studentDashboard.php"
            } else {
                document.getElementById("msgBox1").className = "col-12 d-flex justify-content-center p-3";
                document.getElementById("msgBox1").innerHTML = '<span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i> ' + t + '</span>';
            }
        }
    }
    r.open("POST", "studentSignInProcess.php", true);
    r.send(form);
}

// Student Verification
function studentVerification() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var vcode = document.getElementById("vcode");


    var form = new FormData();
    form.append("em", em.value);
    form.append("pw", pw.value);
    form.append("vc", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (this.readyState == 4) {
            var t = r.responseText;
            if (t == "correct") {
                window.location = "studentDashboard.php"
            } else {
                document.getElementById("msgBox2").className = "col-12 d-flex justify-content-center p-3";
                document.getElementById("msgBox2").innerHTML = '<span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i> ' + t + '</span>';

            }
        }
    }

    r.open("POST", "studentVerification.php", true);
    r.send(form);
}

// User Profile Onchange
function profileOnchange() {
    document.getElementById("profileOnchangeActions").className = "col-12 p-3 d-flex justify-content-end";
}

//Update Profile Pc
function editProfilrPic() {
    var profileImage = document.getElementById("profilePicInput");

    if (profileImage.files.length != 0) {
        var f = new FormData();
        f.append("profileImg", profileImage.files[0]);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                document.getElementById("modalSpan").innerHTML = t;
                document.getElementById("modalBtn").click();
            }
        };


        r.open("POST", "updateProfileImageProcess.php", true);
        r.send(f);
    }
}

//update Profile Details
function updateProfileDetails() {
    var mobile1 = document.getElementById("mobile1");
    var mobile2 = document.getElementById("mobile2");
    var address = document.getElementById("address");

    var form = new FormData();
    form.append("m1", mobile1.value);
    form.append("m2", mobile2.value);
    form.append("ad", address.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (this.readyState == 4) {
            var t = r.responseText;
            document.getElementById("modalSpan").innerHTML = t;
            document.getElementById("modalBtn").click();
        }
    }

    r.open("POST", "updateProfileDetailsProcess.php", true);
    r.send(form);
}



function downloadFile(id) {
    window.location.href = "downloadFile.php?id=" + id;
}

// Upload Assignment Answer
function uploadAssignment(id) {
    var answersheet = document.getElementById("assignmentUpload" + id);
    if (answersheet.files.length != 0) {
        var f = new FormData();
        f.append("answersheet", answersheet.files[0]);
        f.append("id", id);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                document.getElementById("modalSpan").innerHTML = t;
                document.getElementById("modalBtn").click();
            }
        };

        r.open("POST", "uploadAssignmentProcess.php", true);
        r.send(f);
    }

}

// Teacher Log In
function teacherLogin() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var rememberMe = document.getElementById("rememberMe");
    var rme;

    if (rememberMe.checked) {
        rme = "1";
    } else {
        rme = "0";
    }

    var form = new FormData();
    form.append("em", em.value);
    form.append("pw", pw.value);
    form.append("rme", rme);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "not_verified") {
                verifyAccount();
            } else if (t == "correct") {
                window.location = "teacherDashboard.php"
            } else {
                document.getElementById("msgBox1").className = "col-12 d-flex justify-content-center p-3";
                document.getElementById("msgBox1").innerHTML = '<span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i> ' + t + '</span>';
            }
        }
    }
    r.open("POST", "teacherSignInProcess.php", true);
    r.send(form);
}

// Teacher Verification
function teacherVerification() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var vcode = document.getElementById("vcode");


    var form = new FormData();
    form.append("em", em.value);
    form.append("pw", pw.value);
    form.append("vc", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "correct") {
                window.location = "teacherDashboard.php"
            } else {
                document.getElementById("msgBox2").className = "col-12 d-flex justify-content-center p-3";
                document.getElementById("msgBox2").innerHTML = '<span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i> ' + t + '</span>';

            }
        }
    }

    r.open("POST", "teacherVerification.php", true);
    r.send(form);
}


function addNewAssignment() {
    var name = document.getElementById("name");
    var endDate = document.getElementById("end");
    var assignmentfile = document.getElementById("assignmentFile");

    var form = new FormData();
    form.append("name", name.value);
    form.append("end", endDate.value);

    if (assignmentfile.files.length != 0) {
        form.append("assignment", assignmentfile.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Assignment Uploaded Successfully") {
                document.getElementById("modalOkBtn").onclick = function () {
                    window.location.href = "teacherDashboard.php";
                };
            }

            document.getElementById("modalSpan").innerHTML = t;
            document.getElementById("modalBtn").click();


        }
    }

    r.open("POST", "addAssignmentProcess.php", true);
    r.send(form);

}

function marksSubmit(std_email, asg_id) {

    var marks = document.getElementById("marks_" + std_email);

    var form = new FormData();
    form.append("marks", marks.value);
    form.append("std_email", std_email);
    form.append("asg_id", asg_id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("modalSpan").innerHTML = t;
            document.getElementById("modalBtn").click();
        }
    }

    r.open("POST", "editMarksProcess.php", true);
    r.send(form);


}


function addLessonNote() {
    var name = document.getElementById("name");
    var noteFile = document.getElementById("noteFile");

    var form = new FormData();
    form.append("name", name.value);

    if (noteFile.files.length != 0) {
        form.append("note", noteFile.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Note Uploaded Successfully") {
                document.getElementById("modalOkBtn").onclick = function () {
                    window.location.href = "teacherDashboard.php";
                };
            }
            document.getElementById("modalSpan").innerHTML = t;
            document.getElementById("modalBtn").click();
        }
    }

    r.open("POST", "addLessonNoteProcess.php", true);
    r.send(form);

}

// Academic Officer Log In
function academicOfficerLogin() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var rememberMe = document.getElementById("rememberMe");
    var rme;

    if (rememberMe.checked) {
        rme = "1";
    } else {
        rme = "0";
    }

    var form = new FormData();
    form.append("em", em.value);
    form.append("pw", pw.value);
    form.append("rme", rme);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "not_verified") {
                verifyAccount();
            } else if (t == "correct") {
                window.location = "academicOfficerDashboard.php"
            } else {
                document.getElementById("msgBox1").className = "col-12 d-flex justify-content-center p-3";
                document.getElementById("msgBox1").innerHTML = '<span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i> ' + t + '</span>';
            }
        }
    }
    r.open("POST", "academicOfficerSignInProcess.php", true);
    r.send(form);
}

// Academic Officer Verification
function academicOfficerVerification() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var vcode = document.getElementById("vcode");


    var form = new FormData();
    form.append("em", em.value);
    form.append("pw", pw.value);
    form.append("vc", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "correct") {
                window.location = "academicOfficerDashboard.php"
            } else {
                document.getElementById("msgBox2").className = "col-12 d-flex justify-content-center p-3";
                document.getElementById("msgBox2").innerHTML = '<span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i> ' + t + '</span>';

            }
        }
    }

    r.open("POST", "academicOfficerVerification.php", true);
    r.send(form);
}

function activeConfirmation() {
    document.getElementById("modalSpan").innerHTML = "This information will register the concerned student on the website and the concerned student will be sent his password and verification code through an email.";
    document.getElementById("modalBtn").click();
}

function registerStudent() {
    var fName = document.getElementById("fName");
    var lName = document.getElementById("lName");
    var mobile1 = document.getElementById("mobile1");
    var mobile2 = document.getElementById("mobile2");
    var email = document.getElementById("email");
    var nic = document.getElementById("nic");
    var address = document.getElementById("address");

    var form = new FormData();
    form.append("fName", fName.value);
    form.append("lName", lName.value);
    form.append("mobile1", mobile1.value);
    form.append("mobile2", mobile2.value);
    form.append("email", email.value);
    form.append("nic", nic.value);
    form.append("address", address.value);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 1 || r.readyState == 2 || r.readyState == 3) {
            document.getElementById("loadingSpin").classList.remove("d-none");
        } else if (r.readyState == 4) {
            document.getElementById("loadingSpin").classList.add("d-none");
            var t = r.responseText;
            if (t == "Student Registered Successfully And Sent Email to Student") {
                document.getElementById("modalOkBtn").onclick = function () {
                    window.location.reload();
                };
            }
            document.getElementById("modalSpan").innerHTML = t;
            document.getElementById("modalBtn").click();
        }
    }

    r.open("POST", "studentRegistrationProcess.php", true);
    r.send(form);
}

function adminLogin() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var rememberMe = document.getElementById("rememberMe");
    var rme;

    if (rememberMe.checked) {
        rme = "1";
    } else {
        rme = "0";
    }

    var form = new FormData();
    form.append("em", em.value);
    form.append("pw", pw.value);
    form.append("rme", rme);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "correct") {
                window.location = "adminDashboard.php"
            } else {
                document.getElementById("msgBox1").className = "col-12 d-flex justify-content-center p-3";
                document.getElementById("msgBox1").innerHTML = '<span class="text-danger text-center" style="font-size: 12px;"><i class="bi bi-exclamation-triangle-fill text-danger"></i> ' + t + '</span>';
            }
        }
    }
    r.open("POST", "adminSignInProcess.php", true);
    r.send(form);
}

function registerStaff() {
    var accType = document.getElementById("accType");
    var fName = document.getElementById("fName");
    var lName = document.getElementById("lName");
    var mobile1 = document.getElementById("mobile1");
    var mobile2 = document.getElementById("mobile2");
    var email = document.getElementById("email");
    var nic = document.getElementById("nic");
    var address = document.getElementById("address");

    var form = new FormData();
    form.append("accType", accType.value);
    form.append("fName", fName.value);
    form.append("lName", lName.value);
    form.append("mobile1", mobile1.value);
    form.append("mobile2", mobile2.value);
    form.append("email", email.value);
    form.append("nic", nic.value);
    form.append("address", address.value);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 1 || r.readyState == 2 || r.readyState == 3) {
            document.getElementById("loadingSpin").classList.remove("d-none");
        } else if (r.readyState == 4) {
            document.getElementById("loadingSpin").classList.add("d-none");
            var t = r.responseText;
            if (t == "Registered Successfully And Sent Email") {
                document.getElementById("modalOkBtn").onclick = function () {
                    window.location.reload();
                };
            }
            document.getElementById("modalSpan").innerHTML = t;
            document.getElementById("modalBtn").click();
        }
    }

    r.open("POST", "staffRegistrationProcess.php", true);
    r.send(form);
}