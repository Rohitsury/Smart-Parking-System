<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$data=json_decode($_GET['data'], 1);

if(isset($_POST['submit']))
  { 
    $fname=$data['firstname'];
    $lname=$data['lastname'];
    $contno=$data['mobilenumber'];
    $email=$data['email'];
    $password=md5($data['password']);
    $otp= base64_decode($data['status']);

    $entered_otp=$_POST['entered_otp'];
    // echo "<pre>";print_r($otp);
    // echo "<pre>";print_r($entered_otp);die;
    if ($otp == $entered_otp) {

        $ret=mysqli_query($con, "select Email from tblregusers where Email='$email' || MobileNumber='$contno'");
        $result=mysqli_fetch_array($ret);
        if($result>0)
        {
            echo '<script>alert("This email or Contact Number already associated with another account")</script>';
        }else{
            $query=mysqli_query($con, "insert into tblregusers(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
            if ($query) {
                header("location: /sps/users/login.php");
                // echo '<script>alert("You have successfully registered")</script>';
            }else{
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
        
    } else {
        echo '<script>alert("Enter correct OTP.")</script>';
    }
}
  ?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>SPS-Signup Page</title>
   



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <h2 style="color: #fff">SPS!! Verify OTP</h2>
                    </a>
                </div>

                <div class="login-form">
                    <form method="post" onsubmit="return checkpass();">
                         
                        <div class="form-group">
                            <label>Enter OTP</label>
                           <input type="text" name="entered_otp" placeholder="Enter OTP." required="true" class="form-control">
                        </div>

                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">REGISTER</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../admin/assets/js/main.js"></script>

</body>
</html>
 