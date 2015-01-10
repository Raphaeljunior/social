<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Photos by <?php echo $_GET[id]?></title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
<link rel="shortcut icon" href="favicon.png"/>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="js/thread.js"></script>

        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<?php
include 'allcon.php';
$user=mysqli_real_escape_string($con,$_GET['id']);
if (!empty($user)){


$pass=mysqli_query($con,"select * from status  where username='$user' and media!='' and direct='' and sharing=''order by id desc");
$num=mysqli_num_rows($pass);}
?>
<?php include_once 'allcon.php'?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Twoopic</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="css/metro-bootstrap.css">
<link rel="stylesheet" href="modal.css">
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="nav.css" />
		<link rel="stylesheet" href="css/slicknav.css" />
<script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>

<div data-role="page" data-theme="c" data-ajax="false" id="feed">
<?php 
include 'header.php';
?>


<div data-role="content" data-theme="c"><center>

<?php
include 'functions.php';
if ($num==0){
echo '<h3>'.$user.' has no photos</h3>';
}else{
while ($photo=mysqli_fetch_array($pass)){

echo '
<a data-ajax="false" href="topic.php?id='.$photo[topicid].'&cuser='.$cur.'&key='.$key.'"><img src="sharedmedia/'.$photo[media].'" style="height:200px;width:200px;border-radius:5px"></a>';
}}
?>
</center></div>
</div>

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
        		
	</body>
</html>

