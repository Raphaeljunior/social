<?php
session_start();
include 'allcon.php';
?>
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

<body id="body">
<?php include_once ('header.php');?>
<div data-role="content" data-theme="b" id="body" style="background:#fff">

<?php

$id=$_GET[id];
$cuser=$_SESSION[current];

echo '<div style="display:none">
<input type="text" value="'.$cuser.'" id="u">
</div>';





//get list of users the current user is following


$isfo="select * from likes where itemid='$id' order by rand()";
$checkfollo=mysqli_query($con,$isfo);
$numfollow=mysqli_num_rows($checkfollo);

echo '<span style="color:#3b5998;font-size:15px"><b>'.$numfollow.' people liked this post</b></span><br><br>';


if(!empty($_GET[id])){

while($list=mysqli_fetch_array($checkfollo)){
$following=$list['Userliking'];


$e="select * from users where Username='$following'";
$proc=mysqli_query($con,$e);
$det=mysqli_fetch_array($proc);
echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="avatar">
<li style="list-style-type:none;height:50px"><a rel="external" href="profile.php?user='.$det['Username'].'&cuser='.$cuser.'">
<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'"></a></li>
</td>
<td valign="top" style="color:black;width:60%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="profile.php?user='.$det[Username].'&cuser='.$cuser.'&key='.$_POST[key].'" rel="external" style="color:black;font-type:"Century Gothic"" ><b>'.$det[FirstName].' '.$det[SecondName].'</b><br style="color:purple">'.$det[Username].'</a>
</td>
<td>';

$s="select * from follow where Userfollowing='$cuser' and Userfollowed='$det[Username]'";
$v=mysqli_query($con,$s);
if($following!==$cuser){
if(mysqli_num_rows($v)==0){
echo '
<a href="#" class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><button user="'.$det[Username].'" data-role="none" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button></a>
';

}else{

echo '<a data-role="none" href="thread.php?cuser='.$user.'&with='.$det[Username].'&key='.$_POST[key].'" rel="external"><button user="'.$det[Username].'" data-role="none" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Message</b></button>';
}
}
echo '</td>
</tr></table>';
}

}
?>

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