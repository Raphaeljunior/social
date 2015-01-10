<?php 
session_start();
if(!empty($_GET[joined])){
$_SESSION['current']=$_REQUEST[user];
}
?>

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
$show="success";

}else{
$show="fileerror";}

}else{

$show="fileerror";

}}
?>

<!DOCTYPE html>

<html>
    <head >

        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="Description" content="Twoopic helps you stay up to date with the latest topics around and those trending worldwide.Sign up now to stay updated">
<meta name="Keywords" content="Topic,Twoopic,Trending,Natkeezy,Dennis,Natalia">
<meta name="Language" content="English">
<meta name="Robots" content="All">
<link rel="shortcut icon" href="favicon.png"/>
        <title>Twoopic</title>
<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="js/nanox/index.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>



<body id="body">



<?php include 'header.php' ?>



<?php 
include('allcon.php');


echo '<h4>Choose a new photo '.$_SESSION['current'].' for your profile picture</h4>';



echo '<ul  class="bg-cyan fg-white">
<div align="left"> 
<h4 class="fg-white">Select a photo</h4>
<form action="editprophoto.php"  method="post" enctype="multipart/form-data" data-ajax="false">

<input type="file" name="file" id="file">

<input id="upload" type="submit" name="submit" value="Upload" data-theme="c" data-mini="true" data-inline="true">
</form>

</div</ul>';
if($show==success){
echo '<ul  class="bg-cyan fg-white">
<div align="center">
<h4 class="fg-white">You have chosen this photo.</h4>
<img style="width:300px;height:300px;border:solid 0.5px;border-radius:500px" src="profilepics/'.$nam.'"><br>

<form method="post" action="editpic.php" data-ajax="false">
<div style="display:none">
<input type="text" name="name" id="name" value="'.$nam.'">

</div>
<input type="submit" name="submit" value="Set As Profile Picture" data-theme="c" data-mini="true" data-inline="true">
</form>

 </div</ul>';}else{
if($show==fileerror){
echo '<ul  class="bg-teal fg-white">
<br><div align="center">
<h3 class="fg-white">Error while uploading file.Please check your file type and file size</h3>
<h3 class="fg-white">The following types are accepted .jpeg .png .x-png .jpg .gif for photos</h3>
<h3 class="fg-white">Maximum file size is 5mb</h3></div></ul>';
}

}




?>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
</body>
</html>