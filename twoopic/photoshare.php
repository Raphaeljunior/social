<?php session_start();?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Share Photo</title> 
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
<div id="shapho" style="display:show">
<span>Choose a photo to share</span>
<form action="mupload.php" data-ajax="false" method="post" enctype="multipart/form-data" target="x">
<input type="file" name="file" accept="image/*" capture>
<input type="submit" value="Upload Photo">
</form>
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
