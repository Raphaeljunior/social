<?php 
session_start(); 
include 'allcon.php';
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title><?php echo $_GET[with];?></title> 
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
<script type="text/javascript">
$(function(){
$("#not").hide();
function getUrl(key){

var result=new RegExp(key + "=([^&]*)","").exec(window.location.search);
return result && unescape(result[1])||"";}

var x=$(window).width();
if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}


var user=getUrl("cuser");
var key=getUrl("key");
var you=getUrl("with");
$("#xx").html(you);

$("#hm").attr("href","talk.php");



var bimage=window.localStorage.getItem("bimage");
if(bimage==null){
$("#dd").css("background","url(img/6.jpg)");
}else{
$("#dd").css("background","url("+bimage+")");
}
$("#men").click(function(){
$("#x").slideToggle();
});

$("#cp").click(function(){
$("#xc").slideToggle();
$("#setpic").slideToggle();

});

$("#rem").click(function(){
window.localStorage.removeItem("bimage");
$("#dd").css("background","url(img/6.jpg)");
});


$("#up").click(function(){
navigator.camera.getPicture(onSuccess,onFail,{quality:50,destinationType:Camera.DestinationType.DATA_URL});
});


$("#gal").click(function(){
navigator.camera.getPicture(onpickSuccess,onFail,{quality:50,destinationType:Camera.DestinationType.FILE_URI,sourceType:Camera.PictureSourceType.PHOTOLIBRARY});

});


function onSuccess(idata){
$("#image").attr("src","data:image/jpeg;base64,"+idata);
}


function onpickSuccess(idata){
$("#image").attr("src",idata);
}

$("#upload").click(function(){
var uri=$("#image").attr("src");
window.localStorage.setItem("bimage",uri);
$("#dd").css("background","url("+uri+")");

});




function onFail(msg){
$("#status").html(msg);
}


$(".submit").click(function(){
$(".za").submit();
});


});



</script>
	</head> 


	<body id="dd" > 
	
		<div data-role="page" style="background:#d4d4d4" id="chats">
<?php include 'header.php';?>

<div class="modalDialog" id="loadw" style="display:none">
<div>
<center>
<span id="load" class="metro" style="font-size:12px;color:blue;display:none;width:100%"><i class="icon-record"></i></span></center>
<div style="display:none"><input type="text" id="counts" value="1"></div>	
<center><span id="mm" style="color:black"><b>Logging in...Please wait</b></span>
</div>
</div>	




			
	<div data-role="content" id="xc" style="background:#d4d4d4">

<?php

?>



<?php	
echo '<div style="display:none">
<input type="text" value="'.$_SESSION[current].'" id="u">

</div>
	
<div class="mobile" style="display:none" data-role="content">
<textarea style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none;width:100%" class="msg" data-role="none" type="text" placeholder="Add your message here.Tag people with the @myfriend and include other topics with the #OtherStory" name="ddes" id="mddes" >	
</textarea><br>
<button  data-role="none"  data-inline="true" style="background:#3b5998;border:none;color:#fff;border-radius:4px;height:30px" id="dmpost">Send</button>
<a href="msgphotoshare.php?with='.$_GET[with].'" data-role="none" style="color:#3b5998" rel="external" ><b>Share Photo</b></a>
</div>';

?>

<div id="st" style="display:show;background:none;height:auto;border-radius:10px" class="metro" id="thr">
<?php
$you=$_GET[with];
$sl=mysqli_query($con,"select * from logged where username='$you' order by id desc limit 1");
$online=mysqli_fetch_array($sl);


echo '<span style="color:#3b5998;font-size:18px"><b>'.$you.'<b></span>';
if(mysqli_num_rows($sl)!==0){
if($online[time]==''){
echo '<span style="color:green">(Online)</span>';
}else{
echo '<span style="color:green">(Not Active)</span>';
}
}



?>
<div id="messages">

</div>
<div id="s" style="display:none;border:solid 1px;border-color:#3b5998;height:auto;width:auto;background:#fff">
</div>
</div>
</div>



<br><br><br><br><div id="setpic" style="display:none">
<center>
<img src="img/p.png" id="image" style="width:100px;height:100px;border-radius:2px;border:solid 0.3px"></center><br>
<center>

<div data-role="navbar">
<ul>
<li><a href="#" id="up" data-role="button" rel="external" data-inline="true" name="submit" style="background:#3b5998;border:none;color:#fff;border-radius:0px" class="metro"><i class="icon-camera"></i> Take a picture</a>
</li>
<li><a href="#" id="gal" data-role="button" rel="external" data-inline="true" name="submit" style="background:#3b5998;border:none;color:#fff;border-radius:0px" class="metro"><i class="icon-pictures"></i> Open Gallery</a>

</li></ul></div><br>
<div data-role="navbar">
<ul>
<li><a href="#" id="upload" data-theme="c" data-role="button" rel="external" data-inline="false" name="submit" style="border:none;color:black;border-radius:0px" >Set as background picture</a>
</li>
</ul></div>
</center>
</div>
	
			
<div data-role="footer" data-position="fixed" data-theme="c" data-tap-toggle="false" class="pc">
<div id="direct" style="display:show;background:none;width:auto;height:auto;border-radius:10px" class="metro">

<div class="input-control text" style="display:none">
<input type="text" data-role="none" placeholder="Added recipients will appear here" name="dpeople" id="dpeople" max="10">
</div>
<table style="width:100%"><tr>
<td valign="top" style="width:90%">
<div class="input-control text" >
<input style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none" data-role="none" type="text" placeholder="Add your message here.Tag people with the @myfriend and include other topics with the #OtherStory" name="ddes" id="ddes" >
</div>
</td>
<td valign="top">
<a href="#"  data-role="button"  data-inline="true" style="background:#3b5998;border:none;color:#fff;border-radius:4px" id="dpost">Send</a>

</div><br>
<a href="msgphotoshare.php?with=<?php echo $_GET[with] ?>" data-role="none" style="color:#3b5998" rel="external" >Share Photo</a>
</td></tr></table>
<span id="derr" style="color:green;font-size:15px;font-family:'Century Gothic'" ><b></b></span>


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
