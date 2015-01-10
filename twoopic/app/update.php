<?php
include 'allcon.php';
$current=$_POST[user];

if(!empty($_GET[int])){
$y="select * from status where  tags like '$current%' or description like '$current%' or talk like '$current%'  and direct=''";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

mysqli_query($con,"update users set inter='$numm' where Username='$current'");

}

if(!empty($_GET[dir])){
$y="select * from status where  direct like '%$current%' and username!='$current' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

mysqli_query($con,"update users set direct='$numm' where Username='$current'");

}

if(!empty($_GET[chat])){
$y="select * from message where  Receiver ='$current'";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

mysqli_query($con,"update users set message='$numm' where Username='$current'");

}


?>