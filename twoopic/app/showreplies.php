<?php 

include 'allcon.php';
include 'functions.php';
?>
<!DOCTYPE html>

<html>
    <head>


        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title></title>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <link rel="stylesheet" href="css/modify.css">
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
    </head>
   <body class="metro">

<?php

$cuj=$_POST['id'];
$user=$_POST[cuser];

$ke=mysqli_query($con,"select * from users where Username='$user' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{
 
$po="select * from replies where topicid='$cuj' order by id desc";
$pass=mysqli_query($con,$po);
$replies=mysqli_num_rows($pass);


echo '<div class="metro"><span style="font-size:17px;font-family:"Century Gothic"">Talks</span>
</i></div>';

while($ro=mysqli_fetch_array($pass))
{

$get=mysqli_query($con,"select * from favorites where messageid='$ro[messageid]'");
$favno=mysqli_num_rows($get);
$geta=mysqli_query($con,"select * from likes where messageid='$ro[messageid]'");
$likes=mysqli_num_rows($geta);
$getaa=mysqli_query($con,"select * from dislikes where messageid='$ro[messageid]'");
$dislikes=mysqli_num_rows($getaa);

$getaaw=mysqli_query($con,"select * from shared where Topic='$ro[messageid]'");
$shares=mysqli_num_rows($getaaw);

$poo="select * from status where topicid='$cuj'";
$pasos=mysqli_query($con,$poo);
$top=mysqli_fetch_array($pasos);









$cu=$ro['Username'];
$e="select * from users where Username='$cu'";
$r=mysqli_query($con,$e);
$ph=mysqli_fetch_array($r);
$photo=$ph['Photo'];



$dees=$ro['Message'];
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$user.'&key='.$_POST[key].'">@$1</a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.html?q=$1&cuser='.$user.'&key='.$_POST[key].'">#$1</a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);








echo '
<table style="background:none;width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td  style="background:#fff;width:45px" valign="top"><a href="profile.html?user='.$ro['Username'].'&cuser='.$user.'&key='.$_POST[key].'">
<img STYLE="border:solid 0.5px;border-radius:500px;border-color:#fff;width:45px;height:45px" src="http://twoopic.nanoxcorp.com/profilepics/'.$photo.'"></a></td>

<td style="border-radius:5px;height:auto" valign="top"><a rel="external" href="profile.html?user='.$ro['Username'].'&cuser='.$user.'&key='.$_POST[key].'" style="font-size:15px;font-family:"Century Gothic""><span style="color:black">'.$ph[FirstName].' '.$ph[SecondName].'</span><b> '.$ro['Username'].'</b></a>
<br><span style="font-size:12px;font-family:"Century Gothic""><b>'.$prop.'</b></span>
<br>';
showtime($ro[time]);

echo '</td></tr></table><br>
	

';

}} ?>

</body>
</html>







