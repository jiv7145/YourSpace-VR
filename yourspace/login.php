<?php
    $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC', 'SKIR56Zums');

    if (mysqli_connect_errno()) {
        echo "1: connection failed";
        exit();
    }

    $username = $_POST["email"];
    $password = $_POST["password"];
    // $username = 'test2@test.com';
    // $password = 'password';

    $namecheckquery = "SELECT `email`, `password` from usertable WHERE `email`='" . $username . "';";
    $namecheck = mysqli_query($con, $namecheckquery) or die("2: name check query failed");

    if (mysqli_num_rows($namecheck) != 1) {
        echo "5: User not found, or more than one user with name";
        exit();
    }

    $logininfo = mysqli_fetch_assoc($namecheck);
    $username = $logininfo["email"];
    $pw = $logininfo["password"];

    if ($password != $pw) {
        echo "6: Incorrect password";
        exit();
    }
    
    echo "0:Success\t" . $logininfo["email"] . "\t" . $logininfo["password"];
?>