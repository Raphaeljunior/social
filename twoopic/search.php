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

var qu=$("input#q").val();
setTimeout(function(){
if(qu!==''){
$("#resultss").load('feeds.php?phot=x',{"q":qu});
$("#wc").load('wc.php');
}
},500);


$("#all").click(function()
{
var qu=$("input#q").val();
$("#resultss").load('feeds.php',{"q":qu});
});

$("#pho").click(function()
{
var qu=$("input#q").val();
$("#resultss").load('feeds.php?phot=x',{"q":qu});
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


<body id="body" style="background:#fff">

<?php include 'header.php' ?>
<div data-role="content" data-theme="b" id="body">

<?php
if(!empty($_GET[q])){
$q=mysqli_real_escape_string($con,$_GET['q']);
}else{
$q=mysqli_real_escape_string($con,$_REQUEST['q']);
$q=mysqli_real_escape_string($con,$_POST['q']);
}


echo '<div style="display:none">
<input type="text" name="q" value="'.$q.'" id="q">
</div>';

if($_GET[q]!==''){

$get="select * from users where Username like '%$q%' or FirstName like '%$q%' or SecondName like '%$q%' order by rand() limit 3";
$ty=mysqli_query($con,$get);
$users=mysqli_num_rows($ty);

$geta="select * from status where topic like '%$q%' or description like '%$q%' or talk like '%$q%'";
$tye=mysqli_query($con,$geta);
$newnu=mysqli_num_rows($tye);

$g="select distinct username from status where topic like '%$q%' or description like '%$q%' or talk like '%$q%' order by rand() limit 5";
$tu=mysqli_query($con,$g);
$nenu=mysqli_num_rows($tu);



$total=$users + $newnu;
if(!empty($_GET[q])){
echo '
<span style="color:green;font-size:30px;font-family:"Century Gothic"">#'.$q.'</span>';
}else{
echo '
<span style="font-size:18px;font-family:"Century Gothic"">Search results for '.$q.' ('.$total.' results found)</span>';
}


echo '

<br><a href="http://www.fifa.com" rel="external"><span style="font-size:17px">Go to Fifa.com</span></a>
<table style="width:100%"><tr><td valign="top" class="pc" style="width:350px">';
if($_GET[q]=="worldcup"){?>
<div id="wc">
<SPAN style="font-size:15px"><b>...Loading World Cup News...</b></SPAN>
</div>
<?php
echo '

<img src="wc.jpg" style="height:280px;width:320px;border-radius:5px"><br><br>
<img src="wcd.jpg" style="height:280px;width:320px;border-radius:5px"><br>';
}else{
echo '
<div style="width:100%;height:45px;background:#fff"><center><img src="wc.jpg" style="height:40px;width:40px;border-radius:5px"><a href="search.php?q=worldcup" rel="external"><span style="font-size:17px">See Whats Trending In WorldCup Today</span></a><img src="wc.jpg" style="height:40px;width:40px;border-radius:5px"></center></div><br>
';
}



echo '</td>
<td valign="top">
<div style="width:100%;max-width:500px;border:solid 2px;border-radius:5px;border-color:#fff;background:#fff">';

if(empty($_GET[q])||!empty($_GET[type])){

echo '<span style="font-size:22px;font-family:"Century Gothic"">People('.$users.')</span>';
while($result=mysqli_fetch_array($ty)){
echo '<li style="list-style-type:none">
<table><tr><td class="avatar"><img src="profilepics/'.$result[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$result[FirstName].' '.$result[SecondName].'<br><a href="profile.php?user='.$result[Username].'" rel="external">
'.$result[Username].'</a></td></tr></table></li>';
}
}

if(!empty($_GET[q])&&empty($_GET[type])){
echo '<span style="font-size:22px;font-family:"Century Gothic"">People('.$nenu.')</span>';
while($res=mysqli_fetch_array($tu)){

$getw="select * from users where Username='$res[username]'";
$tyw=mysqli_query($con,$getw);
$uss=mysqli_fetch_array($tyw);

echo '<li style="list-style-type:none">
<table><tr><td class="avatar"><img src="profilepics/'.$uss[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td>'.$uss[FirstName].' '.$uss[SecondName].'<br><a href="profile.php?user='.$uss[Username].'" rel="external">
'.$uss[Username].'</a></td></tr></table></li>';

}
}


echo '
</div>
<br><div style="width:100%;max-width:500px;border:solid 2px;border-radius:5px;border-color:#fff">
<span style="font-size:22px;font-family:"Century Gothic"">News('.$newnu.')</span>


<div id="resultss">
<SPAN style="font-size:15px"><b>Loading results for '.$_GET[q].'...</b></SPAN>
</div>';

echo '
</div>';

}

?>

</td></tr></table>
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
