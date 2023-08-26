<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID,MobileNumber from tblregusers where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsuid']=$ret['ID'];
      $_SESSION['vpmsumn']=$ret['MobileNumber'];
     header('location:view-vehicle.php');
    }
    else{
  
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
  ?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>SPS-Login Page</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/st.css">
    <link rel="stylesheet" href="../css/styles.css">
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
        <div class="container d-flex justify-content-center" style="margin-top: 20vh;">
            <div class="login-content pt-5" style="width: 60%;height: 100%; padding-left: 15%;padding-right: 15%; box-shadow: 0 0 10px 2px black;  border-radius: 20px;" data-aos="zoom-in">
                <div class="login-logo"  >
                    <a href="login.php" style="text-decoration: none;  ">
                        <h2 style="color: #fff" class="mb-3">User Sign in</h2>
                    </a>
                </div>
                <div class="login-form text-white fw-bold">
                    <form method="post">
                         
                        <div class="form-group">
                            <label>Email</label>
                           <input type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter password" required="true" class="form-control">
                        </div>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="forgot-password.php">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                       
                       <div class="checkbox" style="padding-bottom: 20px;padding-top: 20px;">
                            
                            <label class="pull-left mb-5 mt-3" >
                               Don't Have Account? <a href="signup.php">Registered</a>
                            </label>

                        </div>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center text-white" style="padding-top:15px;padding-bottom:14px; margin-top: 8%;">
            <div class="container"><small>Smart Parking System @ 2023</small></div>
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
            duration:1000
        });
    </script>
</body>
</html>
