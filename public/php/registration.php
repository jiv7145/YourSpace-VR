<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/PhpMailer/PHPMailer/src/Exception.php';
require '../../vendor/PhpMailer/PHPMailer/src/PHPMailer.php';
require '../../vendor/PhpMailer/PHPMailer/src/SMTP.php';
session_start();
//header('location:index.php');
//devel
// $con = mysqli_connect('localhost', 'root', 'comp4800');

//remote
$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');

mysqli_select_db($con,'SKIR56Zums');
$name = $_POST['name'];
$pass = $_POST['password'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$relationship_status = $_POST['relationship_status'];
$sexual_orientation = $_POST['sexual_orientation'];
$language = $_POST['language'];
$employment_situation = $_POST['employment_situation'];
$reference = $_POST['reference'];
$counselling_exp = $_POST['counselling_exp'];
$goal = $_POST['goal'];



$s = " select * from usertable where email = '$email'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
}else{
    $reg = "insert into usertable(name, password, email, age, gender
    ,relationship_status, sexual_orientation, language, 
    employment_situation,reference, counselling_exp,goal  ) 
    values ('$name', '$pass', '$email', '$age', '$gender'
    , '$relationship_status', '$sexual_orientation', '$language', '$employment_situation'
    , '$reference', '$counselling_exp', '$goal')";
   mysqli_query($con, $reg);
   
//    if(isset($_POST['sendmail'])){
//     (mail($_POST['email'], 'Registration Confirmation', 'You have successfully created your account with YourSpace.')); 
       
//    }


$mail = new PHPMailer(false);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "ssl://smtp.gmail.com"; // SMTP server                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'devel4800test@gmail.com';              // SMTP username
    $mail->Password = 'Yourspace_4800';                           // SMTP password
                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('devel4800test@gmail.com', 'Mailer');          //This is the email your form sends From
    $mail->addAddress($_POST['email'], 'Joe User'); // Add a recipient address
    //$mail->addAddress('contact@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Subject line goes here';
    $mail->Body    = 'Body text goes here';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

   header('location:login.php');
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css?after">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>

    <body>

        <div class="container">
            <div id="header">
                <h2 id="logo"> YourSpace </h2>
                <div class="topnav">

                    <a href="#">About</a>
                    <a href="#">Contact</a>
                    <a href="#">Pricing</a>
                    <a href="#">Download</a>
                </div>
            </div>
            <div class="login-box">
                <div class="row">
                    <div class="col-md-6 login" style="margin:auto">

                        <h3 class = "subHeading"> Sign up to create account</h3>
                        <form action="registration.php" method="post">

                            <div class="form-group">
                                <label> Name<span class="required"> *</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label style="color:red"> Email address<span class="required"> *</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Email address already exists" required>
                            </div>

                            <div class="form-group">
                                <label> Password<span class="required"> *</span></label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label> Age<span class="required"> *</span></label>
                                <input type="text" name="age" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label> Gender<span class="required"> *</span></label>
                                <input type="text" name="gender" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label> Relationship Status</label>
                                <input type="text" name="relationship_status" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Sexual Orientation</label>
                                <input type="text" name="sexual_orientation" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> Primary Language<span class="required"> *</span></label>
                                <input type="text" name="language" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label> Employment Situation<span class="required"> *</span></label>
                                <input type="text" name="employment_situation" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label> Did anyone refer you? </label>
                                <input type="text" name="reference" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Your counselling experience</label>
                                <input type="text" name="counselling_exp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Your counselling goal<span class="required"> *</span></label>
                                <input type="text" name="goal" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary" id="btnCreate"> CREATE ACCOUNT  </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>