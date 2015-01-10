<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<?php session_start() ?>

<!DOCTYPE html>

<html>
    <head >

        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="Description" content="Twoopic helps you stay up to date with the latest topics around and those trending worldwide.Sign up now to stay updated">
<meta name="Keywords" content="Topic,Twoopic,Trending,Natkeezy,Dennis,Natalia">
<meta name="Language" content="English">
<meta name="Robots" content="All">
<link rel="shortcut icon" href="favicon.png"/>
        <title><?php echo $_GET[user]?></title>
<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="js/nanox/index.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>


<script type="text/javascript">





$(function(){

var x=$(window).width();


var user=$("input#met").val();


if(x<550){
$("#compu").hide();
$(".mobile").show();
$(".sat").hide();
$("#namec").hide();
$("#photos").hide();
$("#uswq").html('<span style="color:black">Feeds</span>');
}else{
$("#compu").show();
$(".mobile").hide();

}


$("#profeed").delay(500).load('feeds.php',{"usera":user});







$("#photos").load('userphotos.php',{"name":user});





$("#edit").click(function()
{
$("#body").load('editprofile.php');

});


$("#editp").click(function()
{
$("#body").load('editprophoto.php');

});

$("#editc").click(function()
{
$("#body").load('editcoverphoto.php');

});


$("#sendmes").click(function()
{

var message=$("textarea#message").val();
var user=$("input#user").val();
var datastring='message='+message+'&user='+user;
$.ajax({

type:"POST",
url:"sendmessage.php",
data:datastring,
success:function(){
$("#result").html("<p>Your message has been sent</p>");

}

});



});

});


$(function(){


$("#sharep").click(function()
{
var user=$("input#user").val();
var datastring='person='+user;
$.ajax({
type:"POST",
url:"php/posttopic.php",
data:datastring,
success:function(){
$("#msgbox").show();
$("#mg").html("You have successfully shared this profile to your followers");
}

});



});

});


$(function(){

$(".followbtn").click(function(e)
{

e.preventDefault();

var id=$("input#id").val();
var user=$("input#met").val();
var datastring='id='+id+'&user='+user;
$.ajax({

type:"POST",
url:"followuser.php",
data:datastring,
success:function(data){

if(id=="Follow"){
$(".followbtn").slideUp();
$(".unfollo").fadeIn();}

if(id=="Following"){
$(".followbtn").slideUp();
$(".follo").fadeIn();}


}


});



});


$(".unfollo").click(function(e)
{

e.preventDefault();

var id='Following';
var user=$("input#met").val();
var datastring='id='+id+'&user='+user;
$.ajax({

type:"POST",
url:"followuser.php",
data:datastring,
success:function(data){

$(".unfollo").fadeOut();
$(".follo").fadeIn();


}


});



});


$(".follo").click(function(e)
{

e.preventDefault();

var id='Follow';
var user=$("input#user").val();
var datastring='id='+id+'&user='+user;
$.ajax({

type:"POST",
url:"followuser.php",
data:datastring,
success:function(data){

$(".follo").fadeOut();
$(".unfollo").fadeIn();


}


});



});




$("#clo").click(function()
{
$("#msgbox").hide();
});




});




function sd(){

var q = document.getElementById('mxe');
q.style.display='block';
}



function showmessage(){

var x = document.getElementById('show');
x.style.display='block';
x.fadeIn('slow');
}
function hidemessage(){

var x = document.getElementById('show');
x.style.display='none';

}

function showwrite(){

var x = document.getElementById('write');
x.style.display='block';
}

function hidewrite(){

var x = document.getElementById('write');
x.style.display='none';
}

function showfollowers(){

var x = document.getElementById('followers');
x.style.display='block';
}

function hidefollowers(){

var x = document.getElementById('followers');
x.style.display='none';
}

function showfollowing(){

var x = document.getElementById('following');
x.style.display='block';
}

function hidefollowing(){

var x = document.getElementById('following');
x.style.display='none';
}

function showabout(){

var x = document.getElementById('about');
x.style.display='block';
}

