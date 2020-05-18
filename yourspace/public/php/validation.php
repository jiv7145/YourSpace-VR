<?php
session_start();
// header('location:login.php');

//devel
//  $con = mysqli_connect('localhost', 'root', '');
//  mysqli_select_db($con,'user');

// //remote
$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
mysqli_select_db($con,'SKIR56Zums');

$email = $_POST['email'];
$pass = $_POST['password'];
$name = mysqli_query($con, " select name from usertable where email = '$email'");
$s = " select * from usertable where email = '$email' && password = '$pass'";
$result = mysqli_query($con, $s);
$admin = mysqli_query($con, " select admin from usertable where email = '$email' && password = '$pass'");

$row = mysqli_fetch_array($name,MYSQLI_ASSOC);
$rowAdmin = mysqli_fetch_array($admin,MYSQLI_ASSOC);
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['username'] = $row;
    $_SESSION['emailaddress'] = $email;
    if(implode($rowAdmin) == 'False'){
        header('location:home.php');
    }else{
        header('location:homeAdmin.php');
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
        <link rel="stylesheet" type="text/css" href="../css/style.css">
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

                    <div class="col-md-6 login-left" style="margin:auto">

                        <h3 class="subHeading"> Log in to your account</h3>
                        <form action="validation.php" method="post">
                            <div class="form-group">
                                <p style="color:red"> Incorrect Email or password </p>
                                <label style="color:red"> Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label style="color:red"> Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnLogin"> LOGIN </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>