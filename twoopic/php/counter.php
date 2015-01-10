<?php
include 'allcon.php';
if(!empty($_GET[id])){
$y="select * from status where  tags like '%$current%' or description like '%$current%' or talk like '%$current%'  and direct=''";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);
echo $numm;}

?>