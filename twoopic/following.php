<?php session_start();?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>My Page</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>

        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">
$(function(){

function getUrl(key){
var result=new RegExp(key + "=([^&]*)","").exec(window.location.search);
return result && unescape(result[1])||"";}
var user =$("input#u").val();
$("input#user").val(user);
$("#us").html(user);



var key=getUrl("key");

$("#hm").attr("href","home.html?user="+user+'&key='+key);
$("#intl").attr("href","interactions.html?user="+user+'&key='+key);
$("#actl").attr("href","activity.html?user="+user+'&key='+key);
$("#shl").attr("href","share.html?user="+user+'&key='+key);
$("#mesl").attr("href","direct.html?user="+user+'&key='+key);

var current=$("input#u").val();
var datastring='user='+current+'&key='+key;




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

















var datastringa='usera='+current+'&cuser='+current;




$.ajax({

url:"profilefeed.php?pfollowing=x",
type:"POST",
data:datastringa,
success:function(data){

$("#myfeed").html(data);

},

error:function(data){ 


}
});



});



</script>
	</head> 
	<body> 
	
		<div data-role="page" data-theme="d">
<div id="not"></div>
			
<?php include 'header.php';?>
	<div data-role="navbar" >
<li><a href="#" data-theme="c" style="width:100%;height:auto;border-bottom:solid 2px;border-bottom-color:dark" data-role="button">People <?php echo $_GET[user] ?> is following</a></li>
</div>			
			

			<div data-role="content">
<center><span id="load" class="metro" style="font-size:15px;color:blue;display:none"><i class="icon-record"></i></span></center>
<div style="display:none"><input type="text" id="counts" value="1"></div>		
<div id="myfeed">
<span style="font-size:15px"><b>Loading people...</b></span>
</div>
</div>	
			
<div style="display:none">
<input type="text" value="<?php echo mysqli_real_escape_string($con,$_GET[user]) ?>" id="u">
</div>
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
