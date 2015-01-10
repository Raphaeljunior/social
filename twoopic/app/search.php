<? 
session_start();
include 'allcon.php';


?>




<?php
include 'functions.php';
$q=$_POST['p'];
$user=$_POST[user];

$ke=mysqli_query($con,"select * from users where Username='$user' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{

echo '<div style="display:none">
<input type="text" name="q" value="'.$q.'" id="q">
</div>';

$get="select * from users where Username like '%$q%' or FirstName like '%$q%' or SecondName like '%$q%'";
$ty=mysqli_query($con,$get);
$users=mysqli_num_rows($ty);

$geta="select * from status where topic like '%$q%' or description like '%$q%' or talk like '%$q%' and direct=''";
$tye=mysqli_query($con,$geta);
$newnu=mysqli_num_rows($tye);

$g="select distinct username from status where topic like '%$q%' or description like '%$q%' or talk like '%$q%'";
$tu=mysqli_query($con,$g);
$nenu=mysqli_num_rows($tu);



$total=$users + $newnu;
if(!empty($_GET[p])){

echo '
<div style="width:300px;border:solid 2px;border-radius:10px;border-color:#fff">
<span><b>Most Interactive</b></span>';
while($resa=mysqli_fetch_array($tu)){

$geti="select * from users where Username ='$resa[username]'";
$tyi=mysqli_query($con,$geti);
$usa=mysqli_fetch_array($tyi);
echo '<li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d3d3d3">
<table><tr><td><img src="http://twoopic.nanoxcorp.com/profilepics/'.$usa[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td><b>'.$usa[FirstName].' '.$usa[SecondName].'</b><br><a href="profile.html?user='.$usa[Username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">
'.$usa[Username].'</a></td></tr></table></li>';
}

echo '
</div>';



echo '
<div style="width:300px;border:solid 2px;border-radius:10px;border-color:#fff">
<b>What you are looking for</b>';
while($result=mysqli_fetch_array($ty)){
echo '<li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d3d3d3">
<table><tr><td><img src="http://twoopic.nanoxcorp.com/profilepics/'.$result[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td><b>'.$result[FirstName].' '.$result[SecondName].'</b><br><a href="profile.html?user='.$result[Username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">
'.$result[Username].'</a></td></tr></table></li>';
}
}
echo '
</div>';

}

?>



