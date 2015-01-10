<?php
session_start();
include 'allcon.php';
$user=$_GET['id'];
$isfo="select * from follow where Userfollowed='$user' order by rand()";
$checkfollo=mysqli_query($con,$isfo);
$num=mysqli_num_rows($checkfollo);
?>
<?php include_once 'allcon.php'?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Twoopic</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="css/metro-bootstrap.css">
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="nav.css" />
		<link rel="stylesheet" href="css/slicknav.css" />
<script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>

<div data-role="page" data-theme="c" data-ajax="false" id="feed">
<div data-role="header" id="toolbarnav"data-theme="b" data-position="fixed">
			<h5 class="fg-white"><?php echo $user.' followers';?></h5>
			<div class="metro">
<a href="#" data-rel="back" data-role="button" data-inline="true" class="ui-btn-left"><i class="icon-arrow-left"></i></a>	


</div>

</div>
<div data-role="content" data-theme="c">
<?php
while($follist=mysqli_fetch_array($checkfollo)){
$followers=$follist['Userfollowing'];

$t="select * from users where Username='$followers'";
$pro=mysqli_query($con,$t);
while($de=mysqli_fetch_array($pro)){
echo '

<a href="appprofile.php?user='.$de['Username'].'">
<img height="50" width="50" STYLE="border:solid thin;height:50px;width:50px;border-radius:5px" src="profilepics/'.$de['Photo'].'"></a>
';
}

}
?>
</div>
<div data-role="footer" data-position="fixed" class="metro">

<center><a data-prefetch href="apphome.php" data-role="button" data-inline="true" ><i class="icon-home"></i></a>
<a href="#" data-role="button" data-inline="true" ><i class="icon-comments-3" data-prefetch></i></a>
<a rel="external" href="appprofile.php?user=<?php echo $_SESSION[current] ?>" data-role="button" data-inline="true" data-prefetch><i class="icon-user-2"></i></a>
<a href="#" data-role="button" data-inline="true" ><i class="icon-search" data-prefetch></i></a>
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
