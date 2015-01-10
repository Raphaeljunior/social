<?php
session_start();
include 'allcon.php';
$user=$_POST[user];
$item=$_POST['id'];
$mid=$_GET['mid'];
$from=$_GET['from'];

$ke=mysqli_query($con,"select * from users where Username='$user' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{

if(empty($from)){

$u="select * from status where topicid='$item'";
$k=mysqli_query($con,$u);
$fav=mysqli_fetch_array($k);

//check if user already favorited..
$chek=mysqli_query($con,"select * from favorites where Username='$user' and itemid='$item'");
if(mysqli_num_rows($chek)>0){
echo "You already favorited this";
}else{

$b="insert into favorites(Username,userfrom,itemid,item)
values('$user','$fav[username]','$item','$fav[topic]')"; 
mysqli_query($con,$b);


$xx=mysqli_query($con,"select * from status where topicid='$item' and Sharing='' and direct='' limit 1 ");
$usa=mysqli_fetch_array($xx);

$xxx=mysqli_query($con,"select * from notifications where username='$user' and type='favorite' and about='$item'");

if(mysqli_num_rows($xxx)==0){
$se="insert into notifications (usernotified,Username,type,about)
values('$usa[username]','$user','favorite','$item')";
mysqli_query($con,$se);}



}
}
else{
if(!empty($from)){
$u="select * from replies where messageid='$mid'";
$k=mysqli_query($con,$u);
$fa=mysqli_fetch_array($k);


//check if user already favorited..
$chek=mysqli_query($con,"select * from favorites where Username='$user' and messageid='$mid'");
if(mysqli_num_rows($chek)>0){
echo 'You already favorited this';
}else{



$b="insert into favorites(Username,userfrom,messageid,message)
values('$user','$fa[Username]','$mid','$fa[Message]')"; 
mysqli_query($con,$b);

header('location:'.$_SERVER[HTTP_REFERER]);






}

}




}

}




?>