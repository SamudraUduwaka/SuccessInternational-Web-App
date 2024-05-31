function goToIndex() {
    window.location = "index.php";
}

// home

//signIn

//admin signin
function adminSignIn() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "adminpanel.php";
            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "adminsigninprocess.php", true);
    r.send(f);

}

//teacher sign in

function teacherSignIn() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var vblock = document.getElementById("vblock");
    var tsigninbtn = document.getElementById("tsigninbtn");
    var tsigninwithverifybtn = document.getElementById("tsigninwithverifybtn");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "teacherpanel.php";
            } else if (t == "1") {
                alert("You are not verified yet.Enter verification code");
                vblock.className = "row d-grid d-block";
                tsigninbtn.className = "d-none";
                tsigninwithverifybtn.className = "row d-grid p-3 pb-1 d-block";
                //techerVerifyEnable(username, password, vcode, vblock);
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "teachersigninprocess.php", true);
    r.send(f);
}

function teacherSignInWithVerification() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var vcode = document.getElementById("vcode");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "teacherpanel.php";
            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "teachersigninwithverificationprocess.php", true);
    r.send(f);
}

//academic officer sign in

function academicOfficerSignIn() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var vblock = document.getElementById("vblock");
    var tsigninbtn = document.getElementById("tsigninbtn");
    var tsigninwithverifybtn = document.getElementById("tsigninwithverifybtn");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "academicofficerpanel.php";
            } else if (t == "1") {
                alert("You are not verified yet.Enter verification code");
                vblock.className = "row d-grid d-block";
                tsigninbtn.className = "d-none";
                tsigninwithverifybtn.className = "row d-grid p-3 pb-1 d-block";
                //techerVerifyEnable(username, password, vcode, vblock);
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "academicofficersigninprocess.php", true);
    r.send(f);
}

function academicOfficerSignInWithVerification() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var vcode = document.getElementById("vcode");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "academicofficerpanel.php";
            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "academicofficersigninwithverificationprocess.php", true);
    r.send(f);
}

//academic officer sign in

function studentSignIn() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var vblock = document.getElementById("vblock");
    var tsigninbtn = document.getElementById("tsigninbtn");
    var tsigninwithverifybtn = document.getElementById("tsigninwithverifybtn");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            } else if (t == "1") {
                alert("You are not verified yet.Enter verification code");
                vblock.className = "row d-grid d-block";
                tsigninbtn.className = "d-none";
                tsigninwithverifybtn.className = "row d-grid p-3 pb-1 d-block";
                //techerVerifyEnable(username, password, vcode, vblock);
            } else if (t == "2") {
                window.location = "enrollmentpayments.php";
            }
        }
    };

    r.open("POST", "studentsigninprocess.php", true);
    r.send(f);
}

function studentSignInWithVerification() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var vcode = document.getElementById("vcode");

    var f = new FormData();
    f.append("u", username.value);
    f.append("p", password.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                // window.location = "home.php";
            }

        }
    };

    r.open("POST", "studentsigninwithverificationprocess.php", true);
    r.send(f);
}

// index

function goToHome() {
    window.location = "home.php";
}

function goToAdminPanel() {
    window.location = "adminpanel.php";
}

function goToAdminSignIn() {
    window.location = "adminsignin.php";
}

function goToTeacherSignin() {
    window.location = "teachersignin.php";
}

function goToAcademicOfficerSignin() {
    window.location = "academicofficersignin.php";
}

function goToStudentsSignin() {
    window.location = "studentssignin.php";
}

// signIn

function goToTeacherPanel() {
    window.location = "teacherpanel.php";
}

function goToAcademicOfficerPanel() {
    window.location = "academicofficerpanel.php";
}

function goToAdminPanel() {
    window.location = "adminpanel.php";
}

//teacher panel

function addSubjectModel() {
    var myModal = document.getElementById("subjectModel");
    myModal.show();
}

//function to select medium in Assignment upload section
function selectMedium() {
    var medium = document.getElementById("medium").value;
    var className = document.getElementById("class");
    var subject = document.getElementById("subject");

    if (medium == "0") {
        className.setAttribute("disabled", "disabled");
        subject.setAttribute("disabled", "disabled");
    } else {
        className.removeAttribute("disabled");
        subject.setAttribute("disabled", "disabled");
    }
}

//function to select class in Assignment upload section
function selectClass() {
    var medium = document.getElementById("medium").value;
    var className = document.getElementById("class").value;
    var subject = document.getElementById("subject");

    var f = new FormData();
    f.append("c", className);
    f.append("m", medium);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                subject.setAttribute("disabled", "disabled");
            } else {
                subject.innerHTML = t;
                subject.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getsubjectnames.php", true);
    r.send(f);

}

