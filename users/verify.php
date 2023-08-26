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
    $post_det = json_decode(base64_decode($_POST['post_data']), 1);
    $u_id=$_SESSION['vpmsuid'];
    $park_det=explode("-", $post_det['parking']);
    $parkingnumber=$park_det['1'];
    $amount= intval($post_det['amount']); 
    $catename=$post_det['catename'];
    $vehcomp=$post_det['vehcomp'];
    $vehreno=$post_det['vehreno'];
    $ownername=$post_det['ownername'];
    $ownercontno=$post_det['ownercontno'];
    $in_dateTime= date("Y-m-d H:i:s", strtotime($post_det['in_dateTime']));
    $out_dateTime= date("Y-m-d H:i:s", strtotime($post_det['out_dateTime']));

    $query=mysqli_query($con, "insert into  tblvehicle(UserId, ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,InTime,OutTime,ParkingCharge) value('$u_id','$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno','$in_dateTime','$out_dateTime','$amount')");
    $vehicle_id = $con->insert_id;

    $p_id=$park_det['0'];
    $que = mysqli_query($con, "UPDATE tblparking SET u_id = '$u_id', vehicle_id = '$vehicle_id', price = '$amount', status = 1 WHERE id = '$p_id'");

    header("location: /sps/users/view-vehicle.php");

    // $uid=$_SESSION['sid'];
    // $razorpay_order_id = $_SESSION['razorpay_order_id'];
    // $razorpay_payment_id = $_POST['razorpay_payment_id'];
    // $email = $_SESSION['email'];
    // $price = $_SESSION['price'];
    // $sql = "INSERT INTO `orders` (`UserId`, `order_id`, `razorpay_payment_id`, `status`, `email`, `price`) VALUES ('$uid', '$razorpay_order_id', '$razorpay_payment_id', 'success', '$email', '$price')";
    // if(mysqli_query($con, $sql)){
        // echo "payment details inserted to db";
        
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
