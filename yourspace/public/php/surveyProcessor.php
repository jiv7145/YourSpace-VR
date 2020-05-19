<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';


$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
mysqli_select_db($con,'SKIR56Zums');

// $con = mysqli_connect('localhost', 'root', '');
// mysqli_select_db($con,'form');

$first =  implode($_SESSION['first_user']);
$name =  implode($_SESSION['username']);
$email = $_SESSION['emailaddress'];

if($first!= 1){

$age = $_POST['age'];
$gender = $_POST['gender'];

$relationship_status = $_POST['relationship_status'];
$sexual_orientation = $_POST['sexual_orientation'];
$language = $_POST['language'];
$employment_situation = $_POST['employment_situation'];
$reference = $_POST['reference'];
$counselling_exp = $_POST['counselling_exp'];
$goal = $_POST['goal'];

$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];


    $reg = "insert into form(email, age, gender
    ,relationship_status, sexual_orientation, language, 
    employment_situation,reference, counselling_exp,goal, date, start, end) 
    values ('$email', '$age', '$gender'
    , '$relationship_status', '$sexual_orientation', '$language', '$employment_situation'
    , '$reference', '$counselling_exp', '$goal','$date','$start','$end')";
    if(mysqli_query($con, $reg)){
    }else{
     
        echo "failed";
    }
   
    if(mysqli_query($con, "UPDATE usertable SET first_user=1 WHERE email = '$email'")){
        echo "now old user";
        $_SESSION['first_user'] = 1;
    }
    else{
        echo "fail";
    }

    $body   = " $name has booked a new appointment <br>";
    $body   .= "Date:  $date <br>";
    $body   .= "Start: $start <br>";
    $body   .="End:  $end <br>";
    $body    .= "Age:  $age <br>";
    $body    .= "Gender: $gender <br>";
    $body   .="Relationship Status: $relationship_status <br>";
    $body    .="Sexual Orientation: $sexual_orientation <br>";
    $body    .="Primary Language:  $language <br>";
    $body .= "Employment Situation:  $employment_situation <br>";
    $body   .="Reference: $reference <br>";
    $body   .="Couslling Experience:  $counselling_exp <br>";
    $body   .="Couselling Goal: $goal <br>";
}

else{
    $email = $_SESSION['emailaddress'];
    $date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];

    $body   = " $name has booked a new appointment <br>";
    $body   .= "Date:  $date <br>";
    $body   .= "Start: $start <br>";
    $body   .="End:  $end <br>";

}



$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
    $mail->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('admin@yourspacecounselling.net', 'Yourspace');
    $mail->addAddress('yourspacecounselling@hotmail.com', 'Michael');     // Add a r
   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Details';
    $mail->Body = $body;


   $mail->send();
   
   header('location:home.php');
} catch (Exception $e) {
}


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
    $mail2->Subject = 'Booking Confirmation';
    $body2   = "Hi $name, you have booked a new appointment <br>";
    $body2  .= "Date:  $date <br>";
    $body2  .= "Start: $start <br>";
    $body2   .="End:  $end <br>";
    $body2   .="If you would like to get a refund, cancel the appointment on the website and request us a refund by emailing at yourspacecounselling@hotmail.com with your receipt attached.";

  
    $mail2->Body = $body2;


   $mail2->send();
   } catch (Exception $e) {
}


    
?>