<?php
include 'allcon.php';


if($_GET[type]=='pic'){
$nam=$_FILES["file"]["name"].rand();

if(move_uploaded_file($_FILES["file"]["tmp_name"],"profilepics/".$nam)){

mysqli_query($con,"update users set Photo='$nam' where Username='$_GET[user]'");
}
}


if($_GET[type]=='cover'){
$nam=$_FILES["file"]["name"].rand();

if(move_uploaded_file($_FILES["file"]["tmp_name"],"profilepics/".$nam)){

mysqli_query($con,"update users set coverphoto='$nam' where Username='$_GET[user]'");
}
}




if($_GET[type]=='share'){
$cur=$_GET[user];
$cou=mysqli_query($con,"select * from users where Username='$cur'");
$det=mysqli_fetch_array($cou);
$country=$det['Country'];
$cat=$det['Category'];
$topicid=md5($_GET[caption]).rand();
$t=time();

$nam=$_FILES["file"]["name"].rand();

if(move_uploaded_file($_FILES["file"]["tmp_name"],"sharedmedia/".$nam)){


$post="insert into status(username,topicid,TIME,Country,Category,description,media) 
VALUES('$cur','$topicid','$t','$country','$cat','$_GET[caption]','$nam')";
mysqli_query($con,$post);


}


}
?>


