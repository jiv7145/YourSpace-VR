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
        <div id="info">
           
        </div>
        <div class="login-box">
            <div class="row">


                <div class="col-md-6 login" style="margin:auto auto 50px auto">

                    <h3 style="margin-bottom : 30px"> Sign up to create account</h3>
                    <form action="registration.php" method="post">

                        <div class="form-group">
                            <label> Name<span class="required"> *</span></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Email address<span class="required"> *</span></label>
                            <input type="text" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Password<span class="required"> *</span></label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" name="sendmail" class="btn btn-primary" id="btnCreate"> CREATE ACCOUNT  </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>