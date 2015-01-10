<?
session_start();
 include 'allcon.php';?>


<?php
$user=ltrim($_POST['uname'],"@");
$password=md5($_POST['password']);
$t=time();

$sel="select * from users where Username='@$user' and Password='$password'";
$checkuser=mysqli_query($con,$sel);
if(mysqli_num_rows($checkuser)==1){

$row=mysqli_fetch_array($checkuser);
$usera=$row['Username'];
$photo=$row['Photo'];

$key=md5($t).rand(000000,999999).md5($usera).$t;

mysqli_query($con,"update users set App='$key' where Username='$usera'");


echo '
<div id="cx" style="display:show">
<table style="width:100%;height:40px" class="metro">
<tr>
<td>
<center>';

if(empty($_GET['new'])){
echo '<div>
<span style="font-size:15px">Please update your app '.$usera.'<br>
The new app allows you to set a profile picture directly from your phone<br>
The new app allows you to share your colorful moments with photos onthe go #Selfie <br>
The new app has a whole new redesigned UI giving you smooth experience<br>
You dont have to login each time you access the app.Just verify that its you '.$usera.'<br>Click below to update your app</span><br>
<a align="center" href="http://twoopic.nanoxcorp.com/app/Twoopic.apk" rel="external" style="color:#3b5998;font-size:20px">
Update my app</a></center>
</div>';
}else{

if($row[Category]==''){
echo '<a align="center" href="categ.html?key='.$key.'&user='.$usera.'" id="hm" rel="external" style="color:#3b5998;font-size:20px">
<span class="icon-home on-left on-right" style="border-radius:500px;background:white;padding:15px"></span></a></center>
';}else{
echo '<a align="center" href="home.html?key='.$key.'&user='.$usera.'" id="hm" rel="external" style="color:#3b5998;font-size:20px">
<span class="icon-home on-left on-right" style="border-radius:500px;background:white;padding:15px"></span></a></center>';


}

}
echo '</td>

</tr>
</table>	
</div>';



}
else{
echo "Please check your login details again";
}


?>