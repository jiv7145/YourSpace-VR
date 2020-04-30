<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css?after">
    <link rel = "stylesheet" type = "text/css" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

    <div class = "container">
    <div id = "header">
    <h2 id = "logo"> YourSpace </h2>
    <div class="topnav">
 
    <a href="#">About</a>
  <a href="#">Contact</a>
  <a href="#">Pricing</a>
  <a href="#">Download</a>
</div>
</div>

    <div class = "login-box">
    <div class = "col-md-6 login-left" style = "margin: auto">
   
    <h3 style = "margin-bottom : 50px"> Log in to your account</h3>
    <form action = "validation.php" method = "post">
    <div class = "form-group">
    <label> Username</label>
    <input type = "text" name = "user" class = "form-control" required>
    </div>
    <div class = "form-group">
    <label> Password</label>
    <input type = "password" name = "password" class = "form-control" required>
    </div>
    <button type = "submit" class = "btn btn-primary" id = "btnLogin"> LOGIN </button> 
    </form>
    </div>

    </div>
    </div>
</body>
<script src="login.js"></script>
</html>