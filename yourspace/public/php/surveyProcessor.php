<?php
session_start();

// $con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
// mysqli_select_db($con,'SKIR56Zums');

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'form');

$email = $_SESSION['emailaddress'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$relationship_status = $_POST['relationship_status'];
$sexual_orientation = $_POST['sexual_orientation'];
$language = $_POST['language'];
$employment_situation = $_POST['employment_situation'];
$reference = $_POST['reference'];
$counselling_exp = $_POST['counselling_exp'];
$goal = $_POST['goal'];

$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];


    $reg = "insert into form(email, age, gender
    ,relationship_status, sexual_orientation, language, 
    employment_situation,reference, counselling_exp,goal, date, start, end) 
    values ('$email', '$age', '$gender'
    , '$relationship_status', '$sexual_orientation', '$language', '$employment_situation'
    , '$reference', '$counselling_exp', '$goal','$date','$start','$end')";
    if(mysqli_query($con, $reg)){

    }else{
     
        echo "failed";
    }
    
?>