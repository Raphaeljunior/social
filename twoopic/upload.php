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
<center><img src="sharedmedia/'.$nam.'" style="height:300px;width:500px;border-radius:5px"><br>

        <h4 class="fg-black">You have selected this photo.Post a topic about it(Optional)</h4>




<div data-role="controlgroup" data-type="horizontal" style="width:500px" data-inline="false">
<a href="#" id="showstatus" data-role="button" data-mini="true" data-inline="true" align="right" data-theme="c" style="background:#3b5998;border:none;color:#fff;border-radius:0px">Share publicly</a>
<a href="#" id="showdirect" data-role="button" data-mini="true" data-inline="true" align="right" data-theme="c" style="background:#3b5998;border:none;color:#fff;border-radius:0px">Share as a direct post</a>
</div>

<div id="direct" style="display:none;background:#fff;width:500px;height:auto;border-radius:10px">

<form action="uploadred.php" method="post" data-ajax="false">
<a href="#" id="sbutton" data-role="button" data-mini="true" data-inline="false" align="right" data-theme="c" style="background:#3b5998;border:none;color:white;border-radius:4px">Search for people</a>
<div data-role="controlgroup" style="display:none;border-radius:10px" id="blow" class="metro">
<ul data-role="listview" data-inset="true" data-theme="c">
			
			<li>
<div class="input-control text">
<input type="text" data-role="none" placeholder="Search" id="sinput" placeholder="Search here" style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none">
</div>
<div id="resulta"></div>
<div class="input-control text">
<input type="text" data-role="none" placeholder="Added recipients will appear here" name="dpeople" id="dpeople" max="10">
</div>
</li></ul>
</div>

<input type="text" placeholder="Topic here #YourStory (Optional)" name="status" id="status" max="10">
<textarea type="text" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="des" id="des" style="height:60px">
</textarea>
<div style="display:none">
<input type="text" name="file" value="'.$nam.'"></div>
<input type="submit" style="background:#3b5998;border:none;color:#fff;border-radius:4px" value="Share Photo" data-role="button" data-mini="true" align="left" data-theme="c">
</form>

</div>




<div id="st" style="display:none;background:#fff;width:500px;height:auto;border-radius:10px">
<form action="uploadred.php" method="post" data-ajax="false">
<a href="#" id="stag" data-role="button" data-mini="true"  align="right" data-theme="c" style="background:#3b5998;border:none;color:#fff;border-radius:0px">Tag people</a>

<div data-role="controlgroup" style="display:none;border-radius:10px" id="tblow" class="metro">
<ul data-role="listview" data-inset="true" data-theme="c">
<li>
<div class="input-control text">
<input type="text" placeholder="Search" id="tsinput" name="tsinput" data-role="none" style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none">
</div>
<div id="tresult"></div>
<div class="input-control text">
<input type="text" placeholder="Tagged people will appear here" name="tag" id="tag" max="10" data-role="none">
</div>
</li></ul>
</div>
<input type="text" placeholder="Topic here #YourStory (Optional)" name="status" id="status" max="10">
<textarea type="text" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="des" id="des" style="height:60px">
</textarea>
<div style="display:none">
<input type="text" name="file" value="'.$nam.'"></div>
<input type="submit" value="Share" data-role="button" data-mini="true"  align="right" data-theme="c">
</form>

</div>



    </center>


';

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