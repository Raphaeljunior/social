<?php 
session_start();
if(!isset($_SESSION['current'])){
header('location:i.php');
}
?>
<?php 
session_start();
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

$me=$_SESSION['current'];
$sql="SELECT * FROM status where username='$me' or order by id desc";
$result=mysqli_query($con,$sql);






while($row=mysqli_fetch_array($result))
{}
$u=$row['username'];
$e="select * from users where Username='$u'";
$r=mysqli_query($con,$e);
$ph=mysqli_fetch_array($r);
$photo=$ph['Photo'];




$f="select * from topicfollowing where username='$me'";
$pass=mysqli_query($con,$f);
$num=mysqli_num_rows($pass);

echo $_SESSION['current']." "."is following"." ".$num." "."topics";



$details="select * from status where topicid='$top'";
$det=mysqli_query($con,$details);

while($row=mysqli_fetch_array($pass)){
echo $row['topic'];
echo $topic['replies'];



$use=$_SESSION['current'];
$ide=$row['topicid'];
$isfo="select * from topicfollowing where topicid='$ide' and username='$use'";
$checkfollo=mysqli_query($con,$isfo);
if (mysqli_num_rows($checkfollo)==0){
$f="Follow";
}else{
$f="Unfollow";
}

$_SESSION['ftopic']=$row[topicid];
$media=$row['filename'];
$key=$row['id'];
$topic=$row['topic'];





$now=DATE("i");
$tim=$row['TIME'];
$elapse=$tim-$now;
$ago=ltrim($elapse,"-");
$y=$ago/60;

if($ago==0){
$show="Just Now";
}
if($ago==1){
$show=$ago." "."minute ago";
}
if($ago>1 and $ago<59){
$show=$ago." "."minutes ago";
}
if($ago==59){
$ago=60;
$show="1 hour ago";
}
if($y>1 and $y<24){
$show=$y." "."hours ago";
}
if (empty($row['media'])){
echo '<div class="bg-white">';
echo '<ul class="bg-white">
<br><a href="profile.php?user='.$row['username'].'"><img  src="profilepics/'.$photo.'" height="50" width="50"></a>
	
		
		<a href="profile.php?user='.$row['username'].'"><small>'.$row['username'].'</small></a><br>
<li class="listi"><a href="topic.php?id='.$row[topicid].'">'.$row['topic'].'</a>

		<br><small>'.$show.'</small><a class="button mini">
<a href="topic.php?id='.$row[topicid].'" class="button mini"><i class="icon-comments-2 on-right"></i><small>Talk('.$row['replies'].')</small></a>'." ".'
<a href="followtopic.php?id='.$row[topicid].'&type='.$f.'" class="button mini"><i class="icon-arrow-right-2 on-right"></i><small>'.$f.'</small></a>
<a class="button mini"><i class="icon-share on-right"></i><small>Share</small></a>
	</li>
</ul>

';

include 'talks.php';
echo '</div>';
}else{
echo '<div class="bg-white">';
echo '<ul class="bg-white">
<br><a href="profile.php?user='.$row['username'].'"><img  src="profilepics/'.$photo.'" height="50" width="50"></a>
	
		
		<a href="profile.php?user='.$row['username'].'"><small>'.$row['username'].'</small></a><br>
<li class="listi"><a href="topic.php?id='.$row[topicid].'&type=photo&photo='.$row['media'].'">'.$row['topic'].'</a><br><a href="topic.php?id='.$row[topicid].'&type=photo&photo='.$row['media'].'"><img height="100" width="100" STYLE="border:solid thin" src="sharedmedia/'.$row['media'].'"></a>

		<br><small>'.$show.'</small><a class="button mini">
<a href="topic.php?id='.$row[topicid].'&type=photo&photo='.$row['media'].'" class="button mini"><i class="icon-comments-2 on-right"></i><small>Talk('.$row['replies'].')</small></a>'." ".'
<a href="followtopic.php?id='.$row[topicid].'&type='.$f.'" class="button mini"><i class="icon-arrow-right-2 on-right"></i><small>'.$f.'</small></a>
<a class="button mini"><i class="icon-share on-right"></i><small>Share</small></a>
	</li>
</ul>

';
include 'talks.php';
echo '</div>';
}
}} ?>



</ul>
</body>
</html>







