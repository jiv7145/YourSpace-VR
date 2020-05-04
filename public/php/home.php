

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
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css?after">
    <link rel = "stylesheet" type = "text/css" href = "../css/home.css?after">

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
  <div id = "logout">
<a class = "float-right"  href = "logout.php"> Logout </a>
</div>
<div id = "setting">
<a class = "float-right"  href = "#"> Setting </a>
</div>

</div>
</div>
<h2 style= "margin-top: 50px"> Welcome <?php echo $_SESSION['username'];?></h2>

<div class = "content">
    <div class = "row">
    
    <div class = "colleft">
       <h4 style = "padding : 20px 20px"> My appointments</h4><br>
       <ul>
  <li>Proident cupidatat fugiat ut et </li>
  <li>Duis minim magna enim enim quis proident.</li>
  <li>Fugiat cillum veniam consequat tempor proident</li>
</ul>
    </div>
    <div class = "colright">
        CALENDAR FOR SCHEDULING
    </div>
    </div>
    </div>
</div>
</body>
</html>
