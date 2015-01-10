<?php
include 'allcon.php';
session_start();
$user=$_SESSION['current'];
$id=$_SESSION[id];
$de="select * from logged where username='$user' and uid='$id'";
$x=mysqli_query($con,$de);
$g=mysqli_fetch_array($x);
$posted=$g[ip];
$now=time();
$el=$now-$posted;
mysqli_query($con,"update logged set time='$el' where username='$user' and uid='$id'");

session_unset();
$expire=time()+60*24*30;
setcookie("user","",$expire-3600);
setcookie("userp","",$expire-3600);

header("location:index.php");
?>
<script src="js/jquery/jquery.min.js"></script>

        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">
$(function(){
window.localStorage.clear();
window.location.assign("index.php");
});

</script>

<?php


?>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>