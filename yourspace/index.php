<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css?after">
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
                <a href="public/php/download.php">Download</a>
            </div>
        </div>
        <div id="info">
          
        </div>
        <div class="login-box">
            <div class="row">

                <div class="col-md-6 login" style = "margin:auto">

                    <h3 class = "subHeading"> Log in to your account</h3>
                    <form action="public/php/validation.php" method="post">
                        <div class="form-group">
                            <label> Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnLogin"> LOGIN </button>
                    </form>
                    <div id = "divSignup">
                    New to YourSpace? <a style = "color:blue"href = "public/php/signup.php">Sign Up</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
</body>

</html>