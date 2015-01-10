<?php
session_start();
include 'allcon.php';
$user=$_SESSION['current'];
$item=$_POST['id'];
$mid=$_GET['mid'];
$from=$_GET['from'];
$t=time();
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
$se="insert into notifications (usernotified,Username,type,about,time)
values('$usa[username]','$user','favorite','$item','$t')";
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







}

}






}




?>