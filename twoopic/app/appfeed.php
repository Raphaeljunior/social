<?php session_start();

?>

<script type="text/javascript">
$(function(){


$(".favorite").click(function(e){
var current=$("input#u").val();
var key=$("input#key").val();
var id=$(this).attr("user");

var datastring='id='+id+'&user='+current+'&key='+key;
$(this).css("color","green");
var ci=$(this).find('span').html();
var num=parseInt(ci);
$(this).find('span').html(num +1);
$(this).unbind('click'); 
$.ajax({

type:"POST",
url:"http://twoopic.nanoxcorp.com/app/favorite.php",
data:datastring,
success:function(data){

}

});

});

$(".like").click(function(){

var current=$("input#u").val();
var id=$(this).attr("user");
var key=$("input#key").val();
var datastring='id='+id+'&user='+current+'&key='+key;
$(this).css("color","green");
var ci=$(this).find('span').html();
var num=parseInt(ci);
$(this).find('span').html(num +1);
$(this).unbind('click'); 
$.ajax({

type:"POST",
url:"http://twoopic.nanoxcorp.com/app/likes.php",
data:datastring,
success:function(data){

}

});

});



$(".share").click(function(){
var key=$("input#key").val();
var current=$("input#u").val();
var id=$(this).attr("user");

var datastring='id='+id+'&user='+current;
$(this).css("color","green");
var ci=$(this).find('span').html();
var num=parseInt(ci);
$(this).find('span').html(num +1);
$.ajax({

type:"POST",
url:"http://twoopic.nanoxcorp.com/app/share.php",
data:datastring,
success:function(data){

}

});

});




});

</script>

<?php

include 'allcon.php';
include 'functions.php';
$current=$_POST['user'];

$direct=$_GET['direct'];
$prof=$_POST['user'];

$topic=$_REQUEST['id'];



$photoonly=$_GET['photo'];

$all=$_GET['all'];
$inter=$_GET['inter'];

$talkonly=$_GET['talk'];

$q=$_REQUEST['q'];
$ppe=$_GET['phot'];




echo '<div style="display:none">
<input type="text" value="'.$current.'" id="u">
<input type="text" value="'.$_POST[key].'" id="key">
</div>';

