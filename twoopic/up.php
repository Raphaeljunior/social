<?php
session_start();
include 'allcon.php';
$m=$_GET[with];
$x=$_SESSION[current];



$y="select * from message where  Receiver ='$x'";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

mysqli_query($con,"update users set message='$numm' where Username='$x'");





mysqli_query($con,"update chat set messageid='1' where (Sender='$m' and Receiver='$x') or (Sender='$x' and Receiver='$m')");
$go="location:thread.php?with=$m";
header($go);


?>