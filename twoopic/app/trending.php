
<?php 

include 'allcon.php';
?>



<span style="font-size:20px;font-family:"Century Gothic"><b>Trends Today</b></span><br>
<?php 

$user=$_POST[user];
$chk=mysqli_query($con,"select * from users where Username='$user'");
$chku=mysqli_fetch_array($chk);
$country=$chku[Country];

$ke=mysqli_query($con,"select * from users where Username='$user' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{
$d=mysqli_query($con,"select distinct topic  from status where topic!=''");


while ($trending=mysqli_fetch_array($d)){

$da=mysqli_query($con,"select distinct topicid  from trending where topicid='$trending[topic]'");
$on=mysqli_num_rows($da);

if($on==0){

$dd=mysqli_query($con,"select *  from status where topic like '%$trending[topic]%' or description like '%$trending[topic]%' or talk like '%$trending[topic]%'");
$num=mysqli_num_rows($dd);

$a=mysqli_query($con,"select * from status where topic='$trending[topic]' order by id desc limit 1");
$f=mysqli_fetch_array($a);


mysqli_query($con,"insert into trending(topicid,talks,Country,Category)
values('$trending[topic]','$num','$f[Country]','$f[Category]')");}


if($on>0){

$dd=mysqli_query($con,"select *  from status where topic like '%$trending[topic]%' or description like '%$trending[topic]%' or talk like '%$trending[topic]%' and direct!=''");

$numa=mysqli_num_rows($dd);

mysqli_query($con,"update trending set talks='$numa' where topicid='$trending[topic]'");}

}



$ad=mysqli_query($con,"select * from trending order by talks desc");

while($trends=mysqli_fetch_array($ad)){
$se=ltrim($trends[topicid],'#');
echo '<li style="list-style-type:none">
<table><tr>
<td class="metro">
<i class="icon-fire" style="color:red"></i></td>
<td>
<div style="color:black;width:100%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="search.html?q='.$se.'&cuser='.$user.'&key='.$_POST[key].'" rel="external" style="color:purple;font-size:18px">'.$trends[topicid].'</a>
</div></td></tr></table></li>';
}

}






?>







