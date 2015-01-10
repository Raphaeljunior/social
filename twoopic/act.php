<? 
session_start();
if(!isset($_SESSION[current])){
header("location:index.php");
}
include 'allcon.php';
include 'functions.php';
?>


<script type="text/javascript">
$(function(){

var x=$(window).width();

if(x<550){
$(".avatar").hide();

}




});
</script>
<?php


$current=$_SESSION[current];
$y="select * from notifications where  usernotified='$current' and Username!='$current' order by notificationid desc";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
if($numm==0){
echo'<div style="background:#fff;border-radius:5px;height:20px">
<span style="font-size:15px"><b>Here,all your related activities will displayed including when someone follows you,likes your posts,follows your topic,favorites your posts,talks about your post and when someone follows and unfollows you.</b></span>
</div>';
}else{

$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[activity];

$new=($numm-$oldn);
if($new<2||$new<10){
$limit=$new+6;
}else{
$limit=$new+6;
}


mysqli_query($con,"update users set activity='$numm' where Username='$current'");

$xac="select * from notifications where  usernotified='$current' and Username!='$current' and time!='' order by notificationid desc limit $limit";
$resa=mysqli_query($con,$xac);


function show($topic){

include 'allcon.php';

$yp="select * from status where topicid='$topic' and sharing='' order by id desc limit 1";
$yyp=mysqli_query($con,$yp);
$feed=mysqli_fetch_array($yyp);

$des=$feed['description'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1&cuser='.$user.'&key='.$_POST[key].'"><b>@$1</b></a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1&cuser='.$user.'&key='.$_POST[key].'"><b>#$1</b></a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);



$dees=$feed['talk'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1&cuser='.$user.'&key='.$_POST[key].'"><b>@$1</b></a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1&cuser='.$user.'&key='.$_POST[key].'"><b>#$1</b></a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);
echo '<div style="background:#fff;width:100%">';

if(!empty($feed[topic])){
echo '<b><span style="color:green;font-family:"Century Gothic"">
<a style="color:green" href="search.php?q='.ltrim($feed[topic],"#").'&cuser='.$user.'&key='.$_POST[key].'" rel="external">'.$feed[topic].' </a></span></b>';
}

if(!empty($feed[description])){
echo '<span style="font-family:"Century Gothic""><b>'.$pro.'</b></span>';
}

if(!empty($feed[talk])){
echo '<span style="font-family:"Century Gothic""> '.$prop.'</span><br>';
$qq="select * from status where topicid='$feed[talkabout]'";
$rtt=mysqli_query($con,$qq);
$talk=mysqli_fetch_array($rtt);
echo '<span style="font-size:13px;font-family:"Century Gothic"" class="metro"><i class="icon-reply on-left"></i>reply to
<a style="color:blue" rel="external" href="profile.php?user='.$talk[username].'&cuser='.$user.'&key='.$_POST[key].'">'.$talk[username].'</a> 
<a style="color:green" href="topic.php?id='.$talk[topicid].'&user='.$feed[username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external"> post </a>
<a style="color:green" href="topic.php?id='.$talk[topicid].'&user='.$feed[username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">'.$talk[topic].'</a></span>';

if(!empty($talk[media])){
echo '<br><a rel="external" href="topic.php?id='.$talk[topicid].'&cuser='.$user.'&key='.$_POST[key].'">
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="sharedmedia/'.$talk[media].'" style="width:100%;height:auto;max-height:300px;max-width:500px;border-radius:4px"></div></a>';
}

}

if(!empty($feed[media])){
echo '<a rel="external" href="topic.php?id='.$feed[topicid].'&cuser='.$user.'&key='.$_POST[key].'">
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="sharedmedia/'.$feed[media].'" style="width:100%;height:auto;max-height:300px;max-width:500px;border-radius:4px"></div></a>';

}

echo '</div>';
}

echo '<div style="display:none">
<input type="text" id="usera" value="'.$_SESSION[current].'">
</div>
<div style="background:#fff;width:100%;max-width:500px;height:auto;border-radius:5px">';


while($act=mysqli_fetch_array($resa)){

$getw="select * from users where Username='$act[Username]'";
$tyw=mysqli_query($con,$getw);
$uss=mysqli_fetch_array($tyw);



if($act[type]=="like"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> liked your <a rel="external" href="topic.php?id='.$act[about].'">post</a><br>';show($act[about]); showtime($act[time]); echo '</td></tr></table></li>';

}


if($act[type]=="talkhd"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> also talked about this <a rel="external" href="topic.php?id='.$act[about].'">post</a><br><span style="color:purple">"'.$act[message].'"</span><br>';show($act[about]); showtime($act[time]); echo '</td></tr></table></li>';

}



if($act[type]=="dislike"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> disliked your <a rel="external" href="topic.php?id='.$act[about].'">post</a><br>';show($act[about]);showtime($act[time]); echo '</td></tr></table></li>';

}



if($act[type]=="talk"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> talked about your <a rel="external" href="topic.php?id='.$act[about].'">post</a><br><span style="color:purple">"'.$act[message].'"</span><br>';show($act[about]); showtime($act[time]); echo '</td></tr></table></li>';

}

if($act[type]=="talkf"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> talked about a <a rel="external" href="topic.php?id='.$act[about].'">post</a> you are following<br><span style="color:purple">"'.$act[message].'"</span><br>';show($act[about]);showtime($act[time]); echo '</td></tr></table></li>';

}

if($act[type]=="favorite"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> favorited your <a rel="external" href="topic.php?id='.$act[about].'">post</a><br>';show($act[about]);showtime($act[time]); echo '</td></tr></table></li>';

}


if($act[type]=="follow"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> followed you <br>';showtime($act[time]); echo '</td></tr></table></li>';

}

if($act[type]=="share"){

echo '<br><li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table><tr><td class="avatar" valign="top"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].' <a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a> shared your profile <br>';showtime($act[time]); echo '</td></tr></table></li>';

}


}

echo '
</div>';
}
?>
