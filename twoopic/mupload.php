<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>

<? include_once 'allcon.php';?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>Photo upload</title>
        <link rel="shortcut icon" href="favicon.png"/>
        <title>Twoopic</title>
<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/home.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>



    </head>
   <body class="metro">
</body>
<? include_once 'header.php';?>
<?php
$_SESSION['file']=
$ext="jpeg";
$jpg="jpg";
$png="png";
$gif="gif";
$x="x-png";
$gp="3gp";
$mp="mp4";
$exte=ltrim($_FILES["file"]["type"],"image,/,p");

$nam=$_FILES["file"]["name"].rand();
$_SESSION['file']=$nam;


if($exte==$ext||$exte==$jpg||$exte==$png||$exte==$x||$exte==$gif||($_FILES["file"]["type"]=="video/mp4")){ 
if(move_uploaded_file($_FILES["file"]["tmp_name"],"sharedmedia/".$nam)){

echo '
<img src="sharedmedia/'.$nam.'" style="height:300px;width:500px;border-radius:5px"><br>';

       

if(!empty($_GET[type])){
echo '
<h4 class="fg-black">You have selected this photo</h4>

<form action="uploadred.php?photo='.rand().'" method="post" data-ajax="false" >
<div style="display:none">
<input type="text" name="file" value="'.$nam.'">
<input type="text" name="with" value="'.$_POST[with].'">
</div>
<input type="submit" value="Share with '.$_POST[with].'" data-role="none" style="background:#3b5998;color:#fff" data-mini="true"  align="right" data-theme="c">
</form>
';
}else{
echo '<h4 class="fg-black">You have selected this photo.Post a topic about it(Optional)</h4>




<div id="st" style="display:show;background:#fff;width:500px;height:auto;border-radius:10px">
<form action="uploadred.php?mobile=x" method="post" data-ajax="false">

<span>Add those you would like to tag here separated by a space</span><br>

<input type="text" style="border-style:none;width:100%;background:#d3d3d3;height:30px;border:solid 1px" placeholder="Tagged people will appear here" name="tag" id="tag" max="10" data-role="none">

<span>Add a topic #myphoto #selfie</span><br>

<input type="text" data-role="none" style="border-style:none;width:100%;background:#d3d3d3;height:30px;border:solid 1px" placeholder="Topic here #YourStory (Optional)" name="status" id="status" max="10">
<br><span>Describe it more here</span><br>
<textarea type="text" data-role="none" style="border:solid 1px;width:100%;background:#d3d3d3" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="des" id="des">
</textarea>
<div style="display:none">
<input type="text" name="file" value="'.$nam.'"></div>
<input type="submit" value="Share" data-role="none" style="background:#3b5998;color:#fff" data-mini="true"  align="right" data-theme="c">
</form>

</div>


';
}
}else{
echo "file error";}

}else{
echo $exte;
echo "Error while uploading file.Please check your file type and file size"."<br>";
echo "The following types are accepted .jpeg .png .x-png .jpg .gif for photos."."<br>";
echo "Maximum file size is 5mb";
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