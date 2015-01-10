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







</script>
	</head> 
	<body> 
	
		<div data-role="page" data-theme="d">

			
<?php include 'header.php';?>
			
			

			<div data-role="content">
<div id="direct" style="display:show;background:none;width:auto;height:auto;border-radius:10px" class="metro">
<span>Share a direct post here.This post will be seen by only people you add here</span><br>

<form action="posttopic.php?mobile=x" method="post" data-ajax="false">
<span>Add people here separated by a space</span><br>
<input type="text" data-role="none" style="border-top:none;border-color:black;border:solid 1px;height:auto;width:100%" placeholder="Add people here separated by a space" name="dpeople" id="dpeople" max="10">
<br><span>Add your topic here #mystory</span><br>

<br><input data-role="none" type="text" style="border-top:none;border-color:black;border:solid 1px;height:auto;width:100%" placeholder="Topic here #YourStory (Optional)" name="status" id="dstatus" max="10">
<br><span>Describe it more here</span><br>

<br><textarea data-role="none" type="text" style="border-top:none;border-color:black;border:solid 1px;height:auto;width:100%" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="des" id="ddes" style="height:60px">
</textarea><br>

<input type="submit" style="background:#3b5998;border:none;color:#fff;border-radius:0px;height:30px;width:100%" data-role="none" value="Share">
</form>
<span id="derr" style="color:green;font-size:15px;font-family:'Century Gothic'"><b></b></span>


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
