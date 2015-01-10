<?php 

include 'allcon.php';

?>



<span style="font-size:18px;font-family:"Century Gothic">Top Trends Today</span><br>
<?php 
$time=time();
$user=$_POST[user];
$chk=mysqli_query($con,"select * from users where Username='$user'");
$chku=mysqli_fetch_array($chk);
$country=$chku[Country];

$ke=mysqli_query($con,"select * from users where Username='$user'");

$d=mysqli_query($con,"select distinct topic  from status where topic!='' and TIME > $time - (48*60*60)");


while ($trending=mysqli_fetch_array($d)){
$ter=mysqli_real_escape_string($con,$trending[topic]);
$da=mysqli_query($con,"select *  from trending where topicid='$ter'");
$on=mysqli_num_rows($da);


if($on==0){

$dd=mysqli_query($con,"select *  from status where (TIME > $time - (24*60*60)) and (topic like '%$ter%' or description like '%$ter%' or talk like '%$ter%')");
$num=mysqli_num_rows($dd);

$t=time();

mysqli_query($con,"insert into trending(topicid,talks,Country,Category,time)
values('$trending[topic]','$num','$f[Country]','$f[Category]','$t')");}


if($on>0){

$dd=mysqli_query($con,"select *  from status where (TIME > $time - (24*60*60)) and (topic like '%$ter%' or description like '%$ter%' or talk like '%$ter%') ");
$sd=mysqli_query($con,"select * from status where topic='$ter' order by id desc limit 1");

$numa=mysqli_num_rows($dd);
$t2=mysqli_fetch_array($sd);
mysqli_query($con,"update trending set talks='$numa',time='$t2[TIME]' where topicid='$ter'");}

}
if(!empty($_GET[mobile])){
$limit="10";
}else{
$limit="7";
}

$now=time();





$ad=mysqli_query($con,"select * from trending where time > $now - (24*60*60) order by talks desc limit 7");

while($trends=mysqli_fetch_array($ad)){



$se=mysqli_real_escape_string($con,ltrim($trends[topicid],'#'));
echo '<li style="list-style-type:none">

<div style="color:black;width:250px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="search.php?q='.$se.'&cuser='.$user.'&key='.$_POST[key].'" rel="external" style="color:purple;font-size:15px" class="metro"><b><i class="icon-fire" style="color:red"></i>'.$trends[topicid].'</b></a>
</div></li>';



}









?>







