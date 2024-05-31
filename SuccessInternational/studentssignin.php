<!DOCTYPE html>
<html>

<head>
    <title>Sign In | Students | SuccessInternational</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-color: lightgray;">

    <div class="container-fluid">
        <div class="col-12">
            <div class="row">

                <div class="col-12 col-lg-5 mt-5">
                    <div class="row mt-5 mb-5">
                        <div class="col-10 offset-1 mt-4">
                            <div class="row">
                                <div class="col-4 text-end">
                                    <img src="resources/logofinal120.png" width="100px"/>
                                </div>
                                <div class="col-8 text-start">
                                    <h3 class="boldtext font-italic mt-4">SuccessInternational</h3>
                                    <span>School of Enthusiasts</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 offset-1 mt-4">
                            <span class="fs-5 fw-bold fst-italic">Students' Sign In Space</span>
                        </div>

                        <div class="col-10 offset-1 mt-2">
                            <div class="row d-grid">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="username" placeholder="">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 offset-1">
                            <div class="row d-grid">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 offset-1">
                            <div class="row d-grid d-none" id="vblock">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="vcode" placeholder="">
                                    <label for="verificationcode">Verification Code</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 offset-1">
                            <div class="row d-grid p-3 pb-1" id="tsigninbtn">
                                <button class="btn btn-dark" onclick="studentSignIn();">Sign In Now</button>
                            </div>
                            <div class="row d-grid p-3 pb-1 d-none" id="tsigninwithverifybtn">
                                <button class="btn btn-dark" onclick="studentSignInWithVerification();">Sign In Now</button>
                            </div>
                        </div>

                        <div class="col-10 offset-1">
                            <div class="row d-grid p-3 pt-1">
                                <button class="btn btn-secondary" onclick="goToIndex();">Back to Main</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 d-none d-lg-block">
                    <div class="row">
                        <img src="resources/stusignin.jpg" width="100%" height="690px" />
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>