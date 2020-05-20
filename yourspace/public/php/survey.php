<?php session_start() ?>
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
            <div class="row">
                <div class="col-md-6 login" style="margin:auto">

                    <h3 class="subHeading"> Please finish the survey</h3>
                    <form action="surveyProcessor.php" method="post">

                        <div class="form-group">
                            <label> Age<span class="required"> *</span></label>
                            <select name="age" class=form-control required>
<?php
    for ($i=1; $i<=100; $i++)
    {
        ?>
            <option value ="none" selected disabled hidden>Select your age</option>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }

?>
</select>
                        </div>

                        <div class="form-group">
                            <label> Gender<span class="required"> *</span></label>
                            <input type="text" name="gender" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Relationship Status</label>
                            <input type="text" name="relationship_status" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Sexual Orientation</label>
                            <input type="text" name="sexual_orientation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Primary Language<span class="required"> *</span></label>
                            <input type="text" name="language" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Employment Situation<span class="required"> *</span></label>
                            <input type="text" name="employment_situation" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Did anyone refer you? </label>
                            <input type="text" name="reference" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Your counselling experience</label>
                            <input type="text" name="counselling_exp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Your counselling goal<span class="required"> *</span></label>
                            <input type="text" name="goal" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btnCreate"> SUBMIT SURVEY </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>