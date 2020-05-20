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
                <a href="../../codei">Booking</a>
            </div>
        </div>

        <div class="login-box">
            <div class="divdeletion">
                <h3 class="h3deletion"> Would you like to delete your account? <br> Please confirm your account</h3>
            </div>
            <div class="col-md-6 login-left" style="margin: auto">
                <form action="deleteAccountValidation.php" method="post">
                    <div class="form-group">
                        <label> Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnLogin"> DELETE ACCOUNT </button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>