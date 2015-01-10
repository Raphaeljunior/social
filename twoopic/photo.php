<? 
session_start();
include 'php/allcon.php';


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
<script src="js/nanox/index.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>

<script type="text/javascript">
$(function(){

var qu=$("input#usera").val();
$("#photodisplay").load('photodis.php',{"id":qu});



$("#like").click(function()
{

var id=$("input#usera").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"likes.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#like").fadeOut();
$("#dislike").show();
$("#photodisplay").load('photodis.php',{"id":qu});
$("#mssg").delay(2000).fadeOut();
}

});



});


$("#dislike").click(function()
{

var id=$("input#usera").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"dislikes.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#dislike").fadeOut();
$("#like").fadeIn();
$("#photodisplay").load('photodis.php',{"id":qu});
$("#mssg").delay(2000).fadeOut();
}

});



});



$("#favorite").click(function()
{

var id=$("input#usera").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"favorite.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#photodisplay").load('photodis.php',{"id":qu});
$("#favorite").hide();
$("#mssg").delay(2000).fadeOut();
}

});



});

$("#share").click(function()
{

var id=$("input#usera").val();
var datastring='id='+id;
$.ajax({

type:"POST",
url:"share.php",
data:datastring,
success:function(data){
$("#mssg").html(data);
$("#photodisplay").load('photodis.php',{"id":qu});
$("#mssg").delay(2000).fadeOut();
}

});



});


$("#pcom").click(function()
{

var id=$("input#usera").val();
var reply=$("input#comment").val();

var datastring='id='+id+'&reply='+reply;

if(reply==''){
$("#msssg").html("Please write something");
}else{
$.ajax({

type:"POST",
url:"reply.php",
data:datastring,
success:function(data){
$("#sg").hide();
$("#msssg").html(data);
$("#feeda").load('feeds.php',{"id":id});
$("#photodisplay").load('photodis.php',{"id":qu});
$("#msssg").delay(2000).fadeOut();
}

});

}

});

$("#co").click(function()
{
$("#sg").slideToggle();

});


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

<?php include 'header.php' ?>

<?php
$id=$_GET[id];

$current=$_SESSION[current];
$y="select * from status where topicid='$id' and media!='' and direct='' order by id desc limit 1";
$yy=mysqli_query($con,$y);
$pho=mysqli_fetch_array($yy);


$get=mysqli_query($con,"select * from favorites where itemid='$id'");
$favno=mysqli_num_rows($get);
$geta=mysqli_query($con,"select * from likes where itemid='$id'");
$likes=mysqli_num_rows($geta);
$getaa=mysqli_query($con,"select * from dislikes where itemid='$id'");
$dislikes=mysqli_num_rows($getaa);



$repi=mysqli_query($con,"select * from replies where topicid='$id'");
$replies=mysqli_num_rows($repi);

$sha=mysqli_query($con,"select * from shared where Topic='$id'");
$shares=mysqli_num_rows($sha);



echo '<div style="display:none">
<input type="text" id="usera" value="'.$id.'">
</div>
<div data-role="content" data-theme="b" id="body">
<center>



<table><tr><td valign="top">



</td>
<td valign="top"><div style="background:none;width:600px;height:100%">
<div id="photodisplay">

</div>

</div>
</td>
</tr>
</table>
</center>



<div data-role="footer" data-position="fixed">
<center>
<div class="metro">

<div  style="background:none;width:500px;height:auto;display:none" id="sg">
<input type="text" placeholder="Add a comment here" id="comment" name="comment" data-theme="c">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="pcom">Comment</a>
<div id="msssg" style="font-size:15px;color:green"></div>
</div>

<td style=""></td>
<a rel="external" href="appuserphotos.php?id='.$pho[username].'" data-role="button" data-mini="true" data-inline="true">See all '.$pho[username].' Photos</a>
<a rel="external" href="topic.php?id='.$pho[topicid].'" data-role="button" data-mini="true" data-inline="true" data-theme="c">View comments</a>

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:black" id="co"><i  class="icon-comments-4 on-left"></i></a>
</td>

<td valign="top" class="metro">
<a  href="#" id="like" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-thumbs-up on-left"></i> </a>
</td>

<td valign="top" class="metro">
<a href="#" id="dislike" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-thumbs-down on-left"></i> </a>
</td>

<td valign="top" class="metro">
<a href="#" id="favorite" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-star-3 on-left"></i></a>
</td>

<td valign="top" class="metro">
<a href="#" id="share" data-role="button" data-mini="true" data-inline="true" data-theme="c"><i class="icon-share on-left"></i> </a>
</td>
<td valign="top" class="metro">
<div id="mssg" style="font-size:15px;color:white"></div>
</td>
</div></center>
</div>
</div>';
?>
<span style="font-size:14px;font-family:"Century Gothic"">Copyright 2014 Nanoxcorp</span>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
</body>
</html>