//function to upload new assignments in Assignment upload section
function realeaseAssignment() {
    var medium = document.getElementById("medium");
    var classId = document.getElementById("class");
    var subject = document.getElementById("subject");
    var plagiarism = document.getElementById("plagiarism");
    var title = document.getElementById("title");
    var deadline = document.getElementById("deadline");
    var description = document.getElementById("description");
    var assignmentfile = document.getElementById("assignmentfile");

    var f = new FormData();
    f.append("m", medium.value);
    f.append("c", classId.value);
    f.append("s", subject.value);
    f.append("p", plagiarism.value);
    f.append("t", title.value);
    f.append("deadline", deadline.value);
    f.append("des", description.value);
    f.append("af", assignmentfile.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                alert("Done releasing");
                medium.value = "0";
                classId.value = "0";
                classId.setAttribute("disabled", "disabled");
                subject.value = "0";
                subject.setAttribute("disabled", "disabled");
                plagiarism.value = "0";
                title.value = "";
                deadline.value = "";
                description.value = "";
                assignmentfile.value = []; //test again
                loadUploadedAssignments();
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "assignmentpdfsaveprocess.php", true);
    r.send(f);

}

//function to load the uploaded assignments in uploaded Assignments section
function loadUploadedAssignments() {
    var uploadedAssignmentsdiv = document.getElementById("uploadedAssignments");

    var i = 1;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            uploadedAssignmentsdiv.innerHTML = t;

        }
    };

    r.open("POST", "loaduploadedassignmentsprocess.php", true);
    r.send(i);

}

function loadAllAssignmentMarks() {
    var allreleasedassignmentmarksdiv = document.getElementById("allreleasedassignmentmarksdiv");

    var i = 1;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            allreleasedassignmentmarksdiv.innerHTML = t;

        }
    };

    r.open("POST", "loadreleasedassignmentmarksprocess.php", true);
    r.send(i);

}

//function to select medium in release assignment marks section
function selectARMedium() {
    var medium = document.getElementById("armedium").value;
    var className = document.getElementById("arclass");
    var subject = document.getElementById("arsubject");

    if (medium == "0") {
        className.setAttribute("disabled", "disabled");
        subject.setAttribute("disabled", "disabled");
    } else {
        className.removeAttribute("disabled");
        subject.setAttribute("disabled", "disabled");
    }
}

//function to select class in release assignment marks section
function selectARClass() {
    var medium = document.getElementById("armedium").value;
    var className = document.getElementById("arclass").value;
    var subject = document.getElementById("arsubject");

    var f = new FormData();
    f.append("c", className);
    f.append("m", medium);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                subject.setAttribute("disabled", "disabled");
            } else {
                subject.innerHTML = t;
                subject.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getsubjectnames.php", true);
    r.send(f);

}

//function to select students according to the class
function selectARStudent() {
    var className = document.getElementById("arclass").value;
    var student = document.getElementById("arstudent");

    var f = new FormData();
    f.append("c", className);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                student.setAttribute("disabled", "disabled");
            } else {
                student.innerHTML = t;
                student.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getstudentnames.php", true);
    r.send(f);
}

//function to select assignments in release assignment marks section
function selectARAssignment() {
    var medium = document.getElementById("armedium").value;
    var className = document.getElementById("arclass").value;
    var subject = document.getElementById("arsubject").value;
    var assignment = document.getElementById("arassignment");

    var f = new FormData();
    f.append("c", className);
    f.append("m", medium);
    f.append("s", subject);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                assignment.setAttribute("disabled", "disabled");
            } else {
                assignment.innerHTML = t;
                assignment.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getassignmentnames.php", true);
    r.send(f);

}

//function to release assignment marks according to the student
function releaseAssignmentMark() {
    var medium = document.getElementById("armedium");
    var className = document.getElementById("arclass");
    var subject = document.getElementById("arsubject");
    var assignment = document.getElementById("arassignment");
    var student = document.getElementById("arstudent");
    var mark = document.getElementById("armark");
    var grade = document.getElementById("argrade");
    var estatus = document.getElementById("arexamstatus");
    var comment = document.getElementById("arcomment");
    var markedassignment = document.getElementById("arassignmentpdf");

    var f = new FormData();
    f.append("c", className.value);
    f.append("m", medium.value);
    f.append("s", subject.value);
    f.append("apdf", assignment.value);
    f.append("stu", student.value);
    f.append("mark", mark.value);
    f.append("gr", grade.value);
    f.append("es", estatus.value);
    f.append("com", comment.value);
    f.append("i", markedassignment.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                medium.value = "0";
                className.value = "0";
                className.setAttribute("disabled", "disabled");
                subject.value = "0";
                subject.setAttribute("disabled", "disabled");
                assignment.value = "0";
                student.value = "0";
                mark.value = "";
                grade.value = "0";
                estatus.value = "0";
                comment.value = "";
                description.value = "";
                markedassignment.value = "";

                alert("Done releasing");
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "assignmentmarkssaveprocess.php", true);
    r.send(f);
}

//function to resetFeilds
function resetAssignmentMarkFeilds() {
    var medium = document.getElementById("armedium");
    var className = document.getElementById("arclass");
    var subject = document.getElementById("arsubject");
    var assignment = document.getElementById("arassignment");
    var student = document.getElementById("arstudent");
    var mark = document.getElementById("armark");
    var grade = document.getElementById("argrade");
    var estatus = document.getElementById("arexamstatus");
    var comment = document.getElementById("arcomment");
    var markedassignment = document.getElementById("arassignmentpdf");

    medium.value = "0";
    className.value = "0";
    className.setAttribute("disabled", "disabled");
    subject.value = "0";
    subject.setAttribute("disabled", "disabled");
    assignment.value = "0";
    assignment.setAttribute("disabled", "disabled");
    student.value = "0";
    student.setAttribute("disabled", "disabled");
    mark.value = "";
    grade.value = "0";
    estatus.value = "0";
    comment.value = "";
    description.value = "";
    markedassignment.value = "";

}

