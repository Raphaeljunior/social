<?php
include 'allcon.php';
$id=$_REQUEST[id];
$y="select * from status where topicid='$id' and media!='' and direct='' order by id desc limit 1";
$yy=mysqli_query($con,$y);
$pho=mysqli_fetch_array($yy);

$get=mysqli_query($con,"select * from favorites where itemid='$id'");
$favno=mysqli_num_rows($get);
$geta=mysqli_query($con,"select * from likes where itemid='$id'");
$likes=mysqli_num_rows($geta);
$getaa=mysqli_query($con,"select * from dislikes where itemid='$id'");
$dislikes=mysqli_num_rows($getaa);



$repi=mysqli_query($con,"select * from replies where topicid='$id'");
$replies=mysqli_num_rows($repi);

$sha=mysqli_query($con,"select * from shared where Topic='$id'");
$shares=mysqli_num_rows($sha);



echo '
<center><div class="metro" style="background:#000000;height:30px;width:100%">

<td valign="top" class="metro">
<a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:white"><i  class="icon-comments-4 on-left"></i>('.$replies.') </a>
</td>

<td valign="top" class="metro">
<a  href="#" id="like" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:white"><i class="icon-thumbs-up on-left"></i>('.$likes.') </a>
</td>

<td valign="top" class="metro">
<a href="#" id="dislike" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:white"><i class="icon-thumbs-down on-left"></i>('.$dislikes.') </a>
</td>

<td valign="top" class="metro">
<a href="#" id="favorite" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:white"><i class="icon-star-3 on-left"></i>('.$favno.') </a>
</td>

<td valign="top" class="metro">
<a href="#" id="share" data-role="button" data-mini="true" data-inline="true" data-theme="c" style="color:white"><i class="icon-share on-left"></i>('.$shares.') </a>
</td>
</div></center>
<img src="sharedmedia/'.$pho[media].'" style="width:100%;height:100%">';







?>