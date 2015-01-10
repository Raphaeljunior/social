<? 
session_start();
include 'allcon.php';
if(!isset($_SESSION['current'])){
header('location:index.php');
}

?>

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
        <title>Twoopic</title>
<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
        
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>


<script type="text/javascript">
$(function(){

var id=$("input#id").val();
var datastring='id='+id;
$("#feeda").load('feeds.php',{"id":id});

$("#replies").load('showreplies.php',{"id":id});


$("#follow").click(function()
{

var id=$("input#id").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"followtopic.php?type=Follow",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#unfollow").show();
$("#follow").fadeOut();
$("#feeda").load('feeds.php',{"id":id});
$("#mssg").delay(2000).fadeOut();
}

});



});


$("#unfollow").click(function()
{

var id=$("input#id").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"followtopic.php?type=unfollow",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#unfollow").fadeOut();
$("#follow").show();
$("#feeda").load('feeds.php',{"id":id});
$("#mssg").delay(2000).fadeOut();
}

});



});


$("#like").click(function()
{

var id=$("input#id").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"likes.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#like").fadeOut();
$("#dislike").show();
$("#feeda").load('feeds.php',{"id":id});
$("#mssg").delay(2000).fadeOut();
}

});



});


$("#dislike").click(function()
{

var id=$("input#id").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"dislikes.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#dislike").fadeOut();
$("#like").fadeIn();
$("#feeda").load('feeds.php',{"id":id});
$("#mssg").delay(2000).fadeOut();
}

});



});



$("#favorite").click(function()
{

var id=$("input#id").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"favorite.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#feeda").load('feeds.php',{"id":id});
$("#favorite").hide();
$("#mssg").delay(2000).fadeOut();
}

});



});

$("#share").click(function()
{

var id=$("input#id").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"share.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#feeda").load('feeds.php',{"id":id});
$("#mssg").delay(2000).fadeOut();
}

});



});


$("#pcom").click(function()
{
$("#mssg").show();
var id=$("input#id").val();
var reply=$("textarea#comment").val();

var datastring='id='+id+'&reply='+reply;

if(reply==''){
$("#msssg").html("<b>Please write something</b>");
}else{
$("#msssg").html("<b>Posting your comment...</b>");
$.ajax({

type:"POST",
url:"reply.php",
data:datastring,
success:function(data){
$("textarea#comment").val("");
$("#msssg").html("<b>Comment added</b>");
$("#feeda").load('feeds.php',{"id":id});
$("#replies").load('showreplies.php',{"id":id});
$("#msssg").delay(2000).html("");
}

});

}

});


var x=$(window).width();

if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}else{
$(".pc").show();
$(".mobile").hide();

}

setTimeout(function(){
var id=$("input#u").val();
var datastring='user='+id;
$.ajax({

url:"promoted.php",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){
 
$("#sponsored").html(data);
$("#load").hide();

}
});
},2000);

});
</script>


    </head>

<?php
$user=$_REQUEST['user'];
$user=$_SESSION['current'];
$sel="select * from users where Username='$user'";
$checkuser=mysqli_query($con,$sel);
$row=mysqli_fetch_array($checkuser);
$photo=$row['Photo'];
$fname=$row['FirstName'];
$sname=$row['SecondName'];

?>

<body id="body">
<div data-role="page">
<?php include_once ('header.php');?>
<div data-role="content" data-theme="b" id="body">

<?php


echo '
<div style="display:none">
<input type="text" id="id" value="'.$_GET[id].'">
</div>
<div style="display:none">
<input type="text" id="u" value="'.$_SESSION[current].'">
</div>

<table style="width:100%"><tr><td valign="top" style="max-width:500px">
<div id="feeda" style="background:#fff;width:100%;max-width:500px;height:auto;border-radius:5px">

</div>
<div style="background:#fff;max-width:500px">
<a href="showlikes.php?id='.$_GET[id].'" rel="external" style="font-size:17px">See who liked this post</a><br>
<a href="showfavorites.php?id='.$_GET[id].'" rel="external" style="font-size:17px">See who favorited this post</a><br>

<br><span style="font-size:17px"><b>Add your talk here</b></span><br>
<div id="msssg" style="font-size:15px;color:green"></div>
<div style="display:none" class="pc">				
<div class="input-control text" style="max-width:500px">
<textarea style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none;height:auto;width:100%" data-role="none" type="text" placeholder="Talk about this" id="comment"></textarea>
</div>
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" style="background:#3b5998;border:none;color:#fff;border-radius:1px" id="pcom">Comment</a>
</div>
</div>
<form style="display:none" action="reply.php" method="post" data-ajax="false" class="mobile">
<div style="display:none">
<input type="text" name="id" value="'.$_GET[id].'">
</div>
<div class="input-control text">
<textarea name="reply" style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none;height:auto;width:100%" data-role="none" type="text" placeholder="Talk about this" ></textarea>
</div>
<input type="submit" data-role="none" value="Comment" style="background:#3b5998;border:none;color:#fff;border-radius:0px;height:30px;width:100%">
</form>



<div style="background:none;width:500px;height:auto">';

$ch=mysqli_query($con,"select * from topicfollowing where topicid='$_GET[id]' and username='$_SESSION[current]'");

echo '
<div data-role="controlgroup" data-type="horizontal" style="width:500px" data-inline="false" class="metro">';


echo '<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="follow" style="border:none;background:#3b5998;color:#fff">Follow Topic</a>';

echo '<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="unfollow" style="display:none">Unfollow Topic</a>';
 
echo '<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="like" style="border:none;background:#3b5998;color:#fff"><i class="icon-thumbs-up on-left"></i> Like</a>
<a href="#"  data-role="button" data-mini="true" data-inline="true" data-theme="c" id="dislike" style="border:none;background:#3b5998;color:#fff"><i class="icon-thumbs-down on-left"></i>Dislike</a>

</div>
<div id="mssg" style="font-size:15px;color:green"></div>

</div>



<div style="background:#fff;max-width:500px;width:100%;height:auto;border-radius:5px" id="replies">
</div></td>
<td valign="top" class="pc" style="max-width:400px">
<div id="sponsored">
</div>
</td></tr></table>
';
?>
<div data-role="footer" data-position="fixed" data-theme="c" data-tap-toggle="false">

			</div>
</div>
</div>
<span style="font-size:14px;font-family:"Century Gothic"">Copyright 2014 Nanoxcorp</span>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
</body>
</html>
