<?php
session_start();
include 'allcon.php';
$item=$_POST['id'];
$user=$_POST[user];
$from=$_GET['from'];
$mid=$_GET['mid'];

$ke=mysqli_query($con,"select * from users where Username='$user' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{



if(empty($from)){
$check=mysqli_query($con,"select * from dislikes where Userliking='$user' and itemid='$item'");
if(mysqli_num_rows($check)>0){
echo 'You have already disliked this topic.You cant dislike it twice'; 
}else{

$check=mysqli_query($con,"select * from likes where Userliking='$user' and itemid='$item'");
if(mysqli_num_rows($check)>0){
mysqli_query($con,"delete from likes where Userliking='$user' and itemid='$item'");
mysqli_query($con,"delete from notifications where username='$user' and type='like'  and about='$item'");

$like="insert into dislikes(Userliking,itemid)
values('$user','$item')";

mysqli_query($con,$like);



$xx=mysqli_query($con,"select * from status where topicid='$item' and Sharing='' and direct='' limit 1 ");
$usa=mysqli_fetch_array($xx);

$xxx=mysqli_query($con,"select * from notifications where username='$user' and type='like'  and about='$item'");

if(mysqli_num_rows($xxx)==0){
$se="insert into notifications (usernotified,Username,type,about)
values('$usa[username]','$user','dislike','$item')";
mysqli_query($con,$se);}

}else{

$like="insert into dislikes(Userliking,itemid)
values('$user','$item')";

mysqli_query($con,$like);


$xx=mysqli_query($con,"select * from status where topicid='$item' and Sharing='' and direct='' limit 1 ");
$usa=mysqli_fetch_array($xx);

$xxx=mysqli_query($con,"select * from notifications where username='$user' and type='like' and about='$item'");

if(mysqli_num_rows($xxx)==0){
$se="insert into notifications (usernotified,Username,type,about)
values('$usa[username]','$user','dislike','$item')";
mysqli_query($con,$se);}




}
}
}



if(!empty($from)){

$check=mysqli_query($con,"select * from dislikes where Userliking='$user' and messageid='$mid'");
if(mysqli_num_rows($check)>0){
echo 'You have already disliked this.You cant dislike it twice'; 
}else{

$check=mysqli_query($con,"select * from likes where Userliking='$user' and messageid='$mid'");
if(mysqli_num_rows($check)>0){
mysqli_query($con,"delete from likes where Userliking='$user' and messageid='$mid'");

$like="insert into dislikes(Userliking,messageid)
values('$user','$mid')";

mysqli_query($con,$like);
header('location:'.$_SERVER[HTTP_REFERER]);
}else{

$like="insert into dislikes(Userliking,messageid)
values('$user','$mid')";

mysqli_query($con,$like);
header('location:'.$_SERVER[HTTP_REFERER]);
}
}

}

}
?>