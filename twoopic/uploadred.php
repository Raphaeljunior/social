<?php
session_start();
include 'allcon.php';
$cur=$_SESSION['current'];
$t=time();
$topicid=md5($_POST[status]).rand();



//get users locale

if(empty($_GET[photo])){

$cou=mysqli_query($con,"select * from users where Username='$cur'");
$det=mysqli_fetch_array($cou);
$country=$det['Country'];
$cat=$det['Category'];

$name=$_POST[file];
$dpeople=$_POST[dpeople];
$tags=$_POST[tag];

if(empty($_POST[status])){
$status="";
}else{
$new=ltrim($_POST[status],"#");
$status='#'.$new;
}


$post="insert into status(username,topic,topicid,TIME,brow,Country,Category,description,direct,media,tags) 
VALUES('$cur','$status','$topicid','$t','$brow','$country','$cat','$_POST[des]','$dpeople','$name','$tags')";
mysqli_query($con,$post);

if(!empty($_GET[mobile])){
header('location:mhome.php');
}else{
header('location:home.php');
}
}else{

$message=$_POST[file];
$dpeople=$_POST[with];
$receiver=$_POST[with];
$t=time();


$r="select * from chat where Sender='$cur' and Receiver ='$dpeople' ";
$check=mysqli_query($con,$r);


if(mysqli_num_rows($check)==0){
$sel="insert into chat(Sender,Receiver,media,messageid,Time,Status)
values('$cur','$receiver','$message','0','$t','Sending')";
mysqli_query($con,$sel);

$se="insert into chat(Sender,Receiver,media,messageid,Time,Status)
values('$receiver','$cur','$message','0','$t','Receiving')";
mysqli_query($con,$se);

$post="insert into message(Sender,Receiver,media,Time,Status,messageid) 
VALUES('$cur','$dpeople','$_POST[file]','$t','1','$topicid')";
mysqli_query($con,$post);
}

if(mysqli_num_rows($check)>0){
$see="update chat set media='$message',Time='$t',messageid='0',Status='Sending',state='' where (Sender='$cur' and Receiver='$receiver')";
mysqli_query($con,$see);

$sve="update chat set media='$message',Time='$t',messageid='0',Status='Receiving',state='' where (Receiver='$cur' and Sender='$receiver')";
mysqli_query($con,$sve);
$post="insert into message(Sender,Receiver,media,Time,Status,messageid) 
VALUES('$cur','$dpeople','$_POST[file]','$t','1','$topicid')";
mysqli_query($con,$post);

}

$m=$_POST[with];
$go="location:thread.php?with=$m";
header($go);


}
?>