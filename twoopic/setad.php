<?php 
session_start();
include 'allcon.php';
$user=$_SESSION[current];
$categ=$_POST[cat];
$phone=$_POST[phone];
$period=$_POST[time];
$target=$_POST[cou];
$bill=$_POST[bill];

mysqli_query($con,"insert into promoted(user,category,period,target,phone,status,bill) 
values('$user','$categ','$period','$target','$phone','pending','$bill')");

header("location:home.php");







?>