function hideabout(){

var x = document.getElementById('about');
x.style.display='none';
}



</script>
    </head>
<div id="body">
<?php include 'header.php' ?>
   <body data-ajax="false">
<?php 



$id=mysqli_real_escape_string($con,$_GET['user']);

$curr=mysqli_real_escape_string($con,$_GET['user']);
$ux=$_SESSION['current'];

$user=$curr;
$_SESSION['pro']=$curr;


$gg="select * from users where Username='$user'";
$hj=mysqli_query($con,$gg);
if(mysqli_num_rows($hj)==0){
echo '<span>This page does not exist.Seems like you have noticed an error.Please share with us <a href="profile.php?user=@twoopic" rel="external">@twoopic</a></span>';
}else{

$isfo="select * from follow where Userfollowing='$ux' and Userfollowed='$curr'";
$checkfollo=mysqli_query($con,$isfo);
if (mysqli_num_rows($checkfollo)==0){
$fo="Follow";
}else{
$fo="Following";

}



echo'<div style="display:none">
<input type="text" id="met" value="'.$user.'">
</div>';




$get="select * from users where Username='$user'";
$pr=mysqli_query($con,$get);

$f="select * from status where username='$user'";
$ps=mysqli_query($con,$f);
$stopics=mysqli_num_rows($ps);

$x="select * from topicfollowing where username='$user'";
$s=mysqli_query($con,$x);
$ftopics=mysqli_num_rows($s);
 
$b="select * from replies where Username='$user'";
$c=mysqli_query($con,$b);
$ftalks=mysqli_num_rows($c);
 
$fav=mysqli_query($con,"select * from favorites where Username='$user'");
$favno=mysqli_num_rows($fav);

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
$views=$getuser['views'];
if($ux!==$curr){
$newv=$views+1;
mysqli_query($con,"update users set views='$newv' where Username='$user'");
}


$isfo="select * from follow where Userfollowing='$user' and Userfollowed!='$user' order by rand()";
$checkfollo=mysqli_query($con,$isfo);
$numfollow=mysqli_num_rows($checkfollo);

//get list of users followers

$ifo="select * from follow where Userfollowed='$user' and Userfollowing!='$user' order by rand()";
$checkfoll=mysqli_query($con,$ifo);
$numfollowers=mysqli_num_rows($checkfoll);

$pass=mysqli_query($con,"select * from status  where username='$user' and media!='' and direct='' and sharing=''order by id desc");
$num=mysqli_num_rows($pass);




echo '

<div class="mobile" style="display:none">
<div>
<a href="profile.php?user='.$username.'" >
<img STYLE="border:solid 2px;border-color:#fff;height:60px;width:60px"  src="profilepics/'.$photo.'">
</a>

<br><span class="name" style="font-size:20px;font-family:"Century Gothic""class="fg-cyan">'.$fname.' '.$sname.'</span><span id="name" style="font-size:20px;font-family:"Century Gothic""class="fg-cyan">('.$username.')</span>
</div>

<br>';

$sal=mysqli_query($con,"select * from logged where username='$username' order by id limit 1");
$online=mysqli_fetch_array($sal);

if($online[time]==''){
if(mysqli_num_rows($sal)!==0){
echo '<span style="color:green">(Online)</span></b></span><br>';
}else{
echo '<span style="color:green">(Not active now)</span></b></span><br>';
}
}



if($ux==$curr){
echo '<a   href="editprofile.php" data-role="" data-inline="true" data-mini="true" rel="external"><span>Edit Profile </span></a>';
echo '<a   href="pic.php" data-role="" data-inline="true" data-mini="true" rel="external"><span>Edit Profile Photo</span></a>';
}else{

echo '
<div style="display:none">
<input type="text" value="'.$fo.'" id="id">
</div>';
echo '
<a class="followbtn" href="#" data-role="none" data-theme="e" class="fg-black" data-inline="true" data-mini="true" style="color:purple"><b>'.$fo.'</b></a>';
echo '<a class="unfollo" href="#" style="display:none" data-role="none" data-theme="e" class="fg-black" data-inline="true" data-mini="true" style="color:purple"><b>Following</b></a>';
echo '<a class="follo" href="#" style="display:none" data-role="none" data-theme="e" class="fg-black" data-inline="true" data-mini="true" style="color:purple"><b>Follow</b></a>';
echo '<a   rel="external" href="thread.php?with='.$username.'" data-role="none" data-inline="true" data-mini="true"><b> Send a private message</b></a>';
echo '<a href="msgphotoshare.php?with='.$username.'" data-role="none" style="color:#3b5998" rel="external" ><b> Share a private photo</b></a>';
}

echo '
<br><a   rel="external" href="fav.php?id='.$username.'" data-inline="true" data-mini="true" ><span style="font-size:15px;font-family:"Century Gothic""> View favorites('.$favno.')</span></a>
<a href="followers.php?user='.$username.'" rel="external"  ><span style="font-size:15px;font-family:"Century Gothic"">Followers ('.$numfollowers.')</span></a></td>
<a href="following.php?user='.$username.'" rel="external"  ><span style="font-size:15px;font-family:"Century Gothic"">Following ('.$numfollow.')</span></a></td>
<a href="appuserphotos.php?id='.$username.'" rel="external"  ><span style="font-size:15px;font-family:"Century Gothic"">Photos('.$num.')</span></a></td>
<a href="profile.php?user='.$username.'&t='.rand().'&type=about&m=ygtfydfusduhhchgdyfhjhfhj&id='.md5($username).'" rel="external"  ><span style="font-size:15px;font-family:"Century Gothic"">About</span></a></td>
<a href="profile.php?user='.$username.'&t='.rand().'&m=ygtfydfusduhhchgdyfhjhfhj&id='.md5($username).'" rel="external"  ><span style="font-size:15px;font-family:"Century Gothic"">Feeds</span></a></td></tr></table>






</div>



<div class="metro">
<div class="tile bg-gray" style="display:none;width:100%;height:300px;border:solid 1px" id="compu" >
<div style="width:100%;height:230px">';
if(!empty($cphoto)){
echo '<img src="profilepics/'.$cphoto.'" style="width:100%">';
}
echo '</div>


<div class="brand" >
 <span class="label fg-white opacity">
<table style="background:none"><tr><td style="width:2px"></td>
<td valign="top">
<a href="profile.php?user='.$username.'" >
<img STYLE="border:solid 2px;border-radius:500px;border-color:#fff;height:100px;width:100px"  src="profilepics/'.$photo.'">
</a></td>
<td>
<div data-role="controlgroup" data-type="horizontal">';
if($ux==$curr){
echo '<a rel="external" href="editprofile.php"  data-role="button" data-inline="true" data-mini="true">Edit Profile</a>';
echo '<a   id="edit" href="editcoverphoto.php" rel="external" data-role="button" data-inline="true" data-mini="true">Edit Cover Photo</a>';
echo '<a   id="edit" href="editprophoto.php"  rel="external" data-role="button" data-inline="true" data-mini="true">Edit Profile Photo</a>';
echo '<a   rel="external" href="fav.php?id='.$username.'" data-role="button" data-inline="true" data-mini="true">View favorites</a>';
}else{

echo '
<div style="display:none">
<input type="text" value="'.$fo.'" id="id">
</div>';
echo '
<a class="followbtn" href="#" data-role="button" data-theme="e" class="fg-black" data-inline="true" data-mini="true">'.$fo.'</a>';
echo '<a class="unfollo" href="#" style="display:none" data-role="button" data-theme="e" class="fg-black" data-inline="true" data-mini="true">Following</a>';
echo '<a class="follo" href="#" style="display:none" data-role="button" data-theme="e" class="fg-black" data-inline="true" data-mini="true">Follow</a>';
echo '<a   rel="external" href="fav.php?id='.$username.'" data-role="button" data-inline="true" data-mini="true">View favorites</a>';
echo '<a   rel="external" href="thread.php?with='.$username.'" data-role="button" data-inline="true" data-mini="true">Send a private message</a>';
echo '<a   rel="external" href="msgphotoshare.php?with='.$username.'" data-role="button" data-inline="true" data-mini="true">Send a private photo</a>';
echo '<a  id="sharep" rel="external" href="#" data-role="button" data-inline="true" data-mini="true">Share This Profile</a>';
}
echo '</div>
</td>
</tr></table>
</span>
       <center><span class="badge opacity" align="right" style="width:650px;height:50px">

</span></span>
    </div>
</div>


<div id="contana" class="fg-black"></div>
<span id="namec" style="font-size:20px;font-family:"Century Gothic"" class="fg-cyan">'.$fname.' '.$sname.'</span>
<br><span id="uswq" style="font-size:20px;font-family:"Century Gothic"" class="fg-cyan">('.$username.')</span>



<div class="modalDialog bg-black" id="about" style="display:none">
<div style="border:solid 10px;border-color:darkblue;opacity:1;width:400px;height:400px"><a onclick="hideabout()" class="close"><big>X</big></a><br>




<span style="font-size:20px;font-family:"Century Gothic""class="fg-cyan">About '.$username.'</span>

<br><span style="color:green"><b>Bio</b></span><br>
<span>'.$bio.'</span><br>

<span style="color:green"><b>Country</b></span><br>
<span>'.$getuser[Country].'</span><br>
<span style="color:green"><b>Category</b></span><br>
<span>'.$getuser[Category].'</span><br>
<span style="color:green"><b>Email</b></span><br>
<span>'.$email.'</span><br>
<span style="color:green"><b>Website</b></span><br>
<span>'.$web.'</span><br>



</div>
</div>

<div class="modalDialog bg-black" id="msgbox" style="display:none">
<div style="border:solid 10px;border-color:darkblue;opacity:1;width:400px;height:auto"><a href="#" id="clo">X</a><br>
<span style="font-size:18px" id="mg"><b></b></span>
</div>
</div>



<div class="tile" style="width:100%;height:auto">';
//get list of users the current user is following



echo '<table class="sat">
<td onclick="showabout()"valign="top" class="bg-cyan fg-white" style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white"><span style="font-size:15px;font-family:"Century Gothic"">About</span></td>
<td valign="top" class="bg-dark fg-white" style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white"><span style="font-size:15px;font-family:"Century Gothic"">Talks ('.$ftalks.')</span></td>
<td valign="top" class="bg-dark fg-white" style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white"><span style="font-size:15px;font-family:"Century Gothic"">Topics Shared ('.$stopics.')</span></td>
<td valign="top" class="bg-dark fg-white" style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white"><span style="font-size:15px;font-family:"Century Gothic"">Topics Following ('.$ftopics.')</span></td>
<td valign="top" class="bg-dark fg-white" style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white"><span style="font-size:15px;font-family:"Century Gothic"">Favorited ('.$favno.' items)</span></td>
<td valign="top"  style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white"></td>

<td valign="top" class="bg-cyan fg-white" style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white" onclick="showfollowers()"><span style="font-size:15px;font-family:"Century Gothic"">Followers ('.$numfollowers.')</span></td>
<td valign="top" class="bg-cyan fg-white" style="width:150px;height:50px;border:solid 2px;border-radius:5px;border-color:white" onclick="showfollowing()"><span style="font-size:15px;font-family:"Century Gothic"">Following ('.$numfollow.')</span></td></tr></table>

</div>

';


echo '<div style="display:none" id="show" class="modalDialog bg-black"> <div style="border:solid 10px;border-color:darkblue;opacity:1;"><a onclick="hidemessage()" class="close"><big>X</big></a>
<form method="post" action="sendmessage.php">
<h4>Send a message to '.$user.'</h4>
<textarea id="message" rows="3" cols="60" name="message"></textarea>
<div style="display:none">
<input type="text" value="'.$user.'" id="user" name="user"/></div></form>

<input class="button default primary" type="submit" name="submit" id="sendmes" data-inline="true" data-mini="true"
value="Send Message">
<div id="result"></div> 
</div></div>';



echo'<div style="display:none" id="following" class="modalDialog bg-black"> <div style="border:solid 10px;border-color:darkblue;opacity:1;height:300px;overflow:scroll;width:500px "><a onclick="hidefollowing()" class="close"><big>X</big></a>
<h4>'.$user.' is following</h4>';
while($list=mysqli_fetch_array($checkfollo)){
$following=$list['Userfollowed'];


$e="select * from users where Username='$following'";
$proc=mysqli_query($con,$e);

while($det=mysqli_fetch_array($proc)){
echo '
<a rel="external" href="profile.php?user='.$det['Username'].'">
<img  STYLE="border:solid thin;border-radius:5px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
'.$det['Username'].'<br></a>';
}

}
echo '</div></div>';


echo '<div style="display:none" id="followers" class="modalDialog bg-black"> <div style="border:solid 10px;border-color:darkblue;opacity:1;height:300px;overflow:scroll;width:500px "><a onclick="hidefollowers()" class="close"><big>X</big></a>
<h4>People following '.$user.'</h4>';
while($follist=mysqli_fetch_array($checkfoll)){
$followers=$follist['Userfollowing'];

$t="select * from users where Username='$followers'";
$pro=mysqli_query($con,$t);
while($de=mysqli_fetch_array($pro)){
echo '

<a data-ajax="false" href="profile.php?user='.$de['Username'].'" class="av">
<img  STYLE="border:solid thin;border-radius:5px;height:50px;width:50px" src="profilepics/'.$de['Photo'].'">
'.$de['Username'].'<br></a>
';
}

}

}
echo '</div></div>

