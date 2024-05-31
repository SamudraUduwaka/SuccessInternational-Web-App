<!DOCTYPE html>

<html>

<head>
    <title>Welcome | SuccessInternational</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="slider.css" />
</head>

<body class="bg-light">
    <div class="container-fluid">

        <div class="row">
            <!-- intro -->
            <div class="col-12 col-lg-4">

                <div class="row">
                    <div class="col-12">
                        <div class="row mt-5 ms-3 bg-info">
                            <div class="col-5">
                                <div class="indexlogo ms-4"></div>
                            </div>

                            <div class="col-7">
                                <h2 class="mt-3">Success</h2>
                                <h4>International</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-10 offset-1 col-md-10 col-xl-8 offset-0 offset-md-1 offset-xl-2 text-center mb-5">
                                <div class="row border-2 rounded-3 border-dark logincover">
                                    <div class="col-12">
                                        <!-- login -->
                                        <div class="row mt-3">

                                            <div class="col-12">
                                                <h3 class="mb-4 mt-2">Log In</h3>

                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToAdminSignIn();">Log In as Admin</button>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToTeacherSignin();">Log In as a Teacher</button>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToAcademicOfficerSignin();">Log In as an Officer</button>
                                                <button class="btn-primary mb-4 w-100 btn-7" onclick="goToStudentsSignin();">Log In as a Student</button>

                                                <span class="fs-5 mt-3">Just a Visit?</span>
                                                <button class="btn-secondary mb-2 mt-2 w-100" onclick="goToHome();">Visit as a guest</button>
                                            </div>

                                        </div>

                                        <!-- register -->
                                        <div class="row d-none">

                                            <div class="col-12">
                                                <h3>Register</h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- slider -->
            <div class="col-12 col-lg-8 d-none d-lg-block">
                <div class="row">

                    <!-- Please note, that you can apply .m--global-blending-active to .fnc-slider to enable blend-mode 
                    for all background-images or apply .m--blend-bg-activeto some specific slides (.fnc-slide). It's disabled by 
                    default in this demo,because it requires specific images, where more than 50% of bg is transparent or monotone-->
                    <div class="demo-cont">
                        <!-- slider start -->
                        <div class="fnc-slider example-slider">
                            <div class="fnc-slider__slides">
                                <!-- slide start -->
                                <div class="fnc-slide m--blend-green m--active-slide">
                                    <div class="fnc-slide__inner">
                                        <div class="fnc-slide__mask">
                                            <div class="fnc-slide__mask-inner"></div>
                                        </div>
                                        <div class="fnc-slide__content">
                                            <h2 class="fnc-slide__heading">
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Create</span>
                                                </div>
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Accounts</span>
                                                </div>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- slide end -->
                                <!-- slide start -->
                                <div class="fnc-slide m--blend-dark">
                                    <div class="fnc-slide__inner">
                                        <div class="fnc-slide__mask">
                                            <div class="fnc-slide__mask-inner"></div>
                                        </div>
                                        <div class="fnc-slide__content">
                                            <h2 class="fnc-slide__heading">
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Organize</span>
                                                </div>
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Exams</span>
                                                </div>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- slide end -->
                                <!-- slide start -->
                                <div class="fnc-slide m--blend-red">
                                    <div class="fnc-slide__inner">
                                        <div class="fnc-slide__mask">
                                            <div class="fnc-slide__mask-inner"></div>
                                        </div>
                                        <div class="fnc-slide__content">
                                            <h2 class="fnc-slide__heading">
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Learn</span>
                                                </div>
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Anywhere</span>
                                                </div>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- slide end -->
                                <!-- slide start -->
                                <div class="fnc-slide m--blend-blue">
                                    <div class="fnc-slide__inner">
                                        <div class="fnc-slide__mask">
                                            <div class="fnc-slide__mask-inner"></div>
                                        </div>
                                        <div class="fnc-slide__content">
                                            <h2 class="fnc-slide__heading">
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Study</span>
                                                </div>
                                                <div class="fnc-slide__heading-line d-none d-xl-block">
                                                    <span>Happily</span>
                                                </div>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- slide end -->
                            </div>
                            <nav class="fnc-nav">
                                <div class="fnc-nav__bgs">
                                    <div class="fnc-nav__bg m--navbg-green m--active-nav-bg"></div>
                                    <div class="fnc-nav__bg m--navbg-dark"></div>
                                    <div class="fnc-nav__bg m--navbg-red"></div>
                                    <div class="fnc-nav__bg m--navbg-blue"></div>
                                </div>
                                <div class="fnc-nav__controls">
                                    <button class="fnc-nav__control">
                                        1
                                        <span class="fnc-nav__control-progress"></span>
                                    </button>
                                    <button class="fnc-nav__control">
                                        2
                                        <span class="fnc-nav__control-progress"></span>
                                    </button>
                                    <button class="fnc-nav__control">
                                        3
                                        <span class="fnc-nav__control-progress"></span>
                                    </button>
                                    <button class="fnc-nav__control">
                                        4
                                        <span class="fnc-nav__control-progress"></span>
                                    </button>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <script src="script.js"></script>
    <script src="slider.js"></script>
</body>

</html>