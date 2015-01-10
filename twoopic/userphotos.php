<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<?php
include 'allcon.php'; 
$current=$_REQUEST['name'];
if (!empty($current)){
$passw=mysqli_query($con,"select * from status  where username='$current' and media!='' and direct='' and sharing='' order by id desc ");

$pass=mysqli_query($con,"select * from status  where username='$current' and media!='' and direct='' and sharing='' order by id desc limit 5");
$num=mysqli_num_rows($passw);
echo '<a rel="external" href="appuserphotos.php?id='.$current.'" class="button default primary">See all photos('.$num.')</a><br>';
while ($photo=mysqli_fetch_array($pass)){
echo '

<a rel="external" href="photo.php?id='.$photo[topicid].'"><img src="sharedmedia/'.$photo[media].'" style="height:150px;width:150px"></a>

';












}













}
?>