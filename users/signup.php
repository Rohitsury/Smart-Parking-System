<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  ?>
<!doctype html>
<html class="no-js" lang="">

<head>

    <title>SPS-Signup Page</title>




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../css/st.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        function checkpass() {
            if (document.signup.password.value != document.signup.repeatpassword.value) {
                alert('Password and Repeat Password field does not match');
                document.signup.repeatpassword.focus();
                return false;
            }
            return true;
        } 
    </script>

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body class="bg-dark">
    <section class='car-syt'>
        <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">Smart Parking System</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="../index.php">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="../admin/index.php">Admin</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                href="../users/login.php">Users</a></li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container d-flex justify-content-center" style="margin-top: 13vh;">
                <div class="login-content pt-5"
                    style="width: 60%;height: 100%; padding-left: 15%;padding-right: 15%; box-shadow: 0 0 30px 8px black;  border-radius: 20px;" data-aos="zoom-in">
                    <div class="login-logo">
                        <a href="#" style="text-decoration: none;">
                            <h2 style="color: #fff">Create Your account</h2>
                        </a>
                    </div>

                    <div class="login-form text-white fw-bold">
                        <form action="send_mail.php" method="post" onsubmit="return checkpass();">
                            <div class="row">
                                <div class="form-group  col-6">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" placeholder="Your First Name..." required="true"
                                        class="form-control" pattern="[A-Za-z]+">
                                </div>
                                <div class="form-group col-6">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" placeholder="Your Last Name..." required="true"
                                        class="form-control" pattern="[A-Za-z]+">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobilenumber" maxlength="10" pattern="[7896][0-9]{9}"
                                    placeholder="Mobile Number" required="true" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" placeholder="Email address" required="true"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter password" required="true"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input type="password" name="repeatpassword" placeholder="Enter repeat password"
                                    required="true" class="form-control">
                            </div>

                            <button type="submit" name="submit" class="btn btn-success   ">REGISTER</button>

                            <div style="float: inline-end;">


                                <label class="ms-auto">
                                    Already Have An Account? <a href="login.php">Signin</a>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../admin/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>

</html>