$ke=mysqli_query($con,"select * from users where Username='$current' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{


if(!empty($photoonly)){
$y="select * from status where media!='' and direct='' order by id desc limit 100";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}

if(!empty($talkonly)){
$y="select * from status where talk!='' and direct='' order by id desc limit 100";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}

if(!empty($all)){

$y="select * from status where direct='' order by id desc limit 100";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}


if(!empty($_GET[cat])){
$y="select * from status where direct='' and Category='$_GET[cat]' and username!='$current' and sharing!='$current' order by id desc limit 100";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}

if(!empty($_GET[top])){
$x=mysqli_query($con,"select * from trending order by talks limit 1");
$that=mysqli_fetch_array($x);

$y="select * from status where topic like '%$that[topicid]%' or description like '%$that[topicid]%' or talk like '%$that[topicid]%' and direct=''     and username!='$current' and sharing!='$current' order by rand() desc limit 1";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}










if(!empty($_GET[cat])){
echo '<div style="backgound:#fff;width:100%;height:auto">

<span class="metro"><i class="icon-clock"></i><b>Recent Updates In '.$_GET[cat].'</b></span>';


}

echo '<div style="backgound:#fff;width:100%;height:auto">';












while($feed=mysqli_fetch_array($yy)){



if($feed[username]==$current||$feed[Sharing]==$current){








$l="select * from users where Username='$feed[username]'";
$ch=mysqli_query($con,$l);
$us=mysqli_fetch_array($ch);


$des=$feed['description'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$current.'&key='.$_POST[key].'&key='.$POST[key].'"><b>@$1</b></a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.html?q=$1&cuser='.$current.'&key='.$_POST[key].'"><b>#$1</b></a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);



$dees=$feed['talk'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$current.'&key='.$_POST[key].'"><b>@$1</b></a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.html?q=$1&cuser='.$current.'&key='.$_POST[key].'"><b>#$1</b></a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);




echo '<div style="background:#fff;width:100%;height:auto">';

if(!empty($feed[Sharing])){
echo '<b><span style="font-family:"Century Gothic"">
<a style="color:purple" rel="external" href="profile.html?user='.$feed[Sharing].'&cuser='.$current.'&key='.$_POST[key].'">'.$feed['Sharing'].'</a></b> shared this</span><br>';
}

echo '<table>
<tr>
<td valign="top" style="background:#fff">
<img src="http://twoopic.nanoxcorp.com/profilepics/'.$us[Photo].'" style="border-radius:500px;width:50px;height:50px">
</td>
<td>';

echo '<span style="color:black;font-family:"Century Gothic"">'.$us[FirstName].' '.$us[SecondName].'
<a href="profile.html?user='.$us[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">'.$us[Username].'</a></span><br>';
showtime($feed[TIME]);
echo'</td></tr></table>
<div style="background:#fff;width:100%;height:auto">';

if(!empty($feed[topic])){
echo '<b><span style="color:green;font-family:"Century Gothic"">
<a style="color:green" href="search.html?q='.ltrim($feed[topic],"#").'&cuser='.$current.'&key='.$_POST[key].'" rel="external">'.$feed[topic].'</a></span></b>';
}

if(!empty($feed[description])){
echo '<span style="font-family:"Century Gothic""> '.$pro.'</span>';
}

if(!empty($feed[talk])){
echo '<span style="font-family:"Century Gothic""> '.$prop.'</span><br>';
$qq="select * from status where topicid='$feed[talkabout]'";
$rtt=mysqli_query($con,$qq);
$talk=mysqli_fetch_array($rtt);
echo '<span style="font-size:13px;font-family:"Century Gothic"" class="metro"><i class="icon-reply on-left"></i>
<a style="color:blue" rel="external" href="profile.html?user='.$talk[username].'&cuser='.$current.'&key='.$_POST[key].'">'.$talk[username].'</a> 
<a style="color:green" href="topic.html?id='.$talk[topicid].'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external"> post </a>
<a style="color:green" href="topic.html?id='.$talk[topicid].'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">'.$talk[topic].'</a></span>';

if(!empty($talk[media])){
echo '<br><a rel="external" href="topic.html?id='.$talk[topicid].'&cuser='.$current.'&key='.$_POST[key].'">
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="http://twoopic.nanoxcorp.com/sharedmedia/'.$talk[media].'" style="width:100%;height:auto;max-height:300px;max-width:600px"></div></a>';
}

}

if(!empty($feed[media])){
echo '<a rel="external" href="topic.html?id='.$feed[topicid].'&cuser='.$current.'&key='.$_POST[key].'">
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="http://twoopic.nanoxcorp.com/sharedmedia/'.$feed[media].'" style="width:100%;height:auto;max-height:300px;max-width:600px;border-radius:4px">
</div></a>';

}



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

$a=mysqli_query($con,"select * from favorites where itemid='$ide' and Username='$current'");
$favchk=mysqli_num_rows($a);
$ab=mysqli_query($con,"select * from likes where itemid='$ide' and Userliking='$current'");

$likechk=mysqli_num_rows($ab);

echo '
<br><table style="width:100%;background:#d3d3d3;height:35px;border:solid thin;border-top:none;border-color:#fff">
<tr>
<td  class="metro">

<a  href="topic.html?id='.$ide.'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external"  data-mini="true" data-inline="true" data-theme="c" style="font-family:"Century Gothic"" class="metro" rel="external">
<b>View</b></a> 

</td>

<td style=""></td>
<div align="right"><td valign="top" class="metro">
<a href="topic.html?id='.$ide.'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external" class="comment" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i  class="icon-comments-4 on-left"></i><span>('.$replies.')</span>
</a>
</td>';

if($likechk==0){
echo '
<td valign="top" class="metro">

<a target="me" class="like" user="'.$ide.'" href="#"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i class="icon-thumbs-up on-left"></i>(<span>'.$likes.'</span>)</a>

</td>';}
else{
echo '
<td valign="top" class="metro">

<a target="me" class="unlike" user="'.$ide.'" href="#"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:green"><i class="icon-thumbs-up on-left"></i>(<span>'.$likes.'</span>)</a>

</td>';}


if($favchk==0){
echo '<td valign="top" class="metro">
<a href="#"  class="favorite" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i class="icon-star-3 on-left"></i>(<span>'.$favno.'</span>)</a>
</td>';}else{
echo '<td valign="top" class="metro">
<a href="#"  class="unfavorite" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:green"><i class="icon-star-3 on-left"></i>(<span>'.$favno.'</span>)</a>
</td>';

}

echo '<td valign="top" class="metro">
<a href="#" class= "share" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i class="icon-share on-left"></i>(<span>'.$shares.'</span>)</a>
</td></div>
</tr></table>';

echo '</div></div><br>';













}else{

$chkk=mysqli_query($con,"select * from follow where Userfollowing='$current'");

while($fol=mysqli_fetch_array($chkk)){
if($fol[Userfollowed]==$feed[username]||$fol[Userfollowed]==$feed[sharing]){

$l="select * from users where Username='$feed[username]'";
$ch=mysqli_query($con,$l);
$us=mysqli_fetch_array($ch);

$des=$feed['description'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$current.'&key='.$_POST[key].'"><b>@$1</b></a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.html?q=$1&cuser='.$current.'&key='.$_POST[key].'"><b>#$1</b></a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);



$dees=$feed['talk'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$current.'&key='.$_POST[key].'"><b>@$1</b></a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.html?q=$1&cuser='.$current.'&key='.$_POST[key].'"><b>#$1</b></a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);



echo '<div style="background:#fff;width:100%;height:auto;border-radius:5px">';

if(!empty($feed[Sharing])){
echo '<b><span style="font-family:"Century Gothic"">
<a style="color:purple" rel="external" href="profile.html?user='.$feed[Sharing].'&cuser='.$current.'&key='.$_POST[key].'">'.$feed['Sharing'].'</a></b> shared this</span><br>';
}

echo '<table>
<tr>
<td valign="top" style="background:#fff">
<img src="http://twoopic.nanoxcorp.com/profilepics/'.$us[Photo].'" style="border-radius:500px;width:50px;height:50px">
</td>
<td>';

echo '<span style="color:black;font-family:"Century Gothic"">'.$us[FirstName].' '.$us[SecondName].'
<a href="profile.html?user='.$us[Username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">'.$us[Username].'</a></span><br>';
showtime($feed[TIME]);
echo'</td></tr></table>
<div style="background:#fff;width:100%;height:auto">';

if(!empty($feed[topic])){
echo '<b><span style="color:green;font-family:"Century Gothic"">


<a style="color:green" href="search.html?q='.ltrim($feed[topic],"#").'&cuser='.$current.'&key='.$_POST[key].'" rel="external">'.$feed[topic].'</a></span></b>';
}

if(!empty($feed[description])){
echo '<span style="font-family:"Century Gothic""> '.$pro.'</span>';
}

if(!empty($feed[talk])){
echo '<span style="font-family:"Century Gothic""> '.$prop.'</span><br>';
$qq="select * from status where topicid='$feed[talkabout]'";
$rtt=mysqli_query($con,$qq);
$talk=mysqli_fetch_array($rtt);
echo '<span style="font-size:13px;font-family:"Century Gothic"" class="metro"><i class="icon-reply on-left"></i>
<a style="color:blue" data-prefetch rel="external" href="profile.html?user='.$talk[username].'&cuser='.$current.'&key='.$_POST[key].'">'.$talk[username].'</a> 
<a style="color:green" href="topic.html?id='.$talk[topicid].'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external"> post </a>
<a style="color:green" href="topic.html?id='.$talk[topicid].'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">'.$talk[topic].'</a></span>';

if(!empty($talk[media])){
echo '<br><a rel="external" href="topic.html?id='.$talk[topicid].'&cuser='.$current.'&key='.$_POST[key].'">
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="http://twoopic.nanoxcorp.com/sharedmedia/'.$talk[media].'" style="width:100%;height:auto"></div></a>';
}

}

if(!empty($feed[media])){
echo '<a rel="external" href="topic.html?id='.$feed[topicid].'&cuser='.$current.'&key='.$_POST[key].'">
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="http://twoopic.nanoxcorp.com/sharedmedia/'.$feed[media].'" style="width:100%;height:auto"></div></a>';

}



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



$a=mysqli_query($con,"select * from favorites where itemid='$ide' and Username='$current'");
$favchk=mysqli_num_rows($a);
$ab=mysqli_query($con,"select * from likes where itemid='$ide' and Userliking='$current'");

$likechk=mysqli_num_rows($ab);

echo '
<br><table style="width:100%;background:#d3d3d3;height:35px;border:solid thin;border-top:none;border-color:#fff">
<tr>
<td valign="top" class="metro">

<a  href="topic.html?id='.$ide.'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external"  data-mini="true" data-inline="true" data-theme="c" style="font-family:"Century Gothic"" class="metro" rel="external">
<b>View</b></a> 

</td>

<td style=""></td>
<div align="right"><td valign="top" class="metro">
<a href="topic.html?id='.$ide.'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external" class="comment" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i  class="icon-comments-4 on-left"></i><span>('.$replies.')</span>
</a>
</td>';

if($likechk==0){
echo '
<td valign="top" class="metro">

<a target="me" class="like" user="'.$ide.'" href="#"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i class="icon-thumbs-up on-left"></i>(<span>'.$likes.'</span>)</a>

</td>';}
else{
echo '
<td valign="top" class="metro">

<a target="me" class="unlike" user="'.$ide.'" href="#"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:green"><i class="icon-thumbs-up on-left"></i>(<span>'.$likes.'</span>)</a>

</td>';}


if($favchk==0){
echo '<td valign="top" class="metro">
<a href="#"  class="favorite" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i class="icon-star-3 on-left"></i>(<span>'.$favno.'</span>)</a>
</td>';}else{
echo '<td valign="top" class="metro">
<a href="#"  class="unfavorite" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:green"><i class="icon-star-3 on-left"></i>(<span>'.$favno.'</span>)</a>
</td>';

}

echo '<td valign="top" class="metro">
<a href="#" class= "share" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i class="icon-share on-left"></i>(<span>'.$shares.'</span>)</a>
</td></div>
</tr></table>';


echo '</div></div><br>';




}

}
}
}
}

?>
