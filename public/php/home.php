<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css?after">
        <link rel="stylesheet" type="text/css" href="../css/home.css?after">

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
                    <div id="logout">
                        <a class="float-right" href="logout.php"> Logout </a>
                    </div>
                    <div id="setting">
                        <a class="float-right" href="../../payment/pay.php"> Checkout </a>
                    </div>

                </div>
            </div>
            <h2 style="margin-top: 50px"> Welcome
                <?php echo implode($_SESSION['username']);?>
            </h2>

            <div class="content">
                <div class="row">

                    <div class="colleft">
                    <form action="../../../codei" method="post">

                        <h4 style="padding : 20px 20px"> My appointments</h4><br>
                        <button style = "margin-left:20px" type="submit" class="btn btn-primary" id="btnBooking"> Book Appointment </button>
                    </form>
                    <form action="survey.php" method="post">
                        <button style = "margin-left:20px" type="submit" class="btn btn-primary" id="btnServey"> Survey! </button>
                    </form>
                    </div>
                  
                </div>
            </div>
        </div>
    </body>

    </html>