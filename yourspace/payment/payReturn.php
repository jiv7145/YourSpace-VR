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

echo 'Payment made!';
header('location:pay.php');