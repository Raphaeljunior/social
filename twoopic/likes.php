<?php
session_start();
include 'allcon.php';
$item=$_POST['id'];
$user=$_SESSION['current'];
$from=$_GET['from'];
$mid=$_GET['mid'];
$t=time();
if(empty($from)){
//check if user already liked
$check=mysqli_query($con,"select * from likes where Userliking='$user' and itemid='$item'");
if(mysqli_num_rows($check)>0){
echo 'You have already liked this topic.You cant like it twice'; 
}else{

//check if user had disliked it
$check=mysqli_query($con,"select * from dislikes where Userliking='$user' and itemid='$item'");
if(mysqli_num_rows($check)>0){
mysqli_query($con,"delete from dislikes where Userliking='$user' and itemid='$item'");
mysqli_query($con,"delete from notifications where username='$user' and type='like'  and about='$item'");
$like="insert into likes(Userliking,itemid)
values('$user','$item')";

mysqli_query($con,$like);

$xx=mysqli_query($con,"select * from status where topicid='$item' and Sharing='' and direct='' limit 1 ");
$usa=mysqli_fetch_array($xx);

$xxx=mysqli_query($con,"select * from notifications where username='$user' and type='like' and about='$item'");

if(mysqli_num_rows($xxx)==0){
$se="insert into notifications (usernotified,Username,type,about,time)
values('$usa[username]','$user','like','$item','$t')";
mysqli_query($con,$se);}


}else{

$like="insert into likes(Userliking,itemid)
values('$user','$item')";

mysqli_query($con,$like);


$xx=mysqli_query($con,"select * from status where topicid='$item' and Sharing='' and direct='' limit 1 ");
$usa=mysqli_fetch_array($xx);
$xxx=mysqli_query($con,"select * from notifications where username='$user' and type='like' and about='$item'");

if(mysqli_num_rows($xxx)==0){
$se="insert into notifications (usernotified,Username,type,about,time)
values('$usa[username]','$user','like','$item','$t')";
mysqli_query($con,$se);}



}
}
}


if(!empty($from)){
//check if user already liked
$check=mysqli_query($con,"select * from likes where Userliking='$user' and messageid='$mid'");
if(mysqli_num_rows($check)>0){
echo 'You have already liked this.You cant like it twice'; 
}else{

//check if user had disliked it
$check=mysqli_query($con,"select * from dislikes where Userliking='$user' and messageid='$mid'");
if(mysqli_num_rows($check)>0){
mysqli_query($con,"delete from dislikes where Userliking='$user' and messageid='$mid'");

$like="insert into likes(Userliking,messageid)
values('$user','$mid')";

mysqli_query($con,$like);

}else{

$like="insert into likes(Userliking,messageid)
values('$user','$mid')";

mysqli_query($con,$like);

}
}
}








?>