//function to select medium in Lesson Note upload section
function selectLNMedium() {
    var medium = document.getElementById("lnmedium").value;
    var className = document.getElementById("lnclass");
    var subject = document.getElementById("lnsubject");

    if (medium == "0") {
        className.setAttribute("disabled", "disabled");
        subject.setAttribute("disabled", "disabled");
    } else {
        className.removeAttribute("disabled");
        subject.setAttribute("disabled", "disabled");
    }
}

//function to select class in Lesson Note upload section
function selectLNClass() {
    var medium = document.getElementById("lnmedium").value;
    var className = document.getElementById("lnclass").value;
    var subject = document.getElementById("lnsubject");

    var f = new FormData();
    f.append("c", className);
    f.append("m", medium);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                subject.setAttribute("disabled", "disabled");
            } else {
                subject.innerHTML = t;
                subject.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getsubjectnames.php", true);
    r.send(f);

}

//function to upload new Lesson Notes in Lesson Note upload section
function realeaseLessonNote() {
    var medium = document.getElementById("lnmedium");
    var classId = document.getElementById("lnclass");
    var subject = document.getElementById("lnsubject");
    var title = document.getElementById("lntitle");
    var description = document.getElementById("lndescription");
    var lessonnotefile = document.getElementById("lessonotefile");

    var f = new FormData();
    f.append("m", medium.value);
    f.append("c", classId.value);
    f.append("s", subject.value);
    f.append("t", title.value);
    f.append("des", description.value);
    f.append("lnf", lessonnotefile.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {

                medium.value = "0";
                classId.value = "0";
                classId.setAttribute("disabled", "disabled");
                subject.value = "0";
                subject.setAttribute("disabled", "disabled");
                plagiarism.value = "0";
                title.value = "";
                deadline.value = "";
                description.value = "";
                lessonnotefile.value = "";

                alert("Done releasing");
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "lessonnotesaveprocess.php", true);
    r.send(f);
}

//function to reset feilds
function resetLessonNoteFeilds() {
    var medium = document.getElementById("lnmedium");
    var classId = document.getElementById("lnclass");
    var subject = document.getElementById("lnsubject");
    var title = document.getElementById("lntitle");
    var description = document.getElementById("lndescription");
    var lessonnotefile = document.getElementById("lessonotefile");

    medium.value = "0";
    classId.value = "0";
    classId.setAttribute("disabled", "disabled");
    subject.value = "0";
    subject.setAttribute("disabled", "disabled");
    plagiarism.value = "0";
    title.value = "";
    deadline.value = "";
    description.value = "";
    lessonnotefile.value = "";

}

//function to load the uploaded lesson notes in view Lesson Notes section
function loadUploadedLessonNotes() {
    var uploadedLessonNotesdiv = document.getElementById("uploadedLessonNotes");

    var i = 1;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            uploadedLessonNotesdiv.innerHTML = t;

        }
    };

    r.open("POST", "loaduploadedLessonNotesprocess.php", true);
    r.send(i);

}

//teacherprofile

//to upload teacher image
function uploadTeacherImage() {
    var teacherImage = document.getElementById("inputimage");

    var f = new FormData();

    f.append("i", teacherImage.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "teacherprofile.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "teacherimgsaveprocess.php", true);
    r.send(f);
}

function updateTeacherProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");

    var f = new FormData();

    f.append("l", lname.value);
    f.append("f", fname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "teacherprofile.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "teacherprofilesaveprocess.php", true);
    r.send(f);

}

//academic officer

//academic officer panel

//function to select medium in release assignment marks section
function selectMRMedium() {
    var medium = document.getElementById("mrmedium").value;
    var className = document.getElementById("mrclass");
    var subject = document.getElementById("mrsubject");

    if (medium == "0") {
        className.setAttribute("disabled", "disabled");
        subject.setAttribute("disabled", "disabled");
    } else {
        className.removeAttribute("disabled");
        subject.setAttribute("disabled", "disabled");
    }
}

//function to select class in release assignment marks section
function selectMRClass() {
    var medium = document.getElementById("mrmedium").value;
    var className = document.getElementById("mrclass").value;
    var subject = document.getElementById("mrsubject");

    var f = new FormData();
    f.append("c", className);
    f.append("m", medium);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                subject.setAttribute("disabled", "disabled");
            } else {
                subject.innerHTML = t;
                subject.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getsubjectnames.php", true);
    r.send(f);

}

//function to select students according to the class
function selectMRStudent() {
    var className = document.getElementById("mrclass").value;
    var student = document.getElementById("mrstudent");

    var f = new FormData();
    f.append("c", className);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                student.setAttribute("disabled", "disabled");
            } else {
                student.innerHTML = t;
                student.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getstudentnames.php", true);
    r.send(f);
}

//function to select assignments in release assignment marks section
function selectMRAssignment() {
    var medium = document.getElementById("mrmedium").value;
    var className = document.getElementById("mrclass").value;
    var subject = document.getElementById("mrsubject").value;
    var assignment = document.getElementById("mrassignment");

    var f = new FormData();
    f.append("c", className);
    f.append("m", medium);
    f.append("s", subject);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "ok") {
                assignment.setAttribute("disabled", "disabled");
            } else {
                assignment.innerHTML = t;
                assignment.removeAttribute("disabled");
            }
        }
    };

    r.open("POST", "getassignmentnames.php", true);
    r.send(f);

}

