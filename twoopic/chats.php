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

if(!empty($_GET[id])){
$ter="select * from chat where Sender ='$cur'";
$pre=mysqli_query($con,$ter);
if(mysqli_num_rows($pre)==0){
echo '<h4>You have no ongoing chats right now '.$cur.'</h4>';
}else{

$y="select * from message where Receiver='$cur' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

$hi=mysqli_query($con,"select * from users where Username='$cur'");
$old=mysqli_fetch_array($hi);
$oldn=$old[message];

$new=$numm-$oldn;

$new=($numm-$oldn);

$limit=mysqli_num_rows($pre);


$t="select * from chat where Sender ='$cur' order by Time desc,messageid desc limit $limit";
$pr=mysqli_query($con,$t);










echo '<div style="background:none;background:white;width:100%" >';


while($mes=mysqli_fetch_array($pr)){
$reci=$mes['Receiver'];
$use=mysqli_query($con,"select * from users where Username='$reci'");
$usa=mysqli_fetch_array($use);

echo '<hr><a href="up.php?cuser='.$cur.'&with='.$reci.'&key='.$_POST[key].'" rel="external">';
if($mes['Status']=='Receiving'){
echo '
<div style="width:100%;background:#d4d4d4"><table style="background:none;border-bottom:solid 2px;border-bottom-color:#d3d3d3;height:60px">
';}else{
echo '

<div style="width:100%;background:none"><table style="width:100%;background:none;border-bottom:solid 2px;border-bottom-color:#d3d3d3;height:60px">';}
echo '<tr>
<td style="width:50px" class="avatar">
<img src="profilepics/'.$usa[Photo].'" style="width:50px;height:50px;border-radius:500px">
</td>
<td style="width:100%">
<span style="color:black;font-size:18px">
<a rel="external" href="profile.php?user='.$reci.'&cuser='.$cur.'&key='.$_POST[key].'">'.$reci.'</a>
</span><br>
<div style="color:black;width:100%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">';

if(!empty($mes[media])){
echo '<span style="color:green">Sent an image</span>';
}else{
echo '<span>'.$mes[Message].'</span><br>';}

echo '</div>';

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
</tr></table></div></a>';
}

}
}

?>
