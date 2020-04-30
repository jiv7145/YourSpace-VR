<?php
session_start();
// header('location:login.php');

//devel
// $con = mysqli_connect('localhost', 'root', 'comp4800');

//remote
$con = mysqli_connect('remotemysql.com', 'SKIR56Zums', 'JioDYRliuC');

mysqli_select_db($con,'SKIR56Zums');
$name = $_POST['user'];
$pass = $_POST['password'];

$s = " select * from usertable where name = '$name' && password = '$pass'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['username'] = $name;
    header('location:home.php');
}else{
   header('location:index.php');
}

?>