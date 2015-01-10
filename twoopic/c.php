<?php
session_start();
include 'allcon.php';
$current=$_SESSION[current];

$sel="select * from users where Username='$current'";
$checkuser=mysqli_query($con,$sel);
$row=mysqli_fetch_array($checkuser);

//get inter
$y="select * from mentions where userid='$row[ID]' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

//get direct

$ya="select * from status where  direct like '%$current%' and username!='$current' ";
$yya=mysqli_query($con,$ya);
$numma=mysqli_num_rows($yya);
//get act
$yb="select * from notifications where  usernotified='$current' and Username!='$current' ";
$yyb=mysqli_query($con,$yb);
$nummb=mysqli_num_rows($yyb);

//get chat

$yc="select * from message where Receiver='$current' ";
$yyc=mysqli_query($con,$yc);
$nummc=mysqli_num_rows($yyc);


$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldi=$old[inter];
$olda=$old[activity];
$oldb=$old[message];
$oldc=$old[direct];

$a=$numm-$oldi;
$b=$nummb-$olda;
$c=$nummc-$oldb;
$d=$numma-$oldc;


$all=$a+$b+$c;
if($all!==0){
if($all==1){
echo '('.$all.') new notification';
}else{
echo '('.$all.') new notifications';
}
}






?>