<div data-role="content" data-theme="b">
';

if(!empty($_GET[type])){

echo '

<span style="font-size:20px;font-family:"Century Gothic""class="fg-cyan">About '.$username.'</span>

<br><span style="color:green"><b>Bio</b></span><br>
<span>'.$bio.'</span><br>

<span style="color:green"><b>Country</b></span><br>
<span>'.$getuser[Country].'</span><br>
<span style="color:green"><b>Category</b></span><br>
<span>'.$getuser[Category].'</span><br>
<span style="color:green"><b>Email</b></span><br>
<span>'.$email.'</span><br>
<span style="color:green"><b>Website</b></span><br>
<span>'.$web.'</span><br>

';

}else{

if(mysqli_num_rows($hj)>0){

echo '<div id="photos" style="width:100%;height:auto">
</div><br>
<table style="background:none;width:100%"><tr><td valign="top" >
<span style="font-size:18px;font-family:"Century Gothic">'.$user.' Stories</span><br>
<div id="profeed" style="background:#d3d3d3;max-width:600px">
<span style="font-size:18px">Loading stories by '.$user.'....</span>
</div></td><td class="sat" valign="top">
<a href="#" data-role="button" style="border:none;background:#fff;border-radius:2px;color:black;width:auto"  rel="external">Profile Views<br>'.$views.'</a><br>
<span style="font-size:18px;font-family:"Century Gothic">'.$user.' Latest Topics</span><br>
<div style="background:#fff;height:auto;min-height:100px;border:solid 2px;border-color:#3b5998;border-radius:5px">';

$d=mysqli_query($con,"select distinct topic  from status where topic!='' and username='$user' order by id desc limit 10");

if(mysqli_num_rows($d)==0){
echo '<span>'.$user.' has not started a topic yet</span>';
}else{
while ($trends=mysqli_fetch_array($d)){
$se=ltrim($trends[topic],'#');

echo '<li style="list-style-type:none">

<div style="color:black;width:250px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="search.php?q='.$se.'&cuser='.$user.'&key='.$_POST[key].'" rel="external" style="color:purple;font-size:15px"><b>'.$trends[topic].'</b></a>
</div></li>';

}

}
echo '</div></td></tr></table>
';}
echo '</div>

</div>
';

}





?>
<span style="font-size:14px;font-family:"Century Gothic"">Copyright 2014 Nanoxcorp</span>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
</body>
</div>
</html>