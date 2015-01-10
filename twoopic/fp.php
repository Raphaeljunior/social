<?php
session_start();
include 'allcon.php';
if(!empty($_POST[userf])){

$user=mysqli_real_escape_string($con,ltrim($_POST['userf'],"@"));
$_SESSION[forgot]='@'.$user;
header("location:forgot.php");

}else{
header("location:index.php");
}
?>