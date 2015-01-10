<?php
session_start();
include 'allcon.php';
$cur=$_SESSION['current'];
$t=time();
$topicid=md5($t).rand().time();
$video=$_POST[vid];



//get users locale



$cou=mysqli_query($con,"select * from users where Username='$cur'");
$det=mysqli_fetch_array($cou);
$country=$det['Country'];
$cat=$det['Category'];


$dpeople=mysqli_real_escape_string($con,$_POST[dpeople]);


if(empty($_POST[status])){
$status="";
}else{
$new=mysqli_real_escape_string($con,ltrim($_POST[status],"#"));
$status='#'.$new;
}
$des=$_POST[des];
$desc=mysqli_real_escape_string($con,$_POST[des]);

$desc=mysqli_real_escape_string($con,$_POST[des]);

$msg = $desc;
preg_match_all('/(#\w+)/', $msg, $matches);

preg_match_all("/(@\w+)/", $msg, $matches);
foreach ($matches[0] as $username)
  {
$me=mysqli_query($con,"select * from users where Username='$username'");
$c=mysqli_fetch_array($me);
mysqli_query($con,"insert into mentions(userid,postid) values('$c[ID]','$topicid')");

}

if($des!==''||$status!==''){

$post="insert into status(username,topic,topicid,TIME,brow,Country,Category,description,direct) 
VALUES('$cur','$status','$topicid','$t','$brow','$country','$cat','$desc','$dpeople')";
mysqli_query($con,$post);

if(!empty($_GET[mobile])){
header("location:mhome.php");
}
echo "Your status has been updated";
}else{
echo "Please write something";
}
?>