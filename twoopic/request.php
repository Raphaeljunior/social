<?php
session_start();
include 'allcon.php';
//Show requests to that user
$user=$_SESSION['current'];

$isa="select * from request where Userto='$user' and status='pending'";
$checka=mysqli_query($con,$isa);
$num=mysqli_num_rows($checka);

if($num==0){
$u="SELECT * FROM users where Username!='$user'order by rand()limit 6";
$xx=mysqli_query($con,$u);
echo '<span style="font-size:15px;font-family:"Century Gothic"">Discover these people</span><br>';
while($re=mysqli_fetch_array($xx))
{

echo '<a href="profile.php?user='.$re['Username'].'"> <img height="40" width="40" STYLE="border:solid 2px;border-radius:5px;border-color:#fff" src="profilepics/'.$re['Photo'].'"></a>

';
}

}else{

if($num==1){
echo '<span style="font-size:20px;font-family:"Century Gothic"">'.$num.' person wants to connect with you</span>';}
else{
echo '<span style="font-size:20px;font-family:"Century Gothic"">'.$num.' people want to connect with you</span>';
}

echo '<a href="addlist.php?id='.$det['ID'].'&type=request&page=followers" class="button default primary">View All</a>
';
}






while($req=mysqli_fetch_array($checka)){
$from=$req['Userfrom'];

$h="select * from users where Username='$from'";
$hh=mysqli_query($con,$h);
$u=mysqli_fetch_array($hh);
echo '<table><tr><td valign="top" style="width:300px">
<a href="profile.php?user='.$from.'">'.$from.'</a> wants to connect with you<br></td>
<td><a href="addlist.php?id='.$u['ID'].'&type=accept&page=home" class="button default primary">Accept</a></td>
<td><a href="addlist.php?id='.$u['ID'].'&type=later&page=home" class="button default primary">Later</a></td>
</tr></table>';














}




?>