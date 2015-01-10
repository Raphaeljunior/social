<? 
session_start();
if(!isset($_SESSION[current])){
header("location:index.php");
}
include 'php/allcon.php';


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

<script type="text/javascript">
$(function(){
setTimeout(function(){
$("#in").load('inter.php');
},1000);


});
</script>





    </head>
<?php
$user=$_REQUEST['user'];
$user=$_SESSION['current'];
$sel="select * from users where Username='$user'";
$checkuser=mysqli_query($con,$sel);
$row=mysqli_fetch_array($checkuser);
$photo=$row['Photo'];
$fname=$row['FirstName'];
$sname=$row['SecondName'];

?>


<body id="body">

<?php include 'header.php' ?>

<?php
$current=$_SESSION[current];
$y="select * from mentions where userid='$row[ID]' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
mysqli_query($con,"update users set inter='$numm' where Username='$current'");


echo '<div style="display:none">
<input type="text" id="usera" value="'.$_SESSION[current].'">
</div>
<div data-role="content" data-theme="b" id="body">

<div style="background:none;width:100%;max-width:500px;height:auto">
<div id="in">
<span style="font-size:18px">Loading Interactions...</span></div>

</div>

</div>';
?>
<span style="font-size:14px;font-family:"Century Gothic"">Copyright 2014 Nanoxcorp</span>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
</body>
</html>
