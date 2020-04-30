<?php
session_start();
header('location:index.php');
//devel
// $con = mysqli_connect('localhost', 'root', 'comp4800');

//remote
$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');
mysqli_select_db($con,'SKIR56Zums');
$name = $_POST['user'];
$pass = $_POST['password'];

$s = " select * from usertable where name = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
    echo "username already taken";
}else{
    $reg = "insert into usertable(name, password) values ('$name', '$pass')";
   mysqli_query($con, $reg);
   echo "registration successful"; 
}

?>