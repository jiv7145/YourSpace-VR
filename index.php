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
 
  <a href="#news">About</a>
  <a href="#contact">Contact</a>
  <a href="#about">Pricing</a>
</div>
</div>
    <div class = "login-box">
    <div class = "row">
    
    <div class = "col-md-6 login-left">
    <h2> Login here </h2>
    <form action = "validation.php" method = "post">
    <div class = "form-group">
    <label> Username</label>
    <input type = "text" name = "user" class = "form-control" required>
    </div>
    <div class = "form-group">
    <label> Password</label>
    <input type = "password" name = "password" class = "form-control" required>
    </div>
    <button type = "submit" class = "btn btn-primary"> Login </button> 
    </form>
    </div>


    <div class = "col-md-6 login-right">
    <h3 style = "margin-bottom : 30px"> Sign up for VR counselling</h3>
    <form action = "registration.php" method = "post">

    <div class = "form-group">
    <label> First name</label>
    <input type = "text" name = "fName" class = "form-control" required>
    </div>

    <div class = "form-group">
    <label> Last name</label>
    <input type = "text" name = "lName" class = "form-control" required>
    </div>

    <div class = "form-group">
    <label> Email address</label>
    <input type = "text" name = "email" class = "form-control" required>
    </div>

    <div class = "form-group">
    <label> Username</label>
    <input type = "text" name = "user" class = "form-control" required>
    </div>

    <div class = "form-group">
    <label> Password</label>
    <input type = "password" name = "password" class = "form-control" required>
    </div>

    <button type = "submit" class = "btn btn-primary" id = "btnCreate"> CREATE ACCOUNT  </button> 
    </form>
    </div>

    </div>
    </div>
    </div>
</body>
</html>