<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Twoopic Chat</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
<link rel="shortcut icon" href="favicon.png"/>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="js/message.js"></script>

        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">
$(function(){


var x=$(window).width();
if(x<550){
$("#blow").show();
$("#sbutton").hide();
$("#za").hide();
}
});

</script>
	</head> 
	<body> 
	
		<div data-role="page" data-theme="d"  id="chats">

<div class="modalDialog" id="loadw" style="display:none">
<div>
<center>
<span id="load" class="metro" style="font-size:12px;color:blue;display:none;width:100%"><i class="icon-record"></i></span></center>
<div style="display:none"><input type="text" id="counts" value="1"></div>	
<center><span id="mm" style="color:black"><b>Logging in...Please wait</b></span>
</div>
</div>	



	<?php include 'header.php'?>		

		<div data-role="navbar" id="x">
<ul>
					<li><a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="pub" style="height:40px;border:none">Chats</a></li>
					<li><a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="dp" style="height:40px;border:none">Compose</a></li>
					
					</ul>
					</div>
<?php
include 'allcon.php';
$current=$_SESSION[current];
$y="select * from message where  Receiver ='$current'";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

mysqli_query($con,"update users set message='$numm' where Username='$current'");

?>

			<div data-role="content" >	
		
<div id="st" style="display:show;background:none;height:auto;border-radius:10px" class="metro">
<div id="messages">

</div>

</div>

<div id="direct" style="display:none;background:none;width:auto;height:auto;border-radius:10px" class="metro">

<a href="#" id="sbutton" data-role="button" data-mini="true" data-inline="false" align="right" data-theme="c" class="metro" style="background:#3b5998;border:none;color:#fff;border-radius:4px"><i class="icon-search"></i> Search for a person</a>
<div id="blow" style="display:none" >
<div class="input-control text" id="za">
<input style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none" data-role="none" type="text" placeholder="Search people here" id="sinput">
<button data-role="none" class="btn-search"></button>
</div>
<div id="result" ></div>
<span>Recipient here</span><br>
<div class="input-control text">
<input type="text" data-role="none" placeholder="Your recipient will appear here" name="dpeople" id="dpeople" max="10">
</div>
</div>
<span>Message here</span><br>
<div class="input-control textarea">
<textarea data-role="none" type="text" style="background:#d4d4d4" placeholder="Add your message here.Tag people with the @myfriend and include other topics with the #OtherStory" name="ddes" id="ddes" style="height:60px">
</textarea>
</div>
<a href="#" id="dpost" data-role="button"  data-inline="false" align="right" data-theme="c" style="background:#3b5998;border:none;color:#fff;border-radius:4px">Send</a>
<span id="derr" style="color:green;font-size:15px;font-family:'Century Gothic'"><b></b></span>


</div>









<div style="display:none">
<input type="text" id="u" value="<?php echo $_SESSION[current]?>">
</div>

	
</div>	
			

		

		</div>
<div data-role="page" data-theme="b" id="thread" data-add-back-btn="true">
<div data-role="header" data-position="fixed" style="background:#3b5998;border-bottom-color:#fff" data-theme="b">
<h1 id="x"></h1>
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
