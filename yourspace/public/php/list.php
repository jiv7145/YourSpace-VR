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
                    <a href="../../codei">Booking</a>
                    <div id="logout">
                        <a class="float-right" href="logout.php"> Logout </a>
                    </div>
                    <div id="setting">
                        <a class="float-right" href="../../payment/pay.php"> Checkout </a>
                    </div>

                </div>
            </div>
            <div class="login-box">
            <h3 class="subHeading"> Upcoming Appointments</h3>
           
                <?php
                
                    // header('location:login.php');
                    //devel
                    // $con = mysqli_connect('localhost', 'root', '');

                    //remote
                    $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');

                    mysqli_select_db($con,'SKIR56Zums');
                    //  mysqli_select_db($con,'yourspace');
                    $email =  $_SESSION["emailaddress"];

                    $event = " select * from events where email = '$email' ";
                    $result = mysqli_query($con, $event);
                    $num = mysqli_num_rows($result);

                    $start = mysqli_query($con, "select start_event from events  where email = '$email'");
                    $startArray = Array();
                    while ($row = mysqli_fetch_array($start, MYSQLI_ASSOC)) {
                        $startArray[] =  $row['start_event'];  
                    }

                    $end = mysqli_query($con, "select end_event from events where email = '$email'");
                    $endArray = Array();
                    while ($row = mysqli_fetch_array($end, MYSQLI_ASSOC)) {
                        $endArray[] =  $row['end_event'];  
                    }

                    $func =  "<script> function alertCancel(){
                                   if(confirm('Would you like to cancel this appointment?')){
                                    document.getElementById('deleteForm').action = 'listDeletion.php';
                                   }else{
                                   }
                                    }</script>";
                                   echo $func;

                            for ($i = 0; $i < $num; $i++) {
                                $eachRow = "<label for='item'>
                                Start
                                <label type = 'text'  class = 'form-control'> $startArray[$i] </label>
                            </label>
                            <label for='item'>
                                End
                                <label type = 'text' class = 'form-control'>$endArray[$i]</label>
                            </label>
                                <form id = 'deleteForm' action = '' method = 'post'>
                        <button id = 'btnAptCancel'onclick='alertCancel();'  type = 'hidden' name ='start' class='btn btn-primary float-right' type='submit' value='$startArray[$i]' class='form-control'> Cancel Appointment</button>
                        </form>";

                        echo "$eachRow <br>";
                            }

                            

                                    ?>
                    
                            
                 
        </div>
        </div>
    </body>

    </html>