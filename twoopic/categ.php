<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Update Information</title> 
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




$("#co").attr("href","actions.php");


$("#ch").click(function()
{
var user=$("input#usa").val();
var cat=$("select#cou").val();
var email=$("input#email").val();
var datastring='user='+user+'&cat='+cat+'&email='+email;
if(cat=='Choose Category'){
$("#loadw").show();

$("#mm").html("Please choose a category");

}else{


$("#loadw").show();
$("#load").show();
$("#mm").html("Please wait...");
$.ajax({

type:"POST",
url:"php/signup.php?cat=x",
data:datastring,
success:function(data){ 
if(data==''){
window.location.assign("actions.php");
}else{
$("#loadw").show();
$("#load").hide();
$("#mm").html(data);
}
},
error:function(){ 

$("#loadw").show();
$("#load").hide();
$("#mm").html("Check Internet Connection");
}
});
}
});



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


$("#loadw").click(function(){
$(this).hide();
});





});



</script>
	</head> 
	<body> 
	
		<div data-role="page" data-theme="b" id="actions">

<div class="modalDialog" id="loadw" style="display:none">
<div>
<center>
<span id="load" class="metro" style="font-size:12px;color:blue;display:none;width:100%"><i class="icon-record"></i></span></center>
<div style="display:none"><input type="text" id="counts" value="1"></div>
<center><span id="mm" style="color:black"><b>Please wait...</b></span>
<a href="#"  data-role="button"data-mini="true" rel="external" data-inline="false" id="co" style="display:none;background:#3b5998;border:none;color:#fff;border-radius:0px">Continue</a>
</center>
</div>
</div>	



<div data-role="header" data-position="fixed" style="height:40px;background:#3b5998;border-bottom-color:#fff" data-theme="b" data-tap-toggle="false">
<h1>Update your information</h1>


		</div>

<center><table><tr><td>
<img src="profilepics/d.png" id="image" style="width:100px;height:100px;border-radius:500px"><br>
<div id="status"></div>
<div style="display:none">
<input type="text" id="server">
</div>
</td>
<td>

</td>
</tr>
</table>
</center>

<center><div style="background:#fff;color:black;max-width:500px;border-radius:5px" class="metro" >
<span>We need you to provide your email address for future references.Your email address will be used in case you lose your password.Twoopic will also send you notifications through your email</span>
<div class="metro">
<div class="input-control text">
<input data-role="none" type="text" placeholder="Your email here" name="vid" id="email" style="border:solid 1px;border-color:#3b4998;border-radius:5px">
</div>
</div><br>
<span>
Please set a category below with which people will read your news in the categories section.Your news will also appear publicly to all your followers inthe home section.
Twoopic likes it when you reach specific people with your news </span><br><br>


<select style="border-top:none;border-color:black;border:solid 1px;height:40px;width:100%;border-radius:5px" data-role="none" data-mini="true" data-native-menu="false" data-icon="false" data-theme="c" name="country" id="cou">
<option>Choose Category</option>
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
</select><br><br>
<a href="#"  data-role="button" rel="external" data-inline="false" id="ch" style="background:#3b5998;border:none;color:#fff;border-radius:5px">Update My Information</a>
</div></center>
<?php
echo '
<div style="display:none">
<input type="text" id="usa" value="'.$_SESSION[current].'">
</div>			
';
?>		

		</div>


<div data-role="page" data-theme="b" id="trends">


</div>


		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
        		
	</body>
</html>
