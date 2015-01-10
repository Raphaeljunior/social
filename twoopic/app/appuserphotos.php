

<?php
include 'allcon.php';
$user=$_POST['usera'];
$cuser=$_POST[cuser];
if($cuser==''){
$cur=$_POST[usera];
}else{
$cur=$cuser;
}

if (!empty($user)){


$pass=mysqli_query($con,"select * from status  where username='$user' and media!='' and direct='' and sharing=''order by id desc");
$num=mysqli_num_rows($pass);}
?>
<?php include_once 'allcon.php'?>

<?php
include 'functions.php';
if ($num==0){
echo '<h3>'.$user.' has no photos</h3>';
}else{
while ($photo=mysqli_fetch_array($pass)){

showphoto($photo[topicid],$photo[media],$cur,$_POST[key]);
}}
?>


