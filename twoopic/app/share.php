<?php
session_start();
include 'allcon.php';

$page=$_GET['page'];
$by=$_POST[user];

if(!empty($_GET[id])){
$topicid=$_GET['id'];
}else{
$topicid=$_POST['id'];
}

$photo=$_GET['photo'];
$talk=$_GET['talk'];
$t=time();
$y="select * from status where topicid='$topicid' and Sharing='' order by id asc limit 1";
$m=mysqli_query($con,$y);
$top=mysqli_fetch_array($m);
$topic=$top['topic'];

if(!empty($_GET[from])){
$from=$_GET[from];
}else{
$from=$top['username'];}


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




$post="insert into status(username,Sharing,topic,topicid,TIME,brow,Country,Category,description,media,talk,talkabout) 
VALUES('$from','$by','$topic','$topicid','$t','$brow','$top[Country]','$top[Category]','$top[description]','$top[media]','$_GET[mid]','$_GET[topic]')";
mysqli_query($con,$post);


$rr="insert into shared(Topic)
values('$topicid')";
mysqli_query($con,$rr);

echo "Your topic has been shared";

?>