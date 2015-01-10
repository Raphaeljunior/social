<? 
session_start();
include 'allcon.php';
?>




<?php

$current=$_POST[user];

$ke=mysqli_query($con,"select * from users where Username='$current' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{





$y="select * from notifications where  usernotified='$current' and Username!='$current' order by notificationid desc";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

mysqli_query($con,"update users set activity='$numm' where Username='$current'");


echo '<div style="display:none">
<input type="text" id="usera" value="'.$_POST[user].'">
</div>

<div style="background:#fff;width:100%;height:auto">';

while($act=mysqli_fetch_array($yy)){

$getw="select * from users where Username='$act[Username]'";
$tyw=mysqli_query($con,$getw);
$uss=mysqli_fetch_array($tyw);

if($act[type]=="like"){

echo '<li style="list-style-type:none;border-bottom:solid thin;border-color:#d3d3d3;height:55px">
<table><tr><td style="width:50px"><img src="http://twoopic.nanoxcorp.com/profilepics/'.$uss[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td><b>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.html?user='.$uss[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">
'.$uss[Username].'</a> liked your <a rel="external" href="topic.html?id='.$act[about].'&cuser='.$current.'&key='.$_POST[key].'">post</a></b></td></tr></table></li>';

}

if($act[type]=="dislike"){

echo '<li style="list-style-type:none;border-bottom:solid thin;border-color:#d3d3d3;height:55px">
<table><tr><td style="width:50px"><img src="http://twoopic.nanoxcorp.com/profilepics/'.$uss[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td><b>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.html?user='.$uss[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">
'.$uss[Username].'</a> disliked your <a rel="external" href="topic.html?id='.$act[about].'&cuser='.$current.'&key='.$_POST[key].'">post</a></b></td></tr></table></li>';

}



if($act[type]=="talk"){

echo '<li style="list-style-type:none;border-bottom:solid thin;border-color:#d3d3d3;height:55px">
<table><tr><td style="width:50px"><img src="http://twoopic.nanoxcorp.com/profilepics/'.$uss[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td><b>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.html?user='.$uss[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">
'.$uss[Username].'</a> talked about your <a rel="external" href="topic.html?id='.$act[about].'&cuser='.$current.'&key='.$_POST[key].'">post</a></b></td></tr></table></li>';

}

if($act[type]=="talkf"){

echo '<li style="list-style-type:none;border-bottom:solid thin;border-color:#d3d3d3;height:55px">
<table><tr><td style="width:50px"><img src="http://twoopic.nanoxcorp.com/profilepics/'.$uss[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td><b>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.html?user='.$uss[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">
'.$uss[Username].'</a> talked about a <a rel="external" href="topic.html?id='.$act[about].'&cuser='.$current.'&key='.$_POST[key].'">post</a> you are following</b></td></tr></table></li>';

}

if($act[type]=="favorite"){

echo '<li style="list-style-type:none;border-bottom:solid thin;border-color:#d3d3d3;height:55px">
<table><tr><td style="width:50px"><img src="http://twoopic.nanoxcorp.com/profilepics/'.$uss[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td><b>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.html?user='.$uss[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">
'.$uss[Username].'</a> favorited your <a rel="external" href="topic.html?id='.$act[about].'&cuser='.$current.'&key='.$_POST[key].'">post</a></b></td></tr></table></li>';

}


if($act[type]=="follow"){

echo '<li style="list-style-type:none;border-bottom:solid thin;border-color:#d3d3d3;height:55px">
<table><tr><td style="width:50px"><img src="http://twoopic.nanoxcorp.com/profilepics/'.$uss[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td><b>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.html?user='.$uss[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">
'.$uss[Username].'</a> followed you </b></td></tr></table></li>';

}

if($act[type]=="unfollow"){

echo '<li style="list-style-type:none;border-bottom:solid thin;border-color:#d3d3d3;height:55px">
<table><tr><td style="width:50px"><img src="http://twoopic.nanoxcorp.com/profilepics/'.$uss[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td><b>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.html?user='.$uss[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">
'.$uss[Username].'</a> unfollowed you </b></td></tr></table></li>';

}
}

}
echo '
</div>';
?>

