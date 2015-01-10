<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<?php session_start(); 
include 'allcon.php';
?>
<?php 

$t=time();
if(!empty($_GET[user])){
$type=$_GET['id'];
$userfollowed=$_GET['user'];
}else{

$type=$_POST['id'];
$userfollowed=$_POST['user'];}
$userfollowing=$_SESSION['current'];

$chk="select * from follow where Userfollowing='$userfollowing' and Userfollowed='$userfollowed'";
$chkk=mysqli_query($con,$chk);






if($type==Follow){
//check if already following;



if(mysqli_num_rows($chkk)==0){
$fol="insert into follow(Userfollowing,Userfollowed)
values('$userfollowing','$userfollowed')";
mysqli_query($con,$fol);

$folx="insert into notifications(Usernotified,type,Username,time)
values('$userfollowed','follow','$userfollowing','$t')";
mysqli_query($con,$folx);

echo "Following";

$status="I just followed $userfollowed Follow this person to also receive what they post";
$topicid=md5($status).rand(0,100);

$post="insert into status(username,topicid,TIME,description,profile) 
VALUES('$userfollowing','$topicid','$t','$status','$userfollowed')";
mysqli_query($con,$post);





}
}

if($type==Following){

$unfol="delete from follow where Userfollowing='$userfollowing' and Userfollowed='$userfollowed'";
$p=mysqli_query($con,$unfol);
echo "Follow";


}

?> 