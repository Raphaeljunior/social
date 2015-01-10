<?php
session_start();
include 'allcon.php';
?>
<script type="text/javascript">
$(function(){

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


var x=$(window).width();
if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}




});

</script>

<?php

$user=$_POST[usera];
$type=$_POST[type];
$app=$_POST[id];
$cuser=$_SESSION[current];

echo '<div style="display:none">
<input type="text" value="'.$cuser.'" id="u">
</div>';

$f="select * from status where username='$user'";
$ps=mysqli_query($con,$f);
$stopics=mysqli_num_rows($ps);


$fav=mysqli_query($con,"select * from favorites where Username='$user'");
$favno=mysqli_num_rows($fav);


$fa="select * from status where username='$user' and media!=''";
$pas=mysqli_query($con,$fa);
$photos=mysqli_num_rows($pas);





//get list of users the current user is following


$isfo="select * from follow where Userfollowing='$user' and Userfollowed!='$user' order by rand()";
$checkfollo=mysqli_query($con,$isfo);
$numfollow=mysqli_num_rows($checkfollo);
mysqli_query($con,"delete * from follow where Userfollowing='' or Userfollowed=''");



if(!empty($_GET[pfollowing])){

while($list=mysqli_fetch_array($checkfollo)){
$following=$list['Userfollowed'];


$e="select * from users where Username='$following'";
$proc=mysqli_query($con,$e);
$det=mysqli_fetch_array($proc);
echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="avatar">
<li style="list-style-type:none;height:auto"><a rel="external" href="profile.php?user='.$det['Username'].'&cuser='.$cuser.'">
<img  STYLE="border-radius:5px;height:100px;width:100px;border:solid;border-color:#d3d3d3" src="profilepics/'.$det['Photo'].'"></a></li>
</td>
<td valign="top" style="color:black;width:auto;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="profile.php?user='.$det[Username].'&cuser='.$cuser.'&key='.$_POST[key].'" rel="external" style="color:black;font-type:"Century Gothic"" ><b>'.$det[FirstName].' '.$det[SecondName].'</b><br style="color:purple">'.$det[Username].'</a><br>
';

$s="select * from follow where Userfollowing='$cuser' and Userfollowed='$det[Username]'";
$v=mysqli_query($con,$s);
if($following!==$cuser){
if(mysqli_num_rows($v)==0){
echo '
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
';

}else{

echo '<a href="thread.php?cuser='.$user.'&with='.$det[Username].'&key='.$_POST[key].'" rel="external"><button user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Message</b></button>';
}
}
echo '</td>
</tr></table>';
}

}






//get list of users followers

$ifo="select * from follow where Userfollowed='$user' and Userfollowing!='$user' order by rand()";
$checkfoll=mysqli_query($con,$ifo);
$numfollowers=mysqli_num_rows($checkfoll);




if(!empty($_GET[pfollowers])){

while($list=mysqli_fetch_array($checkfoll)){
$following=$list['Userfollowing'];


$e="select * from users where Username='$following'";
$proc=mysqli_query($con,$e);
$det=mysqli_fetch_array($proc);
echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="avatar">
<img STYLE="border-radius:5px;height:100px;width:100px;border:solid;border-color:#d3d3d3" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="color:black;width:auto;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="profile.php?user='.$det[Username].'&cuser='.$cuser.'&key='.$_POST[key].'" rel="external" style="color:black;font-type:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br style="color:purple">'.$det[Username].'</a><br>
';

$s="select * from follow where Userfollowing='$cuser' and Userfollowed='$det[Username]'";
$v=mysqli_query($con,$s);
if($following!==$cuser){
if(mysqli_num_rows($v)==0){
echo '
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
';
}else{

echo '<a href="thread.php?cuser='.$user.'&with='.$det[Username].'&key='.$_POST[key].'" rel="external"><button user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Message</b></button>';
}
}
echo '</td>
</tr></table>';
}

}








$get="select * from users where Username='$user'";
$pr=mysqli_query($con,$get);
$getuser=mysqli_fetch_array($pr);
$username=$getuser['Username'];
$photo=$getuser['Photo'];
$fname=$getuser['FirstName'];
$sname=$getuser['SecondName'];
$personality=$getuser['Personality'];
$bio=$getuser['Bio'];
$email=$getuser['email'];
$web=$getuser['website'];
$cphoto=$getuser['coverphoto'];
$cat=$getuser[Category];
$country=$getuser[Country];

if(!empty($_GET[categ])){
echo $getuser[Category];
}


if(!empty($_GET[cover])){

if(!empty($cphoto)){
echo '<img src="profilepics/'.$cphoto.'" style="width:100%">';
}else{
echo '<img src="profilepics/cover.jpg" style="width:100%">';
}

}

if(!empty($_GET[profphoto])){
echo '<img STYLE="border:solid 2px;border-radius:500px;border-color:#fff;height:100px;width:100px"  src="profilepics/'.$photo.'">';
}

if(!empty($_GET[feed])){

echo $stopics;

}

if(!empty($_GET[photos])){

echo $photos;

}

if(!empty($_GET[fav])){

echo $favno;

}

if(!empty($_GET[followers])){

echo $numfollowers;

}

if(!empty($_GET[following])){

echo $numfollow;

}


if(!empty($_GET[about])){
echo '<span style="font-size:20px;font-family:"Century Gothic""class="fg-cyan">About '.$username.'</span>

<table style="width:330px"><tr>
<td style="width:150px" valign="top" class="fg-cyan"><span style="font-size:15px;font-family:"Century Gothic"" >Personality</span></td>
<td>'.$personality.'</td></tr>
<tr><td style="width:150px" valign="top" class="fg-cyan"><span style="font-size:15px;font-family:"Century Gothic""class="fg-cyan">Web</span></td>
<td><a href="'.$web.'">'.$web.'</a></td></tr>
<tr><td style="width:150px" valign="top" class="fg-cyan"><span style="font-size:15px;font-family:"Century Gothic""class="fg-cyan">Email</span></td>
<td>'.$email.'</td></tr>
<tr><td style="width:150px" valign="top" class="fg-cyan"><span style="font-size:15px;font-family:"Century Gothic""class="fg-cyan">Bio Info</span></td>
<td>'.$bio.'</td></tr>
<tr><td style="width:150px" valign="top" class="fg-cyan"><span style="font-size:15px;font-family:"Century Gothic""class="fg-cyan">Category</span></td>
<td>'.$cat.'</td></tr>
<tr><td style="width:150px" valign="top" class="fg-cyan"><span style="font-size:15px;font-family:"Century Gothic""class="fg-cyan">Country</span></td>
<td>'.$country.'</td></tr>


</table>';}

if(!empty($_GET[full])){
echo $fname.' '.$sname;
}

if(!empty($_GET[type])){


$isfo="select * from follow where Userfollowing='$cuser' and Userfollowed='$user'";
$checkfollo=mysqli_query($con,$isfo);
if (mysqli_num_rows($checkfollo)==0){
}else{
echo '<a href="" data-role="button" data-theme="e" data-mini="true" data-inline="true" id="unfollo">Following</a>';

}

}



?>