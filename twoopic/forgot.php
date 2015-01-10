<?php
session_start();
include 'allcon.php';
if(!isset($_SESSION[forgot])){
header("location:index.php");
}

?>

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


        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">
$(function(){

$("#cl").click(function()
{
$("#loadw").hide();
});

$("#rec").click(function()
{
var user=$("input#u").val();
var email=$("input#email").val();
var datastring='user='+user+'&email='+email;
if(email==''){
$("#loadw").show();

$("#mm").html("Please enter your email");

}else{


$("#loadw").show();
$("#load").show();
$("#mm").html("Please wait...");
$.ajax({

type:"POST",
url:"f.php?cat=x",
data:datastring,
success:function(data){ 
$("#loadw").show();
$("#load").hide();
$("#mm").html(data);
},
error:function(){ 
$("#loadw").show();
$("#load").hide();
$("#mm").html("Check Internet Connection");
}
});
}
});




var x=$(window).width();
if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}


});



</script>
	</head> 
	<body> 
	
		<div data-role="page" data-theme="d">
<div id="not"></div>

<div class="modalDialog" id="loadw" style="display:none"><a id="cl" href="#" data-role="button" style="border:none;background:#3b5998;border-radius:5px;color:#fff" data-inline="true" data-mini="true"><b>Close</b></a>
<div>
<center>
<center><div id="mm" style="color:black"><b>Please wait...</b></div>
<a href="#"  data-role="button"data-mini="true" rel="external" data-inline="false" id="co" style="display:none;background:#3b5998;border:none;color:#fff;border-radius:0px">Continue</a>
</center>
</div>
</div>	



<div data-role="header" data-position="fixed"><h1>Recover Password</h1></div>



			<div data-role="content">
<div style="display:none">
<input id="u" value="<?php echo $_SESSION[current]?>">

</div>
<center><img src="favicon.png" style="width:200px;height:200px;border-radius:500px"><br>
<span style="font-size:18px"><b>Welcome to Twoopic's password recovery page</b></span><br><br></center>
<?php
$user=$_SESSION[forgot];
$em=mysqli_query($con,"select * from users where Username='$user'");
$det=mysqli_fetch_array($em);
echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="avatar">
<li style="list-style-type:none;height:auto">
<img  STYLE="border-radius:5px;height:100px;width:100px;border:solid;border-color:#d3d3d3" src="profilepics/'.$det['Photo'].'"></a></li>
</td>
<td valign="top" style="color:black;width:auto;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<span  style="font-size:17px;color:black;font-type:"Century Gothic"" ><b>'.$det[FirstName].' '.$det[SecondName].'</b><br style="color:purple"><b>'.$det[Username].'</b></span><br></td></tr></table>';

if($det[email]==''){
echo '<span style="font-size:15px"><b>Sorry '.$det[Username].' You never provided an email address during your registration process.This might be difficult for you to recover your account.We suggest you create another account and report to us about your previous account</b></span><br>
<a href="index.php" data-role="button" data-inline="true" data-mini="true" style="border:none;background:#3b5998;border-radius:5px;color:#fff" rel="external">Create Account</a>';

}else{


echo '<center><div style="background:#fff;color:black;max-width:500px;border-radius:5px" class="metro" >
<span>Please provide your email address that you had provided in your account.We will send you a unique password that you will use to log in to your account.You may change that later</span>
<div class="metro">
<div class="input-control text">
<input data-role="none" type="text" placeholder="Your email here" name="vid" id="email" style="border:solid 1px;border-color:#3b4998;border-radius:5px">
</div>
</div><br>
<a href="#" data-role="button" data-inline="true" data-mini="true" style="border:none;background:#3b5998;border-radius:5px;color:#fff" rel="external" id="rec">Recover My Password</a>
';
}
?>

</div>
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
