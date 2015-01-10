<?php
session_start();
include 'allcon.php';
$cur=$_POST['cur'];
$t=time();
$topicid=md5($_POST[des]).rand();



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
$receiver=$_POST[dpeople];



if(empty($_POST[status])){
$status="";
}else{
$new=ltrim($_POST[status],"#");
$kk=preg_replace('/\s+/','',$new);
$status='#'.$kk;
}
$message=$_POST[des];

$r="select * from chat where Sender='$cur' and Receiver ='$dpeople' ";
$check=mysqli_query($con,$r);


if(mysqli_num_rows($check)==0){
$sel="insert into chat(Sender,Receiver,Message,messageid,Time,Status)
values('$cur','$receiver','$message','$id','$t','Sending')";
mysqli_query($con,$sel);

$se="insert into chat(Sender,Receiver,Message,messageid,Time,Status)
values('$receiver','$cur','$message','$id','$t','Receiving')";
mysqli_query($con,$se);

$post="insert into message(Sender,Receiver,Message,Time,Status,messageid) 
VALUES('$cur','$dpeople','$_POST[des]','$t','1','$topicid')";
mysqli_query($con,$post);
}

if(mysqli_num_rows($check)>0){
$see="update chat set Message='$message',Time='$t',messageid='$id',Status='Sending',state='' where (Sender='$cur' and Receiver='$receiver')";
mysqli_query($con,$see);

$sve="update chat set Message='$message',Time='$t',messageid='$id',Status='Receiving',state='' where (Receiver='$cur' and Sender='$receiver')";
mysqli_query($con,$sve);
$post="insert into message(Sender,Receiver,Message,Time,Status,messageid) 
VALUES('$cur','$dpeople','$_POST[des]','$t','1','$topicid')";
mysqli_query($con,$post);

}



echo "Your message has been sent";}

?>