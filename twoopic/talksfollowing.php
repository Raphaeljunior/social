<?php 
session_start();
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<?php session_start();?>
<?php
include 'allcon.php';
$cu=$_SESSION['topid'];
$rep=$_SESSION['replies'];
$topic=$_SESSION['topic'];
$name=$_SESSION['current'];
$t=date("i");


//get topics followed by that user

$x="select * from topicfollowing where username='$name'";
$s=mysqli_query($con,$x);
if(mysqli_num_rows($s)==0){
echo '<h4 class="fg-black">You are currently not following any topic.Please follow a topic to know what other people are saying about it</h4>
<br><h4 fg-cyan>Topic Suggestions</h4>';
//get random list of topics
$v="select * from status where replies>1 or Sponsored='true' and media!='' order by rand() limit 4";
$rtt=mysqli_query($con,$v);
while($sug=mysqli_fetch_array($rtt)){

echo '<h4 fg-cyan><a href="topic.php?id='.$row[topicid].'">'.$sug['topic'].'</a></h4>';

}
}else{
echo '<h4>Talks going on now</h4>';
while($thosopics=mysqli_fetch_array($s)){
$thostopics=$thosopics['topicid'];


//get replies of the topics
$po="select * from replies where topicid='$thostopics'";
$pass=mysqli_query($con,$po);


while($ro=mysqli_fetch_array($pass))
{
$cuu=$ro['Username'];
$thattopic=$ro['topicid'];
$passid=$ro['topicid'];
$e="select * from users where Username='$cuu'";
$r=mysqli_query($con,$e);
$ph=mysqli_fetch_array($r);
$photo=$ph['Photo'];


$bb="select * from status where topicid='$thattopic'";
$rr=mysqli_query($con,$bb);
while($a=mysqli_fetch_array($rr)){
$ftopic=$a['topic'];
$media=$a['media'];

echo '<ul class="bg-white" style="border-bottom:solid 1px;border-color:black">
<table><tr><td style="width:50px" valign="top"><a href="profile.php?user='.$ro['Username'].'"><img  src="profilepics/'.$photo.'" height="50" width="50"></a></td>
	
		
		<td><td><a href="profile.php?user='.$ro['Username'].'"><small>'.$ro['Username'].'</small></a>'." > ".'<a href="topic.php?id='.$thostopics.'"><small>'.$ftopic.'</small></a>
<br><div style="left-padding:10px"><small>'.$ro['Message'].'</small></div></a>
<small>1 minute ago</small><a class="button mini">
<a class="button mini"><i class="icon-share on-right"></i><small>Share</small></a>'." ".'
<a class="button mini"><i class="icon-thumbs-up on-right"></i><small>Like ('.$ro['likes'].')</small></a></td></tr></table><br><br>
	</ul>

';
}
}
}
} 
?>