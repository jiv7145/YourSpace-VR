<?php
session_start();

$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
mysqli_select_db($con,'SKIR56Zums');


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



$s = " select * from usertable where email = '$email'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){

    $reg = "insert into usersurvey(email, age, gender
    ,relationship_status, sexual_orientation, language, 
    employment_situation,reference, counselling_exp,goal  ) 
    values ('$email', '$age', '$gender'
    , '$relationship_status', '$sexual_orientation', '$language', '$employment_situation'
    , '$reference', '$counselling_exp', '$goal')";
   mysqli_query($con, $reg);
   header('location:home.php');

}else{
    
}
   
?>