//function to release assignment marks according to the student
function releaseAssignmentMarkMR() {
    var assignment = document.getElementById("mrassignment");
    var student = document.getElementById("mrstudent");
    var div = document.getElementById("loadstudentassignmentdetailsdiv");

    var f = new FormData();
    f.append("apdf", assignment.value);
    f.append("stu", student.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "assignmentmarksreleaseprocess.php", true);
    r.send(f);
}

//actual release(change status id of the assignment mark)
function makeStatusReleasedMR(id) {
    var id = id;
    var buttons = document.getElementById("sbutn" + id);
    var f = new FormData();

    f.append("aid", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "1") {
                buttons.className = "btn btn-warning";
                buttons.innerHTML = "<i class='bi bi-send-x-fill'></i>";
                loadAllNotReleasedAssignments();
                loadAllReleasedAssignments();
            } else if (t == "2") {
                buttons.className = "btn btn-success";
                buttons.innerHTML = "<i class='bi bi-send-check-fill'></i>";
                loadAllNotReleasedAssignments();
                loadAllReleasedAssignments();
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "assignmentstatusreleaseprocess.php", true);
    r.send(f);
}

//function to resetFeilds
function resetAssignmentMarkMRFeilds() {
    var medium = document.getElementById("mrmedium");
    var className = document.getElementById("mrclass");
    var subject = document.getElementById("mrsubject");
    var assignment = document.getElementById("mrassignment");
    var student = document.getElementById("mrstudent");
    var div = document.getElementById("loadstudentassignmentdetailsdiv");

    medium.value = "0";
    className.value = "0";
    className.setAttribute("disabled", "disabled");
    subject.value = "0";
    subject.setAttribute("disabled", "disabled");
    assignment.value = "0";
    assignment.setAttribute("disabled", "disabled");
    student.value = "0";
    student.setAttribute("disabled", "disabled");
    div.innerHTML = "try finding again";

}

//function to load all not released assignments
function loadAllNotReleasedAssignments() {
    var div = document.getElementById("loadallnotreleasedassignmentdetailsdiv");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallnotreleasedassignmentsprocess.php", true);
    r.send(f);
}

function loadAllReleasedAssignments() {
    var div = document.getElementById("loadallreleasedassignmentdetailsdiv");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallreleasedassignmentsprocess.php", true);
    r.send(f);
}

//to generate random password
function rsgenPassword() {
    var rspassword = document.getElementById("rspassword");
    var rsgenpassword = document.getElementById("rsgenpassword");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rspassword.value = t;
            rsgenpassword.innerHTML = "<i class='bi bi-patch-check'></i>";
            rsgenpassword.className = "btn btn-success";
            rsgenpassword.setAttribute("disabled", "disabled");
            rspassword.setAttribute("disabled", "disabled");
        }
    };

    r.open("POST", "generateuniqueidprocess.php", true);
    r.send(f);
}

//to generate random verification code
function rsgenVerification() {
    var rsverification = document.getElementById("rsverification");
    var rsgenverificaton = document.getElementById("rsgenverificaton");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rsverification.value = t;
            rsgenverificaton.innerHTML = "<i class='bi bi-patch-check'></i>";
            rsgenverificaton.className = "btn btn-success";
            rsgenverificaton.setAttribute("disabled", "disabled");
            rsverification.setAttribute("disabled", "disabled");
        }
    };

    r.open("POST", "generateuniqueidprocess.php", true);
    r.send(f);
}

function sendRequestStudentsVerify() {
    var rsemail = document.getElementById("rsemail");
    var rsclass = document.getElementById("rsclass");
    var rspassword = document.getElementById("rspassword");
    var rsverification = document.getElementById("rsverification");
    var rsverifybtn = document.getElementById("rsverifybtn");
    var rstextbox = document.getElementById("rstextbox");
    var rsgenverificaton = document.getElementById("rsgenverificaton");
    var rsgenpassword = document.getElementById("rsgenpassword");

    var f = new FormData();
    f.append("e", rsemail.value);
    f.append("c", rsclass.value);
    f.append("p", rspassword.value);
    f.append("v", rsverification.value);
    f.append("role", "student");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                rstextbox.innerHTML = "<p class='fw-bold text-danger'>A student with that email already exists</p>";
            } else if (t == "2") {
                rsverifybtn.innerHTML = "Verified";
                rsverifybtn.setAttribute("disabled", "disabled");
                rsemail.setAttribute("disabled", "disabled");
                rsclass.setAttribute("disabled", "disabled");
            } else if (t == "3") {
                rstextbox.innerHTML = "<p class='fw-bold text-danger'>Some error occured. <br/> Regenerate password and verification code</p>";
                rsgenpassword.removeAttribute("disabled", "disabled");
                rsgenpassword.innerHTML = "Generate";
                rsgenpassword.className = "btn btn-dark";
                rsgenverificaton.removeAttribute("disabled", "disabled");
                rsgenverificaton.innerHTML = "Generate";
                rsgenverificaton.className = "btn btn-dark";
                rstextbox.innerHTML = "";
                rsclass.removeAttribute("disabled", "disabled");
            } else {
                rstextbox.innerHTML = "<p class='fw-bold text-danger'>" + t + "</p>";
            }

        }
    };

    r.open("POST", "verifytosendrequeststudents.php", true);
    r.send(f);
}

