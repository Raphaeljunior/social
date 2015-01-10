<?php 
session_start();
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<?php session_start();?>
<?php
include 'allcon.php';
$cuc=$_POST['id'];

$name=$_SESSION['current'];
$t=time();

$brr=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/MSIE/i',$brr)){
$brow="Microsoft Internet Explorer";
}
if(preg_match('/Firefox/i',$brr)){
$brow="Mozilla Firefox";
}
if(preg_match('/Chrome/i',$brr)){
$brow="Google Chrome";
}
if(preg_match('/Safari/i',$brr)){
$brow="Apple Safari";
}

if(preg_match('/Opera/i',$brr)){
$brow="Opera";
}
if(preg_match('/Netscape/i',$brr)){
$brow="Netscape Navigator";
}
if(preg_match('/Flock/i',$brr)){
$brow="Flock";
}
if(preg_match('/Lynx/i',$brr)){
$brow="Lynx";
}


if(!empty($_POST[reply])){

$yu="select * from status where topicid='$cuc'";
$d=mysqli_query($con,$yu);
$ty=mysqli_fetch_array($d);
$to=$ty['topic'];

$id=md5($_POST[reply]).rand();

$msg = $_POST[reply];
preg_match_all('/(#\w+)/', $msg, $matches);

preg_match_all("/(@\w+)/", $msg, $matches);
foreach ($matches[0] as $username)
  {
$me=mysqli_query($con,"select * from users where Username='$username'");
$c=mysqli_fetch_array($me);
mysqli_query($con,"insert into mentions(userid,postid) values('$c[ID]','$id')");

}

$reply=mysqli_real_escape_string($con,$_POST[reply]);
$pg="insert into replies(topicid,Username,messageid,Message,time,browserfrom)
values('$cuc','$name','$id','$reply','$t','$brow')";
mysqli_query($con,$pg);



$update="insert into status (username,talk,talkabout,TIME,talkid)
values('$name','$reply','$ty[topicid]','$t','$id')";
mysqli_query($con,$update);



$se="insert into notifications (usernotified,Username,type,about,time,message)
values('$ty[username]','$name','talk','$cuc','$t','$reply')";
mysqli_query($con,$se);






//Get users following that topic
$x="select username from topicfollowing where topicid='$cuc'";
$p=mysqli_query($con,$x);


while($usersfollowing=mysqli_fetch_array($p) ){
$users=$usersfollowing['username'];

//Send a notification to those users
$se="insert into notifications (usernotified,Username,type,about,time,message)
values('$users','$name','talkf','$cuc','$t','$reply]')";
mysqli_query($con,$se);

}

//Check if user had commented
$hd="select distinct Username from replies where topicid='$cuc'";
$pd=mysqli_query($con,$hd);



while($cl=mysqli_fetch_array($pd)){

$yp="select * from status where topicid='$cuc' and sharing='' order by id desc limit 1";
$yyp=mysqli_query($con,$yp);
$feed=mysqli_fetch_array($yyp);
$user=$feed[username];

if($user!==$cl[Username]){

$sed="insert into notifications (usernotified,Username,type,about,time,message)
values('$cl[Username]','$name','talkhd','$cuc','$t','$reply]')";
mysqli_query($con,$sed);

}

}
$go="location:topic.php?id=$cuc";
header($go);


}else{

echo "Please write something";

}
?>
