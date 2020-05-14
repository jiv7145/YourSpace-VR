<?php
session_start();
// header('location:login.php');
//devel
 $con = mysqli_connect('localhost', 'root', '');

//remote
// $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');

// mysqli_select_db($con,'SKIR56Zums');


use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require '../app/start.php';

if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])){
   die(); 
}

if((bool)$_GET['success'] === false){
    die();
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);

$execute = new PaymentExecution();
$execute ->setPayerId($payerId);

try{
    $result = $payment->execute($execute, $paypal);
}
catch(Exception $e){
$data = json_decode($e->getData());
var_dump($data);
die();
}

mysqli_select_db($con,'yourspace');

$title = $_SESSION['title'];
$paid = " delete from events where title = '$title'";
mysqli_query($con, $paid);

// echo 'Payment made!';
// header('location:payConfirmation.php');
// header('location:https://yourspace-web.herokuapp.com/payment/pay.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css?after">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div id="header">
            <a href="../../index.php">
                <h2 id="logo"> YourSpace </h2>
            </a>
            <div class="topnav">

                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Pricing</a>
                <a href="download.php">Download</a>
            </div>
        </div>

        <div style ="text-align : center; margin-top:200px" class="login-box">
            <!-- <div class="col-md-6 login-left" style="margin: auto"> -->

                <!-- <h3 class="subHeading"> Log in to your account</h3>
                <form action="validation.php" method="post">
                    <div class="form-group">
                        <label> Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnLogin"> LOGIN </button>
                </form> -->
                <h2> Payment was made, thank you! <br> <h4> <a href = "pay.php" >Back to checkout</h3></h2>

            <!-- </div> -->

        </div>
    </div>
</body>

</html>