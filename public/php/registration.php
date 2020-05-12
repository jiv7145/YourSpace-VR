<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

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


$s = " select * from usertable where email = '$email'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
}else{
   
    $reg = "insert into usertable(name, password, email ) 
    values ('$name', '$pass', '$email')";
   mysqli_query($con, $reg);
   


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org';                     // SMTP username
    $mail->Password   = 'af8987050db1e591a89669b330487adc-3e51f8d2-728169a6';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('postmaster@sandboxaea20dd704434c90afa8bb9243767d46.mailgun.org', 'Mailer');
    $mail->addAddress('devel4800test@gmail.com', 'Joe User');     // Add a recipient
   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Registration confirmation';
    $mail->Body    = "Hi $name ,<br> You have successfully registered your Yourspace account";
   

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
            <div class="login-box">
                <div class="row">
                    <div class="col-md-6 login" style="margin:auto">

                        <h3 class="subHeading"> Sign up to create account</h3>
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

                            <button type="submit" class="btn btn-primary" id="btnCreate"> CREATE ACCOUNT  </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>