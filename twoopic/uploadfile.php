<?php
session_start();
?>





<!DOCTYPE html>


<html>
    <head>

<? include_once 'allcon.php';?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title></title>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <link rel="stylesheet" href="css/modify.css">
<link rel="stylesheet" href="modal.css">
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">
function hideupload(){
}
</script>
    </head>
   <body class="metro">
</body>

<?php
$show="Select a file to share";

echo '
<div class="modalDialog" id="up">
<div style="border-radius:10px;border:solid 10px;border-color:darkblue;opacity:1 ">
<h3 class="fg-black">'.$show.'</h3>
<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="input-control text size4">
<input type="file" name="file" id="file">


</div>

<input type="submit" name="submit" value="Upload"  class="button default primary">
<a href="connect.php" class="button default primary" >Cancel</a>
</form>'


?>
</div>
<?php
function store(){
$namee=$_FILES["file"]["name"];
}?>

</div>
</div>
</body>
</html>