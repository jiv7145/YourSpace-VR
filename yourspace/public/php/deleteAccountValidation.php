<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
// $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
//header('location:index.php');
//devel
$con = mysqli_connect('localhost', 'root', '');

//remote
// $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
// mysqli_select_db($con,'SKIR56Zums');
mysqli_select_db($con,'user');
// mysqli_select_db($con,'SKIR56Zums');
$email = $_POST['email'];
$pass = $_POST['password'];
$s = " select * from usertable where email = '$email' && password = '$pass'";
$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $reg = "DELETE FROM usertable WHERE email = '$email'";
   mysqli_query($con, $reg);
   header('location:../../index.php');

   // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailgun.org';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'admin@yourspacecounselling.net';                     // SMTP username
    $mail->Password   = 'cd62fc8a0e80dd32f21f4db9a85ce31b-e5e67e3e-61e180c5';   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients

    $name = implode($_SESSION['username']);
    $email = $_SESSION['emailaddress'];

       //Recipients
       $mail->setFrom('admin@yourspacecounselling.net', 'Yourspace');
       $mail->addAddress($email, $name);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Account Deletion confirmation';
    $body = "Hi $name,<br> You have successfully deleted your Yourspace account <br>";
    $body   .="If you would like to get a refund, please request us a refund by emailing at yourspacecounselling@hotmail.com with your receipt attached.";

    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}else{
  
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
                <a href="home.php">
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
                <div class="divdeletion">
                    <h3 class="h3deletion"> Would you like to delete your account? <br> Please confirm your account</h3>
                </div>
                <div class="col-md-6 login-left" style="margin: auto">
                    <form action="deleteAccountValidation.php" method="post">
                        <div class="form-group">
                            <p style="color:red"> Incorrect Email or password </p>
                            <label style="color:red"> Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color:red"> Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnLogin"> DELETE ACCOUNT </button>
                    </form>
                </div>

            </div>
        </div>
    </body>

    </html>