<?php session_start();?>

<?php

include 'allcon.php';
include 'functions.php';


$topic=$_POST['id'];

$user=$_POST[cuser];





$bb="select * from follow where Userfollowing='$current'";
$hl=mysqli_query($con,$bb);

if(!empty($topic)){
$y="select * from status where topicid='$topic' and Sharing='' and direct='' limit 1";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}




while($feed=mysqli_fetch_array($yy)){

$l="select * from users where Username='$feed[username]'";
$ch=mysqli_query($con,$l);
$us=mysqli_fetch_array($ch);


$des=$feed['description'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$user.'&key='.$_POST[key].'">@$1</a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.html?q=$1&cuser='.$user.'&key='.$_POST[key].'">#$1</a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);



$dees=$feed['talk'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$user.'&key='.$_POST[key].'">@$1</a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.html?q=$1&cuser='.$user.'&key='.$_POST[key].'">#$1</a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);






if(!empty($_GET[pro])){
echo '<img src="http://twoopic.nanoxcorp.com/profilepics/'.$us[Photo].'" style="border-radius:500px;width:50px;height:50px">';
}

if(!empty($_GET[topic])){

echo '<span style="color:black;font-family:"Century Gothic"">'.$us[FirstName].' '.$us[SecondName].'
<a style="color:gray" href="profile.html?user='.$us[Username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">'.$us[Username].'</a></span><br>';


if(!empty($feed[topic])){
echo '<b><span style="color:green;font-family:"Century Gothic"">
<a style="color:green" href="search.html?q='.$feed[topic].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">'.$feed[topic].'</a></span></b>';
}

if(!empty($feed[description])){
echo '<b><span style="font-family:"Century Gothic""> '.$pro.'</span></b>';
}


if(!empty($feed[media])){
echo '
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="http://twoopic.nanoxcorp.com/sharedmedia/'.$feed[media].'" style="width:100%;height:auto;max-height:400px;max-width:600px"></div>';
}


}


if(!empty($_GET[photo])){

if(!empty($feed[media])){
echo '<img src="http://twoopic.nanoxcorp.com/sharedmedia/'.$feed[media].'" style="width:100%;height:auto;margin-top:10%;margin-bottom:10%">';
}


}








$ide=$_POST[id];


$get=mysqli_query($con,"select * from favorites where itemid='$ide'");
$favno=mysqli_num_rows($get);
$geta=mysqli_query($con,"select * from likes where itemid='$ide'");
$likes=mysqli_num_rows($geta);
$getaa=mysqli_query($con,"select * from dislikes where itemid='$ide'");
$dislikes=mysqli_num_rows($getaa);

$repi=mysqli_query($con,"select * from replies where topicid='$ide'");
$replies=mysqli_num_rows($repi);

$sha=mysqli_query($con,"select * from shared where Topic='$ide'");
$shares=mysqli_num_rows($sha);


$isfote="select * from topicfollowing where topicid='$ide'";
$ched=mysqli_query($con,$isfote);
$following=mysqli_num_rows($ched);







$isfot="select * from topicfollowing where topicid='$ide' and username='$use'";
$che=mysqli_query($con,$isfot);

if (mysqli_num_rows($che)==0){
$f="Follow";
}else{
$f="Unfollow";
}


if(!empty($_GET[com])){
echo $replies;
}
if(!empty($_GET[fol])){
echo $following;
}

if(!empty($_GET[like])){
echo $likes;
}
if(!empty($_GET[dis])){
echo $dislikes;
}
if(!empty($_GET[fav])){
echo $favno;
}
if(!empty($_GET[shares])){
echo $shares;
}
}

?>
