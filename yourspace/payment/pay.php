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
                <a href="../public/php/download.php">Download</a>
                <a href="../codei">Booking</a>
                <div id="logout">
                    <a class="float-right" href="../public/php/logout.php"> Logout </a>
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
                    // $con = mysqli_connect('localhost', 'root', '');
                    // mysqli_select_db($con,'yourspace');

                    //remote
                    $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
                    mysqli_select_db($con,'SKIR56Zums');
                    
                    $email =  $_SESSION["emailaddress"];
                     
                    $event = " select * from events where email = '$email' and  paid = 'false'";
                    $result = mysqli_query($con, $event);
                    if(mysqli_num_rows($result) > 0){
                        $num = mysqli_num_rows($result);
                    }else{
                        $num = 0;
                    }
                    
              
                    

                    $start = mysqli_query($con, "select start_event from events where email = '$email' and paid = 'false' ");
                    if($start){
                       $startArray = Array();
                    while ($row = mysqli_fetch_array($start, MYSQLI_ASSOC)) {
                        $startArray[] =  $row['start_event'];  
                    } 
                    }
                    
                    $end = mysqli_query($con, "select end_event from events  where email = '$email' and paid = 'false'");
                    if ($end){
                    $endArray = Array();
                    while ($row = mysqli_fetch_array($end, MYSQLI_ASSOC)) {
                        $endArray[] =  $row['end_event'];  
                    }
                    }
                    


                      for ($i = 0; $i < $num; $i++) {
                                $eachRow = "<label for='item'>
                                Start
                                <input type = 'text' name = 'product' class = 'form-control' value = '$startArray[$i]' readonly = 'readonly'>
                            </label>
                            <label for='item'>
                                End
                                <input type = 'text' name = 'product' class = 'form-control' value = '$endArray[$i]' readonly = 'readonly'>
                            </label>

                        <label for='amount'>
                                Price
                                <input type = 'text' name = 'price' class = 'form-control' value = '150' readonly = 'readonly'>
                            </label>
                        <button type = 'hidden' style='margin-top: 20px' name ='title'  class='btn btn-primary float-right' type='submit' value='$startArray[$i]' class='form-control'>Pay with Paypal</button>";

                        echo "$eachRow <br>";
                            }  
                    

                                    
                            
                                    ?>
                    
                            
                    </form>
        </div>
    </div>


</body>

</html>