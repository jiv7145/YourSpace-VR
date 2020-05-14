<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div id="header">
            <a href="../public/php/home.php">
                <h2 id="logo"> YourSpace </h2>
            </a>
            <div class="topnav">
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Pricing</a>
                <a href="#">Download</a>
                <div id="logout">
                    <a class="float-right" href="logout.php"> Logout </a>
                </div>

                <div id="setting">
                    <a class="float-right"> Checkout </a>
                </div>

            </div>
        </div>
        <div class="login-box">
            <h3 class="subHeading"> Pay Here</h3>
            <form action="checkout.php" method="post" autocomplete="off">
                <?php
                    session_start();
                    // header('location:login.php');
                    //devel
                    $con = mysqli_connect('localhost', 'root', '');

                    //remote
                    // $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');

                    // mysqli_select_db($con,'SKIR56Zums');
                     mysqli_select_db($con,'yourspace');
                    $event = " select * from events";
                    $result = mysqli_query($con, $event);
                    $num = mysqli_num_rows($result);

                    $title = mysqli_query($con, "select title from events");
                    $titleArray = Array();
                    while ($row = mysqli_fetch_array($title, MYSQLI_ASSOC)) {
                        $storeArray[] =  $row['title'];  
                    }

                    
            for ($i = 0; $i < $num; $i++) {
                $eachRow = "<label for='item'>
                Appointment
                <input type = 'text' name = 'product' class = 'form-control' value = '$storeArray[$i]'>
            </label>

        <label for='amount'>
                Price
                <input type = 'text' name = 'price' class = 'form-control' value = '150'>
            </label>
        <button type = 'hidden' style='margin-top: 20px' name ='title'  class='btn btn-primary float-right' type='submit' value='$storeArray[$i]' class='form-control'>Pay with Paypal</button>";

        echo "$eachRow <br>";
            }
                    ?>
              
                    
            </form>
        </div>
    </div>


</body>

</html>