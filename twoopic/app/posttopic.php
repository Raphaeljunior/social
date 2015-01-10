<?php
session_start();
include 'allcon.php';
$cur=$_POST['cur'];
$t=time();
$topicid=md5($_POST[status]).rand();



//get users locale
$ke=mysqli_query($con,"select * from users where Username='$cur' and App='$_POST[key]'");
if(mysqli_num_rows($ke)==0){
echo '<div class="metro"><i class="icon-flag"></i>Please stop the hack.Your device ID will be tracked and you may be barred from accessing Twoopic
</div>';
}else{


$cou=mysqli_query($con,"select * from users where Username='$cur'");
$det=mysqli_fetch_array($cou);
$country=$det['Country'];
$cat=$det['Category'];


$dpeople=$_POST[dpeople];


if(empty($_POST[status])){
$status="";
}else{
$new=ltrim($_POST[status],"#");
$kk=preg_replace('/\s+/','',$new);
$status='#'.$kk;
}




$post="insert into status(username,topic,topicid,TIME,brow,Country,Category,description,direct) 
VALUES('$cur','$status','$topicid','$t','$brow','$country','$cat','$_POST[des]','$dpeople')";
mysqli_query($con,$post);





echo "Your status has been updated";}

?>