function sendRequestStudents() {
    var rsemail = document.getElementById("rsemail");
    var rsclass = document.getElementById("rsclass");
    var rspassword = document.getElementById("rspassword");
    var rsgenpassword = document.getElementById("rsgenpassword");
    var rsverification = document.getElementById("rsverification");
    var rsgenverification = document.getElementById("rsgenverificaton");
    var rsverifybtn = document.getElementById("rsverifybtn");
    var rstextbox = document.getElementById("rstextbox");

    if (rsverifybtn.innerHTML == "Verified") {
        var f = new FormData();
        f.append("e", rsemail.value);
        f.append("c", rsclass.value);
        f.append("p", rspassword.value);
        f.append("v", rsverification.value);
        f.append("role", "student");

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;

                if (t == "ok") {
                    rstextbox.innerHTML = "<p class='fw-bold text-success'>Request email sent successfully</p>";
                    rsemail.value = " ";
                    rsemail.removeAttribute("disabled", "disabled");
                    rspassword.value = " ";
                    rspassword.removeAttribute("disabled", "disabled");
                    rsverification.removeAttribute("disabled", "disabled");
                    rsverification.value = " ";
                    rsverifybtn.removeAttribute("disabled", "disabled");
                    rsverifybtn.innerHTML = "Verify";
                    rsgenpassword.removeAttribute("disabled", "disabled");
                    rsgenpassword.innerHTML = "Generate";
                    rsgenverification.removeAttribute("disabled", "disabled");
                    rsgenverification.innerHTML = "Generate";
                    rsclass.removeAttribute("disabled", "disabled");
                    rsclass.value = "0";
                    loadAllEmailSentStudents();
                } else {
                    rstextbox.innerHTML = "<p class='fw-bold text-danger'>" + t + "</p>";
                }

            }
        };

        r.open("POST", "sendrequeststudents.php", true);
        r.send(f);
    } else {
        rstextbox.innerHTML = "<p class='fw-bold text-danger'>Verify First</p>";
    }

}

function loadAllEmailSentStudents() {
    var div = document.getElementById("loadallemailsentStudentsdiv");
    var f = new FormData();
    f.append("usertype", "student");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallemailsentusersprocess.php", true);
    r.send(f);
}

function loadAllLoggedStudents() {
    var div = document.getElementById("loadallLoggedInStudentsdiv");
    var f = new FormData();
    f.append("usertype", "student");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallloggedusersprocess.php", true);
    r.send(f);
}


/////////////////////////////////////////////////////////////////////////////////////////
//academic offier profile

function uploadAcademicOfficerImage() {
    var academicOfficerImage = document.getElementById("inputimage");

    var f = new FormData();

    f.append("i", academicOfficerImage.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "academicofficerprofile.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "academicofficerimgsaveprocess.php", true);
    r.send(f);
}

function updateAcademicOfficerProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");

    var f = new FormData();

    f.append("l", lname.value);
    f.append("f", fname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "academicofficerprofile.php";
                alert("Successfully updated");
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "academicofficerprofilesaveprocess.php", true);
    r.send(f);

}

//////////////////////////////////////////////////////////////////////////////////////////
// Admin Panel

//add classes
function addNewClass() {
    var classname = document.getElementById("newclassname");
    var p = document.getElementById("errmsgclass");

    var f = new FormData();
    f.append("nc", classname.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert(t);
                classname.value = "";
                p.innerHTML = "";
                loadAllClasses();
            } else {
                p.innerHTML = t;
            }
        }
    };

    r.open("POST", "addnewclassprocess.php", true);
    r.send(f);
}

function loadAllClasses() {
    var select = document.getElementById("classes");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            select.innerHTML = t;
        }
    };

    r.open("POST", "loadallclassesprocess.php", true);
    r.send(f);
}

function addNewSubject() {
    var subjectname = document.getElementById("newsubjectname");
    var p = document.getElementById("errmsgsubject");
    var m = document.getElementById("medium");
    var c = document.getElementById("class");

    var f = new FormData();
    f.append("nc", subjectname.value);
    f.append("m", m.value);
    f.append("c", c.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert(t);
                subjectname.value = "";
                m.value = "0";
                c.value = "0";
                p.innerHTML = "";
                loadAllSubjects();
            } else {
                p.innerHTML = t;
            }
        }
    };

    r.open("POST", "addnewsubjectprocess.php", true);
    r.send(f);
}

function loadAllSubjects() {
    var select = document.getElementById("subjects");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            select.innerHTML = t;
        }
    };

    r.open("POST", "loadallsubjectsprocess.php", true);
    r.send(f);
}

//teacher area

//function to load all teachers
function loadAllTeachers() {
    var teachers = document.getElementById("teachersdetails");

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            teachers.innerHTML = t;
        }
    };

    r.open("POST", "loadallteachersprocess.php", true);
    r.send();
}

