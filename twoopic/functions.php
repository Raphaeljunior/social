<link rel="stylesheet" href="modal.css">
<script type="text/javascript">
function show(){

var x = document.getElementById('ph');
x.style.display='block';
}
function hide(){

var x = document.getElementById('ph');
x.style.display='none';
}

</script>

<?php
function getuserfeed($user,$limit)
{
include 'allcon.php';
$y="select * from status where username='$user' or Usersharing='$user' order by id desc limit $limit";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
echo $user;
}


function showphoto($photo,$name){



echo '
<a data-ajax="false" href="topic.php?id='.$photo.'&cuser='.$cur.'&key='.$key.'"><img src="sharedmedia/'.$name.'" style="height:80px;width:80px;border-radius:5px"></a>';

}

function showfollowing($user){
include 'allcon.php';
$isfo="select * from follow where Userfollowing='$user' and Userfollowed!='$user' order by rand()";
$checkfollo=mysqli_query($con,$isfo);
$numfollow=mysqli_num_rows($checkfollo);
echo '<span style="font-size:15px"><b>'.$numfollow.'</b></span>';
}

function showfollowers($user){
include 'allcon.php';
$ifo="select * from follow where Userfollowed='$user' and Userfollowing!='$user' order by rand()";
$checkfoll=mysqli_query($con,$ifo);
$numfollowers=mysqli_num_rows($checkfoll);
echo '<span style="font-size:15px"><b>'.$numfollowers.'</b></span>';
}
function showstories($user){
include 'allcon.php';
$pass=mysqli_query($con,"select * from status  where username='$user' and media!='' and direct='' and sharing=''order by id desc");
$num=mysqli_num_rows($pass);
echo '<span style="font-size:15px"><b>'.$num.'</b></span>';
}


?>
<?php
function showtime($posted){
$now=time();
$diff=$now-$posted;
$el=round($diff/60);
if($el<1){
$show="Just Now";
}else{
if($el==1){
$show="1 minute ago";
}else{
if($el>1&&$el<60){
$show=$el.' minutes ago';
}else{
if($el>=60){
$hr=round($el/60);
if($hr==1){
$show=$hr.' hour ago';
}else{
if($hr<24){

$show=$hr.' hours ago';
}else{

if($hr>=24){
$d=round($hr/24);
if($d==1){
$show=$d.' day ago';
}else{
if($d>1&$d<7){
$show=$d.' days ago';
}else{
if($d>=7&$d<28){
$w=round($d/7);
$show=$w.' weeks ago';
}else{
if($d>=28){
$mm=round($d/28);
$show=$mm.' months ago';}
}
}
}
}
}
}
}
}
}
}
echo '<small><b>'.$show.'</b></small>';
}?>