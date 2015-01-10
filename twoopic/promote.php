<?php
session_start();
if(!isset($_SESSION[current])){
header("location:index.php");
}

?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title>Promote Yourself</title> 
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
<script type="text/javascript">
$(function(){





$("#counts").val("1");

setInterval(function(){

var val=$("#counts").val();

if(val=='0'){

$("#counts").val("1");
$("#load").html("<i class='icon-record'></i>");
}


if(val=='1'){

$("#counts").val("2");
$("#load").html("<i class='icon-record'></i><i class='icon-record'></i>");

}

if(val=='2'){

$("#counts").val("3");
$("#load").html("<i class='icon-record'></i><i class='icon-record'></i><i class='icon-record'></i>");

}

if(val=='3'){

$("#counts").val("4");
$("#load").html("<i class='icon-record'></i><i class='icon-record'></i><i class='icon-record'></i><i class='icon-record'></i>");

}



if(val=='4'){

$("#counts").val("0");

}

},700);



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

<div class="modalDialog" id="loadw" style="display:none">
<div>
<center>
<center><div id="mm" style="color:black"><b>Please wait...</b></div>
<a href="#"  data-role="button"data-mini="true" rel="external" data-inline="false" id="co" style="display:none;background:#3b5998;border:none;color:#fff;border-radius:0px">Continue</a>
</center>
</div>
</div>	



<?php include 'header.php'?>

			<div data-role="content">
<center><img src="favicon.png" style="width:200px;height:200px;border-radius:500px"><br>
<span style="font-size:18px"><b>Welcome to Twoopic's promotion page</b></span><br></center>
<span style="font-size:14px"><b>Here you will be able to reach many targeted people and get more followers and opportunities with just a single click.You can choose whom you want your account to be displayed to and where you would like it to be displayed.
Your promoted account will be displayed together with the news feed of those you specify to reach.When people follow your promoted account,their followers will be notified and you will reach more and more people.We advise you to read our promotion terms and rates first before using our promotion services
</b></span><div class="pc">
<a href="#" data-role="button" style="border:none;background:#fff;color:black;border-radius:4px" id="term">Read Terms and Rates</a>
<a href="#" data-role="button" style="border:none;background:#3b5998;color:white;border-radius:4px" id="pro">Promote my account</a>
</div>
<div id="rt" style="display:none" class="mobile"><b>
<span style="color:#3b5998;font-size:18px"><b>Advertisement terms</b></span><br>
1.Your ad will only be displayed once we have approved your payment<br>
2.Any unpaid for ad,will just remain in our system until it is paid for then be displayed to appropriate audience<br>
3.Your ad will be removed as soon as the period set for display expires.We will offer an extra day any ad being displayed for more than a week<br>
4.Please report to us when you feel like your ad is not being displayed to the appropriate audience<br>
5.All payments are done via MPESA to +254712766208 <br>
6.We charge KShs 100 per week for the ads
</b></div><br>
<div style="display:none" id="form" STYLE="width:300px" class="mobile">
<span style="color:#3b5998;font-size:18px"><b>Set your ad</b></span><br>
<span style="font-size:14px"><b>Which category of people would you like to reach more?</b></span><br>
<select style="border-top:none;border-color:black;border:solid 1px;height:40px;width:100%" data-role="none" data-mini="true" data-native-menu="false" data-icon="false" data-theme="c" name="country" id="cat">
<option>Choose Category</option>
<option value="all">Everyone</option>
<option value="News">News</option>
<option value="Entertainment">Entertainment</option>
<option value="Business">Business</option>
<option value="Technology">Technology</option>
<option value="Celebrity">Celebrity</option>
<option value="Sports">Sports</option>
<option value="Music">Music</option>
<option value="Religion">Religion</option>
<option value="Careers and Jobs">Careers and Jobs</option>
<option value="Lifestyle">Lifestyle</option>
<option value="Health">Health</option>
<option value="Tv Show">TV Show</option>
<option value="Comedy">Comedy</option>
<option value="Youth">Youth</option>
</select><br>

<span style="font-size:14px"><b>For how long would you like your account to be promoted?</b></span><br>
<select style="border-top:none;border-color:black;border:solid 1px;height:40px;width:100%" data-role="none" data-mini="true" data-native-menu="false" data-icon="false" data-theme="c" name="country" id="time">
<option>Choose Period</option>
<option value="0">Less than a week</option>
<option value="1">1 week</option>
<option value="2">2 weeks</option>
<option value="3">3 weeks</option>
<option value="4">4 weeks</option>
</select><br>

<span style="font-size:14px"><b>Target a location</b></span><br>
<select style="border-top:none;border-color:black;border:solid 1px;height:40px;width:100%" data-role="none" data-mini="true" data-native-menu="false" data-icon="false" data-theme="c" name="country" id="cou">
<option>Choose Country</option>
<option value="all">Everyone</option>
<option value="Kenya">Kenya</option>
<option value="Uganda">Uganda</option>
<option value="Tanzania">Tanzania</option>
<option value="Rwanda">Rwanda</option>
</select><br>
<span style="font-size:14px"><b>We need your phone number which will be used for payment via M-PESA</b></span><br>
<input style="border-top:none;border-color:black;border:solid 1px;height:40px;width:100%" data-role="none" type="text" placeholder="Phone number" align="CENTER" name="phone" id="phone" /><br>


<br><a href="#"  data-role="button" rel="external" data-inline="false" id="ch" style="background:#3b5998;border:none;color:#fff;border-radius:0px">Set Ad</a>



</div>
</center>
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
