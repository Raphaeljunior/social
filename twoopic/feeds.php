<?php session_start();?>

<script type="text/javascript">
$(function(){

var x=$(window).width();
if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}

if(x>550){
$("hr").hide();
}

$("button").click(function(){
var x=$(this).attr("class");

var cur=$("input#u").val();
var id='Follow';
var user=$(this).attr("user");
var datastring='id='+id+'&user='+user+'&cur='+cur;
$(this).html("<b>Following</b>");
$.ajax({

type:"POST",
url:"followuser.php",
data:datastring,
success:function(data){
}
});
});



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
url:"favorite.php",
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
url:"likes.php",
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
url:"share.php",
data:datastring,
success:function(data){

}

});

});

$(".del").click(function(){

var id=$(this).attr("id");

var datastring='id='+id;

$(this).css("color","green");
$.ajax({
type:"POST",
url:"delete.php",
data:datastring,
success:function(data){
if(data==''){
window.location.assign("home.php");
}else{
alert(data);
}
}
});
});


});

</script>



<?php

include 'allcon.php';
include 'functions.php';
$current=$_SESSION['current'];

$direct=$_GET['direct'];
$prof=$_REQUEST['usera'];

$topic=$_REQUEST['id'];
$x=$_GET[topic];


$photoonly=$_GET['photo'];

$all=$_GET['all'];
$inter=$_GET['inter'];

$talkonly=$_GET['talk'];

$q=$_REQUEST['q'];
$ppe=$_GET['phot'];

$sel="select * from users where Username='$current'";
$checkuser=mysqli_query($con,$sel);
$row=mysqli_fetch_array($checkuser);



echo '<div style="display:none">
<input type="text" value="'.$current.'" id="u">
<input type="text" value="'.$_POST[key].'" id="key">
</div>';



$bb="select * from follow where Userfollowing='$current'";
$hl=mysqli_query($con,$bb);

if(!empty($topic)){
$y="select * from status where topicid='$topic' and sharing='' and direct='' order by id desc limit 1";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
echo '<a href="http://twitter.com/intent/tweet?text=I just shared a new post on Twoopic Click to view&url=http://twoopic.nanoxcorp.com/topic.php?id='.$topic.'" rel="external" style="color:#3b5998" target="blank"><span><b>Share on twitter</b></span></a>';
echo '<a href="http://facebook.com/sharer.php?u=http://twoopic.nanoxcorp.com/topic.php?id='.$topic.'" rel="external" style="color:#3b5998" target="blank"><span><b> Share on facebook</b></span></a>';

}




if(!empty($q)){
$y="select * from status where topic like '%$q%' or description like '%$q%' or talk like '%$q%' and direct='' order by id desc limit 20";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}

if(!empty($prof)){
$y="select * from status where username='$prof' or sharing='$prof' and direct='' order by id desc limit 20";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
}




if(!empty($direct)){

$yv="select * from status where  direct like '%$current%' and username!='$current' ";
$yyv=mysqli_query($con,$yv);
$numm=mysqli_num_rows($yyv);
if($numm==0){
echo'<div style="background:#fff;border-radius:5px;height:50px">
<span style="font-size:15px"><b>Here,all posts sent directly to you will appear here</b></span>
</div>';
}


$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[direct];

$new=$numm-$oldn;
if($new<3){
$limit=$new+5;
}else{
$limit=$new+3;
}

$y="select * from status where  direct like '%$current%' and username!='$current' order by id desc limit $limit";
$yy=mysqli_query($con,$y);
}


if(!empty($inter)){
$yv="select * from mentions where userid='$row[ID]' ";
$yyv=mysqli_query($con,$yv);
$numm=mysqli_num_rows($yyv);

if($numm==0){
echo'<div style="background:#fff;border-radius:5px;height:50px">
<span style="font-size:15px"><b>Here,all posts that you were mentioned in or photos that you were tagged in will appear here.</b></span>
</div>';
}


$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[inter];

$new=$numm-$oldn;

if($new<3){
$limit=$new+5;
}else{
$limit=$new+3;
}

$y="select * from mentions where userid='$row[ID]'";
$yy=mysqli_query($con,$y);
$men=mysqli_fetch_array($yy);
}

