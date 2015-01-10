<?Php 
include('allcon.php');
session_start();
$new=$_POST["id"];
$type=$_GET["type"];
$user=$_SESSION['current'];
$page=$_GET['page'];

if($type==Follow){



$ch=mysqli_query($con,"select * from topicfollowing where topicid='$_POST[id]' and username='$_SESSION[current]'");

if(mysqli_num_rows($ch)==0){

$fol="insert into topicfollowing(topicid,username)
values('$new','$user')";
mysqli_query($con,$fol);

echo "You are now following this topic";
}else{

echo "You are already following this topic";
}
}else{
$unfol="delete from topicfollowing where topicid='$new' and username='$user'";
$p=mysqli_query($con,$unfol);

echo "You have unfollowed this topic";
}





?>