<?php 
session_start();
if(!isset($_SESSION['joined'])){
header('location:index.php');
}
?>
<?php
include 'allcon.php';
session_start();
$user=$_SESSION['joined'];
$pic=$_SESSION['pic'];
$sel="select * from users where Username='@$user'";
$checkuser=mysqli_query($con,$sel);
$details=mysqli_fetch_array($checkuser);
$insert="update users set Photo='$pic' where Username='@$user'";
$pas=mysqli_query($con,$insert);
$_SESSION['current']="@".$user;
$_SESSION['photo']=$pic;
header('location:home.php');
?>
