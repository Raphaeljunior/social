<?php
session_start();
include 'allcon.php';
$user=$_SESSION[current];
$selw="select * from users where Username!='$user' order by rand() limit 7";
$checkuserw=mysqli_query($con,$selw);



while($result=mysqli_fetch_array($checkuserw)){

echo '<li style="list-style-type:none">
<table><tr><td><img src="profilepics/'.$result[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td  style="width:200px">'.$result[FirstName].' '.$result[SecondName].'<br><a href="profile.php?user='.$result[Username].'" rel="external">
'.$result[Username].'</a></td><td>';

$chk="select * from follow where Userfollowing='$user' and Userfollowed='$result[Username]'";
$chka=mysqli_query($con,$chk);




if(mysqli_num_rows($chka)==0){
echo '<a target="x" href="followuser.php?id=Follow&user='.$result[Username].'" data-role="button" data-theme="c" data-mini="true" style="color:purple"><b>+ Follow</b></a>';
}else{
echo '<a target="x" href="followuser.php?id=Following&user='.$result[Username].'" data-role="button" data-theme="c" data-mini="true" style="color:green"><b>Following</b></a>';
}

echo '</td></tr></table></li>';
}

?>