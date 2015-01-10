<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<!DOCTYPE html>

<html>
    <head>

<div STYLE="position:fixed; width:100%; top:0px; z-index:1">
<?php include_once ('header.php');?></div>
<?php include_once 'connections.php'?>



        <meta charset="UTF-8">
<meta name="viewport" content="width=320px, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title></title>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <link rel="stylesheet" href="css/modify.css">
	<link rel="stylesheet" href="css/Trial.css">
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
</head>
<body class="metro">
<div class="grid bg-white" style="z-index:0"><br><br>
                     
<div class="row">


                            <div class="span4"></div>

<div class="span6" style="border-radius:10px;border:solid 5px;border-color:gray;opacity:1 ">
<?php
session_start(); 
include 'allcon.php'; 
$user=$_SESSION['current'];
$x="select * from wall where Userto='$user' or include1='$user' or include2='$user' or include3='$user' or include4='$user'";
$r=mysqli_query($con,$x);


if(mysqli_num_rows($r)==0){
echo '<h4>You have no post written to you</h4>';
}


while($wall=mysqli_fetch_array($r)){
$from=$wall['Userfrom'];
$lat=$wall['latest'];
$to=$wall['Userto'];
$one=$wall['include1'];
$two=$wall['include2'];
$three=$wall['include3'];
$four=$wall['include4'];
$mes=$wall['Message'];
$y="select * from users where Username='$from'"; 
$u=mysqli_query($con,$y);
$us=mysqli_fetch_array($u);

echo '
<table style="border-bottom:solid 1px;border-color:black"><tr><td style="width:50px" valign="top"><a href="profile.php?user='.$us['Username'].'"><img  style="align:top" src="profilepics/'.$us['Photo'].'" height="50" width="50"></a></td>
<td valign="top" width="400px"><a href="profile.php?user='.$us['Username'].'">'.$us['Username'].'</a> to <a href="profile.php?user='.$user.'">You</a>
';
if(!strcasecmp($to,$user)==0){
echo '
<a href="profile.php?user='.$to.'"> '.$to.'</a>';}

if(!strcasecmp($one,$user)==0){
echo '
<a href="profile.php?user='.$one.'"> '.$one.'</a>';}
if(!strcasecmp($two,$user)==0){
echo '
<a href="profile.php?user='.$two.'"> '.$two.'</a>';}
if(!strcasecmp($three,$user)==0){
echo '
<a href="profile.php?user='.$three.'"> '.$three.'</a>';}
if(!strcasecmp($four,$user)==0){
echo '
<a href="profile.php?user='.$four.'"> '.$four.'</a>';}
echo '<br>';
if(empty($lat)){
echo $mes.'<br>';
}else{
echo $lat.'<br>';
}


echo '<a href="converse.php?id=757hfyweuytfuyuert7567uyt78futy7t7857tyu'.rand().'&m='.$mes.'&source=waller.php" style="border-radius:10px" class="button mini">Reply</a>
</td></tr></table>	


';
}


$aa="select * from conversations where Userto='$user' order by id desc";
$rt=mysqli_query($con,$aa);
while($rep=mysqli_fetch_array($rt)){
$ufrom=$rep['Userfrom'];
$utoo=$rep['Userto'];
$rpl=$rep['reply'];
$m=$rep['message'];
$yy="select * from users where Username='$ufrom'"; 
$uy=mysqli_query($con,$yy);
$usy=mysqli_fetch_array($uy);
if($ufrom==$user){
echo "";
}else{
echo '<table style="border-bottom:solid 1px;border-color:black"><tr><td style="width:50px" valign="top"><a href="profile.php?user='.$usy['Username'].'"><img  style="align:top" src="profilepics/'.$usy['Photo'].'" height="50" width="50"></a></td>
<td valign="top" width="400px"><a href="profile.php?user='.$usy['Username'].'">'.$usy['Username'].'</a> to <a href="profile.php?user='.$user.'">You</a>
<br>'.$rpl.'<br>
<a href="converse.php?id=757hfyweuytfuyuert7567uyt78futy7t7857tyu'.rand().'&m='.$m.'&source=waller.php" style="border-radius:10px" class="button mini">View Conversation</a>
</td></tr></table>	


';


}

}






?>
</div>
<div class="span3"></div>
</div>
</div>
</body>
</html>