//function to manage teachers
function manageTeachers(x) {
    var id = x;
    var statusButton = document.getElementById("statusbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                statusButton.innerHTML = "Deactive";
                statusButton.className = "btn btn-warning";
                loadAllEmailSentTeachers();
                loadAllLoggedTeachers();
            } else if (t == "2") {
                statusButton.innerHTML = "Active";
                statusButton.className = "btn btn-success";
                loadAllEmailSentTeachers();
                loadAllLoggedTeachers();
            } else if (t == "3") {

            }
        }
    };

    r.open("POST", "manageteachersprocess.php", true);
    r.send(f);
}

//to generate random password
function rtgenPassword() {
    var rtpassword = document.getElementById("rtpassword");
    var rtgenpassword = document.getElementById("rtgenpassword");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rtpassword.value = t;
            rtgenpassword.innerHTML = "<i class='bi bi-patch-check'></i>";
            rtgenpassword.className = "btn btn-success";
            rtgenpassword.setAttribute("disabled", "disabled");
            rtpassword.setAttribute("disabled", "disabled");
        }
    };

    r.open("POST", "generateuniqueidprocess.php", true);
    r.send(f);
}

//function to generate verification code
function rtgenVerification() {
    var rtverification = document.getElementById("rtverification");
    var rtgenverificaton = document.getElementById("rtgenverificaton");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rtverification.value = t;
            rtgenverificaton.innerHTML = "<i class='bi bi-patch-check'></i>";
            rtgenverificaton.className = "btn btn-success";
            rtgenverificaton.setAttribute("disabled", "disabled");
            rtverification.setAttribute("disabled", "disabled");
        }
    };

    r.open("POST", "generateuniqueidprocess.php", true);
    r.send(f);
}

//function to verify to send requests to teachers
function sendRequestTeacherVerify() {
    var rtemail = document.getElementById("rtemail");
    var rtpassword = document.getElementById("rtpassword");
    var rtverification = document.getElementById("rtverification");
    var rtverifybtn = document.getElementById("rtverifybtn");
    var rttextbox = document.getElementById("rttextbox");
    var rtgenverificaton = document.getElementById("rtgenverificaton");
    var rtgenpassword = document.getElementById("rtgenpassword");

    var f = new FormData();
    f.append("e", rtemail.value);
    f.append("p", rtpassword.value);
    f.append("v", rtverification.value);
    f.append("role", "teacher");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                rttextbox.innerHTML = "<p class='fw-bold text-danger'>A teacher with that email already exists</p>";
            } else if (t == "2") {
                rtverifybtn.innerHTML = "Verified";
                rtverifybtn.setAttribute("disabled", "disabled");
                rtemail.setAttribute("disabled", "disabled");
            } else if (t == "3") {
                rttextbox.innerHTML = "<p class='fw-bold text-danger'>Some error occured. <br/> Regenerate password and verification code</p>";
                rtgenpassword.removeAttribute("disabled", "disabled");
                rtgenpassword.innerHTML = "Generate";
                rtgenpassword.className = "btn btn-dark";
                rtgenverificaton.removeAttribute("disabled", "disabled");
                rtgenverificaton.innerHTML = "Generate";
                rtgenverificaton.className = "btn btn-dark";
                rttextbox.innerHTML = "";
            } else {
                rttextbox.innerHTML = "<p class='fw-bold text-danger'>" + t + "</p>";
            }

        }
    };

    r.open("POST", "verifytosendrequests.php", true);
    r.send(f);
}

//function to send requests to teachers
function sendRequestTeacher() {
    var rtemail = document.getElementById("rtemail");
    var rtpassword = document.getElementById("rtpassword");
    var rtgenpassword = document.getElementById("rtgenpassword");
    var rtverification = document.getElementById("rtverification");
    var rtgenverification = document.getElementById("rtgenverificaton");
    var rtverifybtn = document.getElementById("rtverifybtn");
    var rttextbox = document.getElementById("rttextbox");

    if (rtverifybtn.innerHTML == "Verified") {
        var f = new FormData();
        f.append("e", rtemail.value);
        f.append("p", rtpassword.value);
        f.append("v", rtverification.value);
        f.append("role", "teacher");

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;

                if (t == "ok") {
                    rttextbox.innerHTML = "<p class='fw-bold text-success'>Request email sent successfully</p>";
                    rtemail.value = " ";
                    rtemail.removeAttribute("disabled", "disabled");
                    rtpassword.value = " ";
                    rtpassword.removeAttribute("disabled", "disabled");
                    rtverification.removeAttribute("disabled", "disabled");
                    rtverification.value = " ";
                    rtverifybtn.removeAttribute("disabled", "disabled");
                    rtverifybtn.innerHTML = "Verify";
                    rtgenpassword.removeAttribute("disabled", "disabled");
                    rtgenpassword.innerHTML = "Generate";
                    rtgenverification.removeAttribute("disabled", "disabled");
                    rtgenverification.innerHTML = "Generate";
                    loadAllEmailSentTeachers();
                } else {
                    rttextbox.innerHTML = "<p class='fw-bold text-danger'>" + t + "</p>";
                }

            }
        };

        r.open("POST", "sendrequestsprocess.php", true);
        r.send(f);
    } else {
        rttextbox.innerHTML = "<p class='fw-bold text-danger'>Verify First</p>";
    }

}

