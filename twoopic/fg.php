<?php session_start();
include 'allcon.php';?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title>Recover Password</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
<link rel="shortcut icon" href="favicon.png"/>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="js/promote.js"></script>

        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>



	</head> 
	<body> 
	
		<div data-role="page" data-theme="d">
<div data-role="header" data-position="fixed"><h1>Recover Password</h1></div>



			<div data-role="content">
<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
$code=mysqli_real_escape_string($con,$_POST[code]);
$user=$_POST[user];
$email=$_POST[email];
$password=mysqli_real_escape_string($con,$_POST[password]);
$newp=md5($password);

if($code!==$password){
echo '<span><b>That code does not match the one sent to your email.Check again</b></span><br>
<a  href="forgot.php" data-role="button" rel="external" style="border:none;background:#3b5998;border-radius:5px;color:#fff" data-inline="true" data-mini="true"><b>Try again</b></a>';
}else{
session_unset();
mysqli_query($con,"update users set Password='$newp' where Username='$user'");

echo '<span><b>Password Successful Recovered</b></span><br>
<a  href="index.php" rel="external" data-role="button" style="border:none;background:#3b5998;border-radius:5px;color:#fff" data-inline="true" data-mini="true"><b>Log In To My Account</b></a>';
} }


?>

</div>	
			

	

		</div>



		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
        		
	</body>
</html>
