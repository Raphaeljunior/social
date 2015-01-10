
<?php session_start();?>
<?php
include 'allcon.php';
$cuc=$_POST['id'];

$name=$_POST[user];
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

$ke=mysqli_query($con,"select * from users where Username='$name' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{



$yu="select * from status where topicid='$cuc'";
$d=mysqli_query($con,$yu);
$ty=mysqli_fetch_array($d);
$to=$ty['topic'];

$id=md5($_POST[reply]).rand();


$pg="insert into replies(topicid,Username,messageid,Message,time,browserfrom)
values('$cuc','$name','$id','$_POST[reply]','$t','$brow')";
mysqli_query($con,$pg);



$update="insert into status (username,talk,talkabout,TIME,talkid)
values('$name','$_POST[reply]','$ty[topicid]','$t','$id')";
mysqli_query($con,$update);



$se="insert into notifications (usernotified,Username,type,about)
values('$ty[username]','$name','talk','$cuc')";
mysqli_query($con,$se);






//Get users following that topic
$x="select username from topicfollowing where topicid='$cuc'";
$p=mysqli_query($con,$x);


while($usersfollowing=mysqli_fetch_array($p) ){
$users=$usersfollowing['username'];

//Send a notification to those users
$se="insert into notifications (usernotified,Username,type,about)
values('$users','$name','talkf','$cuc')";
mysqli_query($con,$se);

}

}

?>