function loadAllEmailSentTeachers() {
    var div = document.getElementById("loadallemailsentTeachersdiv");
    var f = new FormData();
    f.append("usertype", "teacher");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallemailsentusersprocess.php", true);
    r.send(f);
}

function loadAllLoggedTeachers() {
    var div = document.getElementById("loadallLoggedInTeachersdiv");
    var f = new FormData();
    f.append("usertype", "teacher");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallloggedusersprocess.php", true);
    r.send(f);
}

//academic officer area

//function to load all academic officers
function loadAllAcademicOfficers() {
    var academicOfficers = document.getElementById("academicofficerdetails");

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            academicOfficers.innerHTML = t;
        }
    };

    r.open("POST", "loadallacademicofficersprocess.php", true);
    r.send(f);
}

//function to manage academic officers
function manageAcademicOfficers(id) {
    var id = id;
    var statusButton1 = document.getElementById("statusbtn1" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                statusButton1.innerHTML = "Deactive";
                statusButton1.className = "btn btn-warning";
                loadAllEmailSentAOfficers();
                loadAllLoggedAOfficers();
            } else if (t == "2") {
                statusButton1.innerHTML = "Active";
                statusButton1.className = "btn btn-success";
                loadAllEmailSentAOfficers();
                loadAllLoggedAOfficers();
            } else if (t == "3") {

            }
        }
    };

    r.open("POST", "manageacademicofficersprocess.php", true);
    r.send(f);
}

//to generate random password
function ragenPassword() {
    var rapassword = document.getElementById("rapassword");
    var ragenpassword = document.getElementById("ragenpassword");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rapassword.value = t;
            ragenpassword.innerHTML = "<i class='bi bi-patch-check'></i>";
            ragenpassword.className = "btn btn-success";
            ragenpassword.setAttribute("disabled", "disabled");
            rapassword.setAttribute("disabled", "disabled");
        }
    };

    r.open("POST", "generateuniqueidprocess.php", true);
    r.send(f);
}

//to generate random verification code
function ragenVerification() {
    var raverification = document.getElementById("raverification");
    var ragenverificaton = document.getElementById("ragenverificaton");

    var f = new FormData();

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            raverification.value = t;
            ragenverificaton.innerHTML = "<i class='bi bi-patch-check'></i>";
            ragenverificaton.className = "btn btn-success";
            ragenverificaton.setAttribute("disabled", "disabled");
            raverification.setAttribute("disabled", "disabled");
        }
    };

    r.open("POST", "generateuniqueidprocess.php", true);
    r.send(f);
}

//to verify
function sendRequestAcademicOfficerVerify() {
    var raemail = document.getElementById("raemail");
    var rapassword = document.getElementById("rapassword");
    var raverification = document.getElementById("raverification");
    var raverifybtn = document.getElementById("raverifybtn");
    var ratextbox = document.getElementById("ratextbox");
    var ragenverificaton = document.getElementById("ragenverificaton");
    var ragenpassword = document.getElementById("ragenpassword");

    var f = new FormData();
    f.append("e", raemail.value);
    f.append("p", rapassword.value);
    f.append("v", raverification.value);
    f.append("role", "academic_officer");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                ratextbox.innerHTML = "<p class='fw-bold text-danger'>An academic officer with that email already exists</p>";
            } else if (t == "2") {
                raverifybtn.innerHTML = "Verified";
                raverifybtn.setAttribute("disabled", "disabled");
                raemail.setAttribute("disabled", "disabled");
            } else if (t == "3") {
                ratextbox.innerHTML = "<p class='fw-bold text-danger'>Some error occured. <br/> Regenerate password and verification code</p>";
                ragenpassword.removeAttribute("disabled", "disabled");
                ragenpassword.innerHTML = "Generate";
                ragenpassword.className = "btn btn-dark";
                ragenverificaton.removeAttribute("disabled", "disabled");
                ragenverificaton.innerHTML = "Generate";
                ragenverificaton.className = "btn btn-dark";
                ratextbox.innerHTML = "";
            } else {
                ratextbox.innerHTML = "<p class='fw-bold text-danger'>" + t + "</p>";
            }

        }
    };

    r.open("POST", "verifytosendrequests.php", true);
    r.send(f);
}

//to send requests
function sendRequestAcademicOfficer() {
    var raemail = document.getElementById("raemail");
    var rapassword = document.getElementById("rapassword");
    var ragenpassword = document.getElementById("ragenpassword");
    var raverification = document.getElementById("raverification");
    var ragenverification = document.getElementById("ragenverificaton");
    var raverifybtn = document.getElementById("raverifybtn");
    var ratextbox = document.getElementById("ratextbox");

    if (raverifybtn.innerHTML == "Verified") {
        var f = new FormData();
        f.append("e", raemail.value);
        f.append("p", rapassword.value);
        f.append("v", raverification.value);
        f.append("role", "academic_officer");

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;

                if (t == "ok") {
                    ratextbox.innerHTML = "<p class='fw-bold text-success'>Request email sent successfully</p>";
                    raemail.value = " ";
                    raemail.removeAttribute("disabled", "disabled");
                    rapassword.value = " ";
                    rapassword.removeAttribute("disabled", "disabled");
                    raverification.removeAttribute("disabled", "disabled");
                    raverification.value = " ";
                    raverifybtn.removeAttribute("disabled", "disabled");
                    raverifybtn.innerHTML = "Verify";
                    ragenpassword.removeAttribute("disabled", "disabled");
                    ragenpassword.innerHTML = "Generate";
                    ragenverification.removeAttribute("disabled", "disabled");
                    ragenverification.innerHTML = "Generate";
                    loadAllEmailSentAOfficers();
                } else {
                    ratextbox.innerHTML = "<p class='fw-bold text-danger'>" + t + "</p>";
                }

            }
        };

        r.open("POST", "sendrequestsprocess.php", true);
        r.send(f);
    } else {
        ratextbox.innerHTML = "<p class='fw-bold text-danger'>Verify First</p>";
    }

}

