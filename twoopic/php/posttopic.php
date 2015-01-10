<?php
session_start();
include 'allcon.php';
$cur=$_SESSION['current'];
$t=time();
$topicid=md5($t).rand().time();
$topicid=md5($t).rand().time();
$topicid=md5($t).rand().time();
$video=$_POST[vid];

//get users locale



$cou=mysqli_query($con,"select * from users where Username='$cur'");
$det=mysqli_fetch_array($cou);
$country=$det['Country'];
$cat=$det['Category'];


$dpeople=$_POST[dpeople];

if(!empty($_POST[person])){
$person=$_POST[person];
$sh="Yes";
$desc="Check out $person";
$folx="insert into notifications(Usernotified,type,Username,time)
values('$person','share','$cur','$t')";
mysqli_query($con,$folx);
}
if(empty($_POST[status])){
$status="";
}else{
$new=mysqli_real_escape_string($con,ltrim($_POST[status],"#"));
$status='#'.$new;
}

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

$post="insert into status(username,topic,topicid,TIME,brow,Country,Category,description,direct,video,profile,shared) 
VALUES('$cur','$status','$topicid','$t','$brow','$country','$cat','$desc','$dpeople','$video','$person','$sh')";
mysqli_query($con,$post);

if(!empty($_GET[mobile])){
header("location:/twoopic/mhome.php");
}
echo "Your status has been updated";
}else{
echo "Please write something";
}
?>