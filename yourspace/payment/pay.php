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
                    <a class="float-right"> Checkout </a>
                </div>

            </div>
        </div>
        <div class="login-box">
            <h3 class = "subHeading"> Pay Here</h3>
            <form action="checkout.php" method="post" autocomplete="off">

                <label for="item">
                        Product
                        <input type = "text" name = "product" class = "form-control">
                    </label>

                <label for="amount">
                        Price
                        <input type = "text" name = "price" class = "form-control">
                    </label>
                <input style="margin-top: 20px" class="btn btn-primary float-right" type="submit" value="Pay with PayPal" class="form-control">
            </form>
        </div>
    </div>


</body>

</html>