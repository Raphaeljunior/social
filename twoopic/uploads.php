<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$ext="jpeg";
$jpg="jpg";
$png="png";
$gif="gif";
$x="x-png";
$gp="3gp";
$mp="mp4";
$exte=ltrim($_FILES["file"]["type"],"image,/,p");
$nam=$_FILES["file"]["name"].rand();
$_SESSION['pic']=$nam;
if($exte==$ext||$exte==$jpg||$exte==$png||$exte==$x||$exte==$gif){ 
if(move_uploaded_file($_FILES["file"]["tmp_name"],"profilepics/".$nam)){
echo $nam;
}else{
$show="fileerr";
echo $show;}
}else{

$show="fileerror";
echo $show;
}}
?>
