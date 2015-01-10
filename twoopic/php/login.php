<?
session_start();
include 'allcon.php';


$user=mysqli_real_escape_string($con,ltrim($_POST['uname'],"@"));
$password=md5($_POST['password']);
$t=time();

$sel="select * from users where Username='@$user' and Password='$password'";
$checkuser=mysqli_query($con,$sel);
if(mysqli_num_rows($checkuser)==1){

$row=mysqli_fetch_array($checkuser);
$usera=$row['Username'];
$photo=$row['Photo'];


$_SESSION[current]=$usera;
$expire=time()+60*24*30;
setcookie("userp",$usera,$expire);

$id=md5($usera).rand();
$_SESSION[id]=$id;
$t=time();
mysqli_query($con,"insert into logged(uid,username,ip)
values('$id','$usera','$t')");



if(!empty($_GET[mobile])){
header("location:mhome.php");
}else{
echo "ok";
}




}else{

echo "Please check your login details again";
}


?>