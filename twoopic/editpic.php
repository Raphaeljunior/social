<?php 
session_start();

include 'allcon.php';
session_start();

if(empty($_GET[user])){
$user=$_SESSION['current'];
}else{
$user=$_GET[user];
}


$pic=$_POST['name'];
$sel="select * from users where Username='@$user'";
$checkuser=mysqli_query($con,$sel);
$details=mysqli_fetch_array($checkuser);
$insert="update users set Photo='$pic' where Username='$user'";
$pas=mysqli_query($con,$insert);
$_SESSION['photo']=$pic;

if(!empty($_GET[mobile])){
header("location:mactions.php");
}else{
$go="location:profile.php?user=$_SESSION[current]";
header($go);
}


?>
