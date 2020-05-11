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
            <h2 id="logo"> YourSpace </h2>
            <div class="topnav">

                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Pricing</a>
                <a href="#">Download</a>
            </div>
        </div>
        <div id="info">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, ut magni eaque ullam ipsa saepe dolore obcaecati repudiandae. Labore dolor impedit qui non illum perspiciatis! Dolores animi rerum optio maxime! Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Facilis, natus officia cum vitae deserunt, saepe error maxime velit unde ea voluptate accusantium minus vel! Qui, consequuntur. Nam ducimus saepe numquam! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam
            fugiat, enim officiis consequatur ad, accusantium, unde distinctio est ratione praesentium consequuntur tempore voluptatem aut. Repellat quos nobis ab deserunt iure.
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

                        <div class="form-group">
                            <label> Age<span class="required"> *</span></label>
                            <select name = "age" class = form-control required>
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
                        <button type="submit" name="sendmail" class="btn btn-primary" id="btnCreate"> CREATE ACCOUNT  </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>