<?php 
session_start();
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<?php 
session_start();
include 'allcon.php';

?>
<!DOCTYPE html>

<html>
    <head>


        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title></title>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <link rel="stylesheet" href="css/modify.css">
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
    </head>
   <body class="metro">

<?php 
session_start();
$u="SELECT * FROM users order by rand()limit 5";
$xx=mysqli_query($con,$u);
echo '<h3><small>Check me out!</small></h3>';
while($re=mysqli_fetch_array($xx))
{

echo '<a href="profile.php?user='.$re['Username'].'"> <img height="50" width="50" STYLE="border:solid thin" src="profilepics/'.$re['Photo'].'"></a>

';
}
echo '<br><br>
<table><tr><td><a style="border-radius:10px" href="profile.php?user='.$_SESSION['current'].'" class="button default primary">Followers ('.$_SESSION['followers'].')</a></td>
<td><a style="border-radius:10px" href="profile.php?user='.$_SESSION['current'].'" class="button default primary">Following ('.$_SESSION['following'].')</a></td></tr></table>
';
echo '
<a href="uploadfile.php" style="border-radius:10px" class="button default primary">Find your friends</a>
<h3><small>Follow your passion</small></h3>
<a href="">Sports</a><br>
<a href="">Movies</a><br>
<a href="">Music</a><br>
<a href="">Fashion</a><br>
<a href="">Art</a><br>
<a href="">News/Media</a><br>
<a href="">Technology</a><br>
<a href="">Business</a><br>
<a href="">Social </a><br>
<a href="">Health</a><br>
<a href="">Education</a><br><br>


';
 

?>
</body>
</html>







