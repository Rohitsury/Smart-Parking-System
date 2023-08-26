<?php

require('config.php');
session_start();
//db connection
include('includes/dbconnection.php');
// $conn = mysqli_connect($host, $username, $password, $dbname);

require('../assets/plugins/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    // $uid=$_SESSION['sid'];
    // $razorpay_order_id = $_SESSION['razorpay_order_id'];
    // $razorpay_payment_id = $_POST['razorpay_payment_id'];
    // $email = $_SESSION['email'];
    // $price = $_SESSION['price'];
    // $sql = "INSERT INTO `orders` (`UserId`, `order_id`, `razorpay_payment_id`, `status`, `email`, `price`) VALUES ('$uid', '$razorpay_order_id', '$razorpay_payment_id', 'success', '$email', '$price')";
    // if(mysqli_query($con, $sql)){
        // echo "payment details inserted to db";
        header("location: /sps/users/view-vehicle.php");
    // }

    // $html = "<p>Your payment was successful</p>
    //          <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

    
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
