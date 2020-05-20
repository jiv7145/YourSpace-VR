<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$start = $_POST['start'];
// $con = mysqli_connect('localhost', 'root', '');

//remote
$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');

mysqli_select_db($con,'SKIR56Zums');
// mysqli_select_db($con,'yourspace');

$title = $_SESSION['title'];
$paid = " delete from events where start_event = '$start'";
mysqli_query($con, $paid);
header('location:list.php');

$name = implode($_SESSION['username']);
$email = $_SESSION['emailaddress'];

$mail2 = new PHPMailer(true);

try {
    //Server settings
    $mail2->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail2->isSMTP();                                            // Send using SMTP
    $mail2->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mail2->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail2->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
    $mail2->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';                               // SMTP password
    $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail2->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail2->setFrom('admin@yourspacecounselling.net', 'Yourspace');
    $mail2->addAddress($email, $name);     // Add a recipient
   
    // Content
    $mail2->isHTML(true);                                  // Set email format to HTML
    $mail2->Subject = 'Booking Deletion';
   
    $body = "Hi $name, this is to confirm that your appointment has been cancelled <br>";
    $body .= "If you need to cancel your appointment for any reason before 24 hours of your appointment, you will be entitled to a full refund.<br>Cancel your appointment on the website and request a refund by emailing yourspacecounselling@hotmail.com with your PayPal Transaction ID attached.<br>If you cancel within 24 hours of your appointment, you are no longer entitled to a refund at this time.";
    $mail2->Body  = $body;
   

    $mail2->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail2->ErrorInfo}";
}

$mail2Admin = new PHPMailer(true);

try {
    //Server settings
    $mail2Admin->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail2Admin->isSMTP();                                            // Send using SMTP
    $mail2Admin->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mail2Admin->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail2Admin->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
    $mail2Admin->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';                               // SMTP password
    $mail2Admin->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail2Admin->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail2Admin->setFrom('admin@yourspacecounselling.net', 'Yourspace');
    $mail2Admin->addAddress('yourspacecounselling@hotmail.com', 'Michael');     // Add a recipient
   
    // Content
    $mail2Admin->isHTML(true);                                  // Set email format to HTML
    $mail2Admin->Subject = 'Booking Deletion';
   
    $body = "An appointmnent has been deleted, please check the calendar";
    $mail2Admin->Body  = $body;
   

    $mail2Admin->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail2->ErrorInfo}";
}


?>