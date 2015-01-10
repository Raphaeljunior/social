<?php
session_start();
include 'allcon.php';
include 'functions.php';
$cur=$_POST['cur'];
$t=time();
$topicid=md5($_POST[des]).rand();

if(!empty($_GET[real])){
$t="select * from chat where Sender ='$cur' and Receiver='$_POST[you]' order by id desc limit 1";
$pr=mysqli_query($con,$t);
$ms=mysqli_fetch_array($pr);

if(mysqli_num_rows($pr)!==0){
if($ms[state]!==$cur&&$ms[state]!==''){

echo '<span style="color:green;font-family:"Bradley Hand ITC""><small>(Replying...)</small></span><span>'.$ms[Message].'</span>';

}

}






}


//get users locale
$ke=mysqli_query($con,"select * from users where Username='$cur' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{

if(!empty($_GET[id])){
$ter="select * from chat where Sender ='$cur'";
$pre=mysqli_query($con,$ter);
if(mysqli_num_rows($pre)==0){
echo '<h4>You have no ongoing chats right now '.$cur.'</h4>';
}else{

$t="select * from chat where Sender ='$cur' order by id desc";
$pr=mysqli_query($con,$t);










echo '<div style="background:none;background:white" >';


while($mes=mysqli_fetch_array($pr)){
$reci=$mes['Receiver'];
$use=mysqli_query($con,"select * from users where Username='$reci'");
$usa=mysqli_fetch_array($use);

echo '<a href="thread.html?cuser='.$cur.'&with='.$reci.'&key='.$_POST[key].'" rel="external">
<table style="width:100%;background:none;border-bottom:solid 1px;border-bottom-color:#d3d3d3;height:60px"><tr>
<td style="width:50px">
<img src="http://twoopic.nanoxcorp.com/profilepics/'.$usa[Photo].'" style="width:50px;height:50px;border-radius:500px">
</td>
<td>
<span style="color:black;font-size:18px">
<a rel="external" href="profile.html?user='.$reci.'&cuser='.$cur.'&key='.$_POST[key].'">'.$reci.'</a>
</span><br>
<div style="color:black;width:200px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">'.$mes[Message].'</div>';

if($mes['Status']=='Sending'){
echo '<span class="metro"><i class="fg-black icon-comments-4"></i> </span>';

}else{
if($mes['Status']=='Receiving')
{
echo '<span class="metro" style="font-family:"Century Gothic"" ><i class="fg-green icon-comments-4"></i> </span>';
}

}
showtime($mes[Time]);
echo '</td>
</tr></table></a>';
}

}
}
}
?>