<?php


$con=mysqli_connect("localhost","nanoxcor_natalia","masenoenats123","nanoxcor_natalia");

$log="SELECT * FROM logged";
$reslog=mysqli_query($con,$log);
$user=mysqli_fetch_array($reslog);




$sq="SELECT * FROM status where replies >0 order by replies desc";
$res=mysqli_query($con,$sq);

$me=$_SESSION['current'];


//get list of users the current user is following

$isfo="select * from follow where Userfollowing='$me'";
$checkfollo=mysqli_query($con,$isfo);

$numfollow=mysqli_num_rows($checkfollo);
$_SESSION['following']=$numfollow;


//Get list of users following current user.

$ifo="select * from follow where Userfollowed='$me'";
$checkfoll=mysqli_query($con,$ifo);

$numfollowers=mysqli_num_rows($checkfoll);
$_SESSION['followers']=$numfollowers;


$x="select * from topicfollowing where username='$me'";
$s=mysqli_query($con,$x);
$ftopics=mysqli_num_rows($s);

$_SESSION['topicsfollowing']=$ftopics;


?>

