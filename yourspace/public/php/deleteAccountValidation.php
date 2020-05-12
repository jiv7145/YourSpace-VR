<?php

session_start();

$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');

mysqli_select_db($con,'SKIR56Zums');
$email = $_POST['email'];
$pass = $_POST['password'];
$s = " select * from usertable where email = '$email' && password = '$pass'";
$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $reg = "DELETE FROM usertable WHERE email = '$email'";
   mysqli_query($con, $reg);
   header('location:../../index.php');

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