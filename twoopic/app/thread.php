<script type="text/javascript">
$(function(){

$(".share").click(function(){
var key=$("input#key").val();
var current=$("input#u").val();
var status=$(this).attr("content");

var datastring='cur='+current+'&des='+status+'&key='+key;
$(this).css("color","green");

$.ajax({

type:"POST",
url:"http://twoopic.nanoxcorp.com/app/posttopic.php",
data:datastring,
success:function(data){

}

});

});



});
</script>
<?php

include 'allcon.php';
include 'functions.php';
$cur=$_POST['cur'];
$t=time();
$topicid=md5($_POST[des]).rand();
$you=$_POST[you];




//get users locale
$ke=mysqli_query($con,"select * from users where Username='$cur' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>You have been blocked from viewing this thread for security reasons.You may have logged in from another device.Try logging in again with this device 
</div>';
}else{

echo '<div style="display:none">
<input type="text" value="'.$cur.'" id="u">
<input type="text" value="'.$_POST[key].'" id="key">
</div>';


$t=$p="select * from message where Receiver='$you' and Sender='$cur' or Receiver='$cur' and Sender='$you' order by id asc";
$pr=mysqli_query($con,$t);

while($mes=mysqli_fetch_array($pr)){
$reci=$mes['Receiver'];
$sen=$mes[Sender];
$msg=$mes[Message];

$des=$mes['Message'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:green" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$cur.'&key='.$_POST[key].'&key='.$POST[key].'">@$1</a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:green" href="search.html?q=$1&cuser='.$cur.'&key='.$_POST[key].'">#$1</a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);







if($sen==$cur){
echo '
<div align="right"><div style="background:#fff;width:auto;max-width:50%;border-radius:5px;min-height:40px" align="left"><span>

'.$pro.'</span><br>';
showtime($mes[Time]);
echo '<a align="right" href="#" class="share" content="'.$msg.'" style="color:black"> <i class="icon-share"></i></a>
</div></div><br>';
}else{

$uss=mysqli_query($con,"select * from users where username='$sen'");
$that=mysqli_fetch_array($uss);
echo '<div align="left"><table style="background:none">
<tr>
<td valign="top" style="width:50px;min-height:50px">
<img src="http://twoopic.nanoxcorp.com/profilepics/'.$that[Photo].'" style="width:40px;height:40px;border-radius:500px">
</td>
<td valign="top" style="background:#5b3990;width:auto;max-width:50%;border-radius:5px;color:white">
<span>'.$pro.'</span><br>';
showtime($mes[Time]);
echo '<a href="#" class="share" content="'.$msg.'" style="color:#fff"> <i class="icon-share"></i></a>
</td>
</tr>

</table></div><br>';














}









}

}
?>