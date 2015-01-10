<?php 
session_start(); 

include_once 'allcon.php';
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title>Edit Profile</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
<link rel="shortcut icon" href="favicon.png"/>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="php/index.js"></script>



        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
	</head> 
<body>
<data-role="page">
<?php include 'header.php';?>
<data-role="content">


<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
$user=$_SESSION['current'];
$t=mysqli_query($con,"select * from users where Username='$user'");
$me=mysqli_fetch_array($t);

if(!empty($_POST[cpassword])&&!empty($_POST[npass])&&!empty($_POST[cnpass])){
if(md5($_POST[cpassword])<>$me[Password]){
echo '<span class="fg-black" style="color:red;font-size:18px;font-family:"Century Gothic"">Current Password does not match your input</span>';
}else{
if($_POST[npass]<>$_POST[cnpass]){
echo '<br><span class="fg-black" style="color:red;font-size:18px;font-family:"Century Gothic"">Password do not match</span>';
}else{
$newpassword=md5($_POST[npass]);
mysqli_query($con,"update users set Password='$newpassword' where Username='$user'");
echo '<br><br><br><span class="fg-black" style="color:green;font-size:18px;font-family:"Century Gothic"">Password successfully updated</span>';

}

}





}









}

?>

<?php 

$user=$_SESSION['current'];
$t=mysqli_query($con,"select * from users where Username='$user'");
$me=mysqli_fetch_array($t);

$username=$me['Username'];
$fname=$me['FirstName'];
$sname=$me['SecondName'];
$personality=$me['Personality'];
$email=$me['email'];
$web=$me['website'];
$bio=$me['Bio'];

echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="avatar">
<li style="list-style-type:none;height:auto">
<img  STYLE="border-radius:5px;height:100px;width:100px;border:solid;border-color:#d3d3d3" src="profilepics/'.$me['Photo'].'"></a></li>
</td>
<td valign="top" style="color:black;width:auto;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<span  style="font-size:17px;color:black;font-type:"Century Gothic"" ><b>'.$me[FirstName].' '.$me[SecondName].'</b><br style="color:purple"><b>'.$me[Username].'</b></span><br></td></tr></table>

<a href="editprofile.php" rel="external" data-role="button" data-mini="true" data-inline="true" style="background:#3b5998;border:none;border-radius:2px;color:#fff">Edit General Profile</a>
<a href="editprophoto.php" rel="external" data-role="button" data-mini="true" data-inline="true" style="background:#3b5998;border:none;border-radius:2px;color:#fff">Change Profile Picture</a>
<a href="editcoverphoto.php" rel="external" data-role="button" data-mini="true" data-inline="true" style="background:#3b5998;border:none;border-radius:2px;color:#fff">Change Cover Photo</a>

<center><div style="max-width:500px;border:solid thin;border-radius:5px;border-width:2px" data-role="content">
<span class="fg-black" style="font-size:20px;font-family:"Century Gothic"">Security </span><br><br>
<form action="sec.php" method="post" data-ajax="false">
<span>Current Password</span><br>
<input type="password" name="cpassword" value="" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-role="none"/><br><br>
<span>New Password</span> 
<input type="password" name="npass" value="" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-role="none"/><br><br>
<span>Confirm New Password</span>
<input type="password" name="cnpass" value="" style="border:solid 1px;border-color:#3b4998;border-radius:5px;height:40px;width:100%" data-role="none"/><br><br>


<input type="submit" value="Update Profile" style="border:none;background:#3b5998;border-radius:5px" data-mini="true" data-inline="true">


</form>

</div></center>






';

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