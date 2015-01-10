<?php 
session_start();
if(!isset($_SESSION['current'])){
header('location:i.php');
}
?>
<?php 
session_start();
include 'allcon.php';
include 'functions.php';
?>



        
<script type="text/javascript">
$(function(){

var x=$(window).width();

if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}else{
$("hr").hide();
}
});
</script>

    

<?php

$cuj=$_REQUEST['id'];



 
$po="select * from replies where topicid='$cuj' order by id desc";
$pass=mysqli_query($con,$po);
$replies=mysqli_num_rows($pass);


echo '<ul data-role="listview" data-theme="c">
<li style="list-style-type:none;background:#3b5998;color:white;height:30px">Talks('.$replies.')</li>
</ul>

<div style="background:#d4d4d4">';

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
$neew=preg_replace('/@([^(@|\s)]+)/','<a style="color:blue" data-prefetch rel="external" href="profile.php?user=@$1">@$1</a>',$dees);
$cleae=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:blue" href="search.php?q=$1">#$1</a>',$neew);
$prop=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$cleae);








echo '
<table style="background:#fff;width:100%">
<tr>
<td  style="background:#fff;width:45px" valign="top" class="avatar"><a href="profile.php?user='.$ro['Username'].'">
<img STYLE="border:solid 0.5px;border-radius:500px;border-color:#fff;width:45px;height:45px" src="profilepics/'.$photo.'"></a></td>

<td style="border-radius:5px;height:auto"><a rel="external" href="profile.php?user='.$ro['Username'].'" style="font-size:15px;font-family:"Century Gothic""><b>'.$ph[FirstName].' '.$ph[SecondName].'</b> '.$ro['Username'].'</a>
<br><span style="font-size:12px;font-family:"Century Gothic""><b>'.$prop.'</b></span>
<br>';
showtime($ro[time]);



echo '<div style="display:none"><iframe name="cc"></iframe></div></td>
</tr></table><br>

	

';

} 

echo '</div>';
?>








