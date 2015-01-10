<?php 
session_start();

?>
<?php
include 'allcon.php';
session_start();

if(empty($_GET[user])){
$user=$_SESSION['current'];
}else{
$user=$_GET[user];
}

$pi=$_POST['name'];
$sel="select * from users where Username='@$user'";
$checkuser=mysqli_query($con,$sel);
$details=mysqli_fetch_array($checkuser);
$insert="update users set coverphoto='$pi' where Username='$user'";
$pas=mysqli_query($con,$insert);
$_SESSION['cphoto']=$pi;
if(empty($_GET[user])){
$go="location:profile.php?user=$_SESSION[current]";
header($go);

}else{
echo '<span style="font-size:15px"><b>Your picture has been set</b></span>';
}
?>
