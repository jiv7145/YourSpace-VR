<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css?after">
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
<div id = "info">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, ut magni eaque ullam ipsa saepe dolore obcaecati repudiandae. Labore dolor impedit qui non illum perspiciatis! Dolores animi rerum optio maxime!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, natus officia cum vitae deserunt, saepe error maxime velit unde ea voluptate accusantium minus vel! Qui, consequuntur. Nam ducimus saepe numquam!
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam fugiat, enim officiis consequatur ad, accusantium, unde distinctio est ratione praesentium consequuntur tempore voluptatem aut. Repellat quos nobis ab deserunt iure.
</div>
    <div class = "login-box">
    <div class = "row">
    
    <div class = "col-md-6 login-left">
   
    <h3 style = "margin-bottom : 50px"> Log in to your account</h3>
    <form action = "public/php/validation.php" method = "post">
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


    <div class = "col-md-6 login-right">

    <h3 style = "margin-bottom : 30px"> Sign up to create account</h3>
    <form action = "public/php/registration.php" method = "post">

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
    <input id = "username" type = "text" name = "user" class = "form-control" required>
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