echo '<div style="backgound:#d4d4d4;width:100%;height:auto">';
while($feed=mysqli_fetch_array($yy)){



$l="select * from users where Username='$feed[username]'";
$ch=mysqli_query($con,$l);
$us=mysqli_fetch_array($ch);


$des=$feed['description'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1&cuser='.$user.'&key='.$_POST[key].'"><b>@$1</b></a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1&cuser='.$user.'&key='.$_POST[key].'"><b>#$1</b></a>',$new);
$pro=preg_replace('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i','<a rel="external" target="blank" style="color:blue" href="$0">two.opic/'.rand(0,100).'</a>',$clea);



$dees=$feed['talk'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1&cuser='.$user.'&key='.$_POST[key].'"><b>@$1</b></a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1&cuser='.$user.'&key='.$_POST[key].'"><b>#$1</b></a>',$neew);
$prop=preg_replace('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i','<a rel="external" target="blank" style="color:blue" href="$0">two.opic/'.rand(0,100).'</a>',$cleae);




echo '
<hr>
<div style="background:#fff;width:100%;height:auto;border-radius:5px">';

if(!empty($feed[Sharing])){
echo '<b><span style="font-family:"Century Gothic"">
<a style="color:purple" rel="external" href="profile.php?user='.$feed[Sharing].'&cuser='.$user.'&key='.$_POST[key].'">'.$feed['Sharing'].'</a></b> shared this</span><br>';
}

echo '<table>
<tr>
<td valign="top" style="background:#fff" class="avatar">
<img src="profilepics/'.$us[Photo].'" style="border-radius:500px;width:50px;height:50px">
</td>
<td>';

echo '<span style="color:black;font-family:"Century Gothic"">'.$us[FirstName].' '.$us[SecondName].'
<a href="profile.php?user='.$us[Username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">'.$us[Username].'</a></span><br>';
showtime($feed[TIME]);
echo'</td></tr></table>
<div style="background:#fff;width:100%;height:auto">';

if(!empty($feed[topic])){
echo '<b><span style="color:green;font-family:"Century Gothic"">
<a style="color:green" href="search.php?q='.ltrim($feed[topic],"#").'&cuser='.$user.'&key='.$_POST[key].'" rel="external">'.$feed[topic].'</a></span></b>';
}

if(!empty($feed[description])){
echo '<span style="font-family:"Century Gothic""> '.$pro.'</span>';
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
<img src="sharedmedia/'.$talk[media].'" style="width:100%;height:auto;max-height:300px;max-width:600px;border-radius:4px"></div></a>';
}

}

if(!empty($feed[media])){
echo '<a rel="external" href="topic.php?id='.$feed[topicid].'&cuser='.$user.'&key='.$_POST[key].'">
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="sharedmedia/'.$feed[media].'" style="width:100%;height:auto;max-height:300px;max-width:600px;border-radius:4px"></div></a>';

}

if(!empty($feed[video])){
$clip=trim($feed[video],"http://youtu.be/");
echo '
<center><div style="background:#fff;width:100%;min-height:200px">
<iframe width="100%" height="350"
src="http://www.youtube.com/embed/'.$clip.'" frameborder="0" allowfullscreen>
</iframe>
</div></center>';
}

if(!empty($feed[profile])){
$vb=mysqli_query($con,"select * from users where Username='$feed[profile]'");
$th=mysqli_fetch_array($vb);

$ifo="select * from follow where Userfollowed='$th[Username]' and Userfollowing!='$th[Username]' order by rand()";
$checkfoll=mysqli_query($con,$ifo);
$numfollowers=mysqli_num_rows($checkfoll);

$isfo="select * from follow where Userfollowing='$th[Username]' and Userfollowed!='$th[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);
$numfollow=mysqli_num_rows($checkfollo);

$s="select * from follow where Userfollowing='$current' and Userfollowed='$th[Username]'";
$v=mysqli_query($con,$s);

echo '<br><br><div style="border:solid 1px;border-color:#d3d3d3;margin-left:5%;margin-right:5%"><table style="width:100%"><tr>
<td style="width:100px" valign="top">
<img src="profilepics/'.$th[Photo].'" style="border-radius:5px;width:100px;height:100px;border:solid 1px;border-color:#d4d4d4">
</td>
<td valign="top">
<a href="profile.php?user='.$th[Username].'" rel="external" style="color:black"><span style="font-size:18px"><b>'.$th[FirstName].' '.$th[SecondName].'</b></span><br>
<span style="font-size:15px"><b> '.$th[Username].'</b></span></a><br>
<span style="font-size:12px"><b>'.$th[Bio].'</b></span><br>
<div>
<a href="followers.php?user='.$th[Username].'" rel="external" style="color:purple;font-size:15px"><span style="font-size:16px"><b>'.$numfollowers.' followers</b></span></a> | 
<a href="following.php?user='.$th[Username].'" rel="external" style="color:purple;font-size:15px"><span style="font-size:16px"><b>'.$numfollow.' following</b></span></a>';

if($th[Username]!==$current){
if(mysqli_num_rows($v)==0){
echo '
<br><br><button class="Follow" user="'.$th[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
';
}
}

echo '</div>


</td>
</tr></table></div>';

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
<br><table style="width:100%;background:#d3d3d3;height:35px;border:solid thin;border-top:none;border-color:#fff" class="pc">
<tr>';

if(!empty($topic)){
if($feed[username]==$current||$feed[username]=='@twoopic'){
echo '
<td valign="top" class="metro">

<a  href="#" rel="external"  id="'.$feed[topicid].'" data-mini="true" data-inline="true" data-theme="c" style="font-family:"Century Gothic"" class="del" rel="external">
<b>Delete</b></a> 

</td>
';}
}else{

echo '<td valign="top" class="metro">

<a  href="topic.php?id='.$ide.'&user='.$feed[username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external"  data-mini="true" data-inline="true" data-theme="c" style="font-family:"Century Gothic"" class="metro" rel="external">
<b>View </b></a> 

</td>';}
echo'

<td style=""></td>
<div align="right"><td valign="top" class="metro">
<a href="topic.php?id='.$ide.'&user='.$feed[username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external" class="comment" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998"><i  class="icon-comments-4 on-left"></i><span>('.$replies.')</span>
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
</tr></table>


<div class="mobile" style="display:none" style="border-bottom:solid thin;border-bottom-color:#fff">
<a  href="topic.php?id='.$ide.'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external"  data-mini="true" data-inline="true" data-theme="c" style="font-family:"Century Gothic"" class="metro" rel="external">
<b>View</b></a> 

<a href="topic.php?id='.$ide.'&user='.$feed[username].'&cuser='.$current.'&key='.$_POST[key].'" rel="external" class="comment" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998">Talks<span>('.$replies.')</span>
</a>';

if($likechk==0){

echo '<a target="me" class="like" user="'.$ide.'" href="#"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998">Like(<span>'.$likes.'</span>)</a>
';}else{
echo '

<a target="me" class="unlike" user="'.$ide.'" href="#"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:green">Like(<span>'.$likes.'</span>)</a>

';}

if($favchk==0){
echo '
<a href="#"  class="favorite" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998">Favorite(<span>'.$favno.'</span>)</a>
';}else{
echo '
<a href="#"  class="unfavorite" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:green">Favorite(<span>'.$favno.'</span>)</a>
';

}

echo '<a href="#" class= "share" user="'.$ide.'"  data-mini="true" data-inline="true" data-theme="c" style="font-size:15px;color:#3b5998">Share(<span>'.$shares.'</span>)</a>

</div>
</div></div><br>



';



}


echo '</div>';


?>