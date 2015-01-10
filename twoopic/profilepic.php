<?php 
session_start();
if(!isset($_SESSION['joined'])){
header('location:index.php');
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




<?php 
include('allcon.php');
include('i.php');
echo '<h2>Choose your profile pic @'.$_SESSION['joined'].'</h2>';

echo '<ul class="bg-black fg-white">
<br><div align="left">Step 1:Fill Profile info</div><h3 class="fg-white"><center>Step 2:Choose your profile picture</center></h3> </div>                 </ul>';

echo '<ul  class="bg-cyan fg-white">
<br><div align="left"> 
<h3 class="fg-white">Select a photo</h3>
<form action="profilepic.php" method="post" enctype="multipart/form-data">
<div class="input-control text size4">
<input type="file" name="file" id="file">


</div>

<input type="submit" name="submit" value="Upload" class="button default primary">

</form>

</div</ul>';
if($show==success){
echo '<ul  class="bg-cyan fg-white">
<br><div align="center">
<h3 class="fg-white">You have chosen this photo.</h3>
<img class="span2 rounded" src="profilepics/'.$nam.'"><br>

<form method="post" action="setpic.php">
<input type="submit" name="submit" value="Set As Profile Picture" class="button default primary">
<a class="button default primary" href="login.php?id=joining&type=findpeople"
>Skip</a>
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