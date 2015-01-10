<?php
session_start();
include 'allcon.php';
$user=$_SESSION['current'];
$id=$_POST['id'];

$cuc=mysqli_query($con,"select * from status where topicid='$id'");
$check=mysqli_fetch_array($cuc);

if(mysqli_num_rows($cuc)==0){
echo "That post does not exist";
}else{
if($check[username]==$user){
mysqli_query($con,"delete from status where topicid='$id'");
mysqli_query($con,"delete from replies where topicid='$id'");

}else{
echo "You cannot delete that post.It does not belong to you.You can only delete your own post";
}}
?>