function loadAllEmailSentAOfficers() {
    var div = document.getElementById("loadallemailsentAOfficersdiv");
    var f = new FormData();
    f.append("usertype", "academic_officer");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallemailsentusersprocess.php", true);
    r.send(f);
}

function loadAllLoggedAOfficers() {
    var div = document.getElementById("loadallLoggedInAOfficersdiv");
    var f = new FormData();
    f.append("usertype", "academic_officer");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallloggedusersprocess.php", true);
    r.send(f);
}

//student area

function goToManagePayments() {
    window.location = "allenrollmentpayments.php";
}

function manageEnrollmentPayments() { /////////////////////////////////////////////////////

}

//function to load all students
function loadAllStudents() {
    var students = document.getElementById("studentsdetails");

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            students.innerHTML = t;
        }
    };

    r.open("POST", "loadallstudentsprocess.php", true);
    r.send(f);
}

//function to manage students
function manageStudents(id) {
    var id = id;
    var statusButton2 = document.getElementById("statusbtn2" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                statusButton2.innerHTML = "Deactive";
                statusButton2.className = "btn btn-warning";
                loadAllEmailSentStudents();
                loadAllLoggedStudents();
            } else if (t == "2") {
                statusButton2.innerHTML = "Active";
                statusButton2.className = "btn btn-success";
                loadAllEmailSentStudents();
                loadAllLoggedStudents();
            } else if (t == "3") {

            }
        }
    };

    r.open("POST", "managestudentsprocess.php", true);
    r.send(f);
}

//students//////////////////////////////////////////////////////////////////////////////

//function to proceed to
function proceedTo() {
    var proceedbtn = document.getElementById("proceedbtn");
    var paypalbtndiv = document.getElementById("paypalbtn");

    proceedbtn.className = "d-none";
    paypalbtndiv.className = "col-10 offset-1 col-lg-4 offset-lg-6 d-block";
}

function updateFeeInfo() {
    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    };

    r.open("POST", "updatefeeinfoprocess.php", true);
    r.send(f);
}

//function to pay enrollment fee
function enroll() {
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '10.00'
                    }
                }]
            });
        },

        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                // swal({
                //         icon: "success",
                //         title: "Success",
                //         text: "Successfully Enrolled",
                //     })
                //     .then(() => {
                //         updateEnroll();
                //     });
                updateFeeInfo();
                alert("success");
            });
        }
    }).render('#paypal-button-container');
}

//to upload student image
function uploadStudentImage() {
    var studentImage = document.getElementById("inputimage");

    var f = new FormData();

    f.append("i", studentImage.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "studentprofile.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "studentimgsaveprocess.php", true);
    r.send(f);
}

function updateStudentProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();

    f.append("l", lname.value);
    f.append("f", fname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("g", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "studentprofile.php";
                alert("Successfully updated");
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "studentprofilesaveprocess.php", true);
    r.send(f);
}

function loadStudentAssignments() {
    var div = document.getElementById("loadstudentassignments");

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadstudentassignmentprocess.php", true);
    r.send(f);
}

function loadAllStudentAssignments() {
    var div = document.getElementById("loadstudentassignments");

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallstudentassignmentprocess.php", true);
    r.send(f);
}

function uploadAssignmentByStudent(id) {
    var apdf = id;
    var file = document.getElementById("fileupload" + id);

    var f = new FormData();
    f.append("apdf", apdf);
    f.append("file", file.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "uploadansweredassignments.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "studentuploadassignmentprocess.php", true);
    r.send(f);
}

function loadStudentMarkedAssignments() {
    var div = document.getElementById("loadstudentassignmentsmarks");

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadstudentassignmentmarksprocess.php", true);
    r.send(f);
}

function loadAllStudentLessonNotes() {
    var div = document.getElementById("loadstudentlessonnotes");

    var f = new FormData();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    };

    r.open("POST", "loadallstudentlessonnotesprocess.php", true);
    r.send(f);
}

function uploadAdminImage() {
    var adminImage = document.getElementById("inputimage");

    var f = new FormData();

    f.append("i", adminImage.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "adminprofile.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "adminimgsaveprocess.php", true);
    r.send(f);
}

function updateAdminProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");

    var f = new FormData();

    f.append("l", lname.value);
    f.append("f", fname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Success") {
                window.location = "adminprofile.php";
                alert("Successfully updated");
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "adminprofilesaveprocess.php", true);
    r.send(f);

}