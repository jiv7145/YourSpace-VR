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
                <a href="home.php">
                    <h2 id="logo"> YourSpace </h2>
                </a>
                <div class="topnav">

                    <a href="#">About</a>
                    <a href="#">Contact</a>
                    <a href="#">Pricing</a>
                    <a href="download.php">Download</a>
                    <div id="logout">
                        <a class="float-right" href="logout.php"> Logout </a>
                    </div>

                </div>
            </div>
            <h2 style="margin-top: 50px"> Welcome
                <?php echo implode($_SESSION['username']);?>
            </h2>

            <div class="content">
                <div class="row ">

                    <div class="sidenav">
                        <form action="../../codeiAdmin" method="post">
                            <button style="margin-left:20px" type="submit" class="btn btn-primary btnsetting" id="btnBooking"> Upcoming Appointments</button>
                        </form>
                    </div>

                </div>

        
            </div>
        </div>
    </body>

    </html>