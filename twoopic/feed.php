<?php session_start();?>

<?php

include 'allcon.php';
include 'functions.php';
$current=$_SESSION['current'];

$direct=$_GET['direct'];
$prof=$_REQUEST['user'];

$topic=$_REQUEST['id'];



$photoonly=$_GET['photo'];
$alll=$_GET['alll'];
$all=$_GET['all'];
$inter=$_GET['inter'];

$talkonly=$_GET['talk'];

$q=$_REQUEST['q'];
$ppe=$_GET['phot'];


$bb="select * from follow where Userfollowing='$current'";
$hl=mysqli_query($con,$bb);






if(!empty($photoonly)){
$y="select * from status where media!='' and direct='' order by id desc limit 20";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}

if(!empty($talkonly)){
$y="select * from status where talk!='' and direct='' order by id desc limit 20";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}

if(!empty($all)){

$y="select * from status where direct='' order by id desc limit 12";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);


}
if(!empty($alll)){

$y="select * from status where direct='' order by id desc limit 40";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);


}



echo '<div style="backgound:#fff;width:100%;height:auto">';












while($feed=mysqli_fetch_array($yy)){



if($feed[username]==$current||$feed[Sharing]==$current){








$l="select * from users where Username='$feed[username]'";
$ch=mysqli_query($con,$l);
$us=mysqli_fetch_array($ch);


$des=$feed['description'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1">@$1</a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1">#$1</a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);

$dees=$feed['talk'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1">@$1</a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1">#$1</a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);


echo '<div style="background:#fff;width:100%;height:auto">';

if(!empty($feed[Sharing])){
echo '<b><span style="font-family:"Century Gothic"">
<a style="color:purple" rel="external" href="profile.php?user='.$feed[Sharing].'">'.$feed['Sharing'].'</a></b> shared this</span><br>';
}

echo '<table>
<tr>
<td valign="top" style="background:#d3d3d3">
<img src="profilepics/'.$us[Photo].'" style="border-radius:500px;width:50px;height:50px">
</td>
<td valign="top">';

echo '<span style="color:black;font-family:"Century Gothic"">'.$us[FirstName].' '.$us[SecondName].'
<a style="color:gray" href="profile.php?user='.$us[Username].'" rel="external">'.$us[Username].'</a></span><br>';

if(!empty($feed[topic])){
echo '<b><span style="color:green;font-family:"Century Gothic"">
<a style="color:green" href="topic.php?id='.$feed[topicid].'" rel="external">'.$feed[topic].'</a></span></b>';
}

if(!empty($feed[description])){
echo '<b><span style="font-family:"Century Gothic""> '.$pro.'</span></b>';
}

if(!empty($feed[talk])){
echo '<b><span style="font-family:"Century Gothic""> '.$prop.'</span></b><br>';
$qq="select * from status where topicid='$feed[talkabout]'";
$rtt=mysqli_query($con,$qq);
$talk=mysqli_fetch_array($rtt);
echo '<br><span style="font-family:"Century Gothic""><div class="metro"><i class="icon-comments-4 on-left"></i>in reply to <a style="color:blue" data-prefetch rel="external" href="profile.php?user='.$talk[username].'">'.$talk[username].'</a> 
<a style="color:green" href="topic.php?id='.$talk[topicid].'" rel="external"> post </a>
<a style="color:green" href="topic.php?id='.$talk[topicid].'" rel="external">'.$talk[topic].'</a></div></span>';

if(!empty($talk[media])){
echo '<br><a rel="external" href="photo.php?id='.$talk[topicid].'"><img src="sharedmedia/'.$talk[media].'" style="width:100%;height:300px"></a>';
}

}

if(!empty($feed[media])){
echo '<a rel="external" href="photo.php?id='.$feed[topicid].'">
<img src="sharedmedia/'.$feed[media].'" style="width:100%;height:300px"></a>';

}

echo '</td></tr>
<tr>
<td style="width:50px;background:#d3d3d3"></td>
<td valign="top">';
showtime($feed[TIME]);



$use=$_SESSION['current'];
if(!empty($feed[talk])){
$ide=$talk['topicid'];
}else{
$ide=$feed['topicid'];}


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



echo '
<a  href="topic.php?id='.$ide.'" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" rel="external"><i  class="icon-eye on-left"></i><b>View Post</b></a> 
<iframe name="me" style="width:100%;height:10px;border:solid 1px;border-color:#fff"></iframe>

<table>
<tr>
<td valign="top" class="metro">
<a  id="fol"  target="me" href="followtopic.php?id='.$ide.'&type='.$f.'" rel="external" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-arrow-right-2 on-left"></i>Following('.$following.') </a>
</td>

<td style=""></td>
<div align="right"><td valign="top" class="metro">
<a href="topic.php?id='.$ide.'" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:black"><i  class="icon-comments-4 on-left"></i>('.$replies.') </a>
</td>

<td valign="top" class="metro">
<a target="me" href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-thumbs-up on-left"></i>('.$likes.') </a>
</td>

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-thumbs-down on-left"></i>('.$dislikes.') </a>
</td>

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-star-3 on-left"></i>('.$favno.') </a>
</td>

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-share on-left"></i>('.$shares.') </a>
</td></div>
</tr></table>';

echo '</td>
</tr>
</table></div><br>';













}else{

$chkk=mysqli_query($con,"select * from follow where Userfollowing='$current'");

while($fol=mysqli_fetch_array($chkk)){
if($fol[Userfollowed]==$feed[username]||$fol[Userfollowed]==$feed[sharing]){

$l="select * from users where Username='$feed[username]'";
$ch=mysqli_query($con,$l);
$us=mysqli_fetch_array($ch);


$des=$feed['description'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1">@$1</a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1">#$1</a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);

$dees=$feed['talk'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1">@$1</a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1">#$1</a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);


echo '<div style="background:#fff;width:100%;height:auto">';

if(!empty($feed[Sharing])){
echo '<b><span style="font-family:"Century Gothic"">
<a style="color:purple" rel="external" href="profile.php?user='.$feed[Sharing].'">'.$feed['Sharing'].'</a></b> shared this</span><br>';
}

echo '<table>
<tr>
<td valign="top" style="background:#d3d3d3">
<img src="profilepics/'.$us[Photo].'" style="border-radius:500px;width:50px;height:50px">
</td>
<td valign="top">';

echo '<span style="color:black;font-family:"Century Gothic"">'.$us[FirstName].' '.$us[SecondName].'
<a style="color:gray" href="profile.php?user='.$us[Username].'" rel="external">'.$us[Username].'</a></span><br>';

if(!empty($feed[topic])){
echo '<b><span style="color:green;font-family:"Century Gothic"">
<a style="color:green" href="topic.php?id='.$feed[topicid].'" rel="external">'.$feed[topic].'</a></span></b>';
}

if(!empty($feed[description])){
echo '<b><span style="font-family:"Century Gothic""> '.$pro.'</span></b>';
}

if(!empty($feed[talk])){
echo '<b><span style="font-family:"Century Gothic""> '.$prop.'</span></b><br>';
$qq="select * from status where topicid='$feed[talkabout]'";
$rtt=mysqli_query($con,$qq);
$talk=mysqli_fetch_array($rtt);
echo '<br><span style="font-family:"Century Gothic""><div class="metro"><i class="icon-comments-4 on-left"></i>in reply to <a style="color:blue" data-prefetch rel="external" href="profile.php?user='.$talk[username].'">'.$talk[username].'</a> 
<a style="color:green" href="topic.php?id='.$talk[topicid].'" rel="external"> post </a>
<a style="color:green" href="topic.php?id='.$talk[topicid].'" rel="external">'.$talk[topic].'</a></div></span>';

if(!empty($talk[media])){
echo '<br><a rel="external" href="photo.php?id='.$talk[topicid].'"><img src="sharedmedia/'.$talk[media].'" style="width:100%;height:300px"></a>';
}

}

if(!empty($feed[media])){
echo '<a rel="external" href="photo.php?id='.$feed[topicid].'">
<img src="sharedmedia/'.$feed[media].'" style="width:100%;height:300px"></a>';

}

echo '</td></tr>
<tr>
<td style="width:50px;background:#d3d3d3"></td>
<td valign="top">';
showtime($feed[TIME]);



$use=$_SESSION['current'];
if(!empty($feed[talk])){
$ide=$talk['topicid'];
}else{
$ide=$feed['topicid'];}


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



echo '
<a  href="topic.php?id='.$ide.'" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" rel="external"><i  class="icon-eye on-left"></i><b>View Post</b></a> 
<iframe name="me" style="width:100%;height:10px;border:solid 1px;border-color:#fff"></iframe>

<table>
<tr>
<td valign="top" class="metro">
<a  id="fol"  target="me" href="followtopic.php?id='.$ide.'&type='.$f.'" rel="external" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-arrow-right-2 on-left"></i>Following('.$following.') </a>
</td>

<td style=""></td>
<div align="right"><td valign="top" class="metro">
<a href="topic.php?id='.$ide.'" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:black"><i  class="icon-comments-4 on-left"></i>('.$replies.') </a>
</td>

<td valign="top" class="metro">
<a target="me" href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-thumbs-up on-left"></i>('.$likes.') </a>
</td>

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-thumbs-down on-left"></i>('.$dislikes.') </a>
</td>

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-star-3 on-left"></i>('.$favno.') </a>
</td>

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-share on-left"></i>('.$shares.') </a>
</td></div>
</tr></table>';

echo '</td>
</tr>
</table>';


echo '</div><br>';
}
}
}
}
?>
