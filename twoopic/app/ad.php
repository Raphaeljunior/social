<?php 
session_start();
include 'allcon.php';
$user=$_SESSION[current];
$categ=$_POST[cat];
$phone=$_POST[phone];
$period=$_POST[time];
$target=$_POST[cou];

if($period=='0'){
$bi="300";
}else{
$bi=$period*400;
}

if($target=='all'){
$b="200";
}else{
$b="100";
}

if($categ=='all'){
$ba="200";
}else{
$ba="100";
}


$bill=$bi+$b+$ba;

echo '<b>Your bill is <span style="font-size:17px;color:green"><b>KShs '.$bill.'</b></span><br></b>If you are comfortable with this ad,Click <B>I AM OKAY WITH THIS AD</B> 
If you are not comfortable click outside to set another ad';


echo '<form method="post" action="setad.php" data-ajax="false">
<div style="display:none">
<input type="text" name="cat" value="'.$categ.'">
<input type="text" name="phone" value="'.$phone.'">
<input type="text" name="time" value="'.$period.'">
<input type="text" name="cou" value="'.$target.'">
</div>
<input type="submit" value="I AM OKAY WITH THIS AD" STYLE="background:#3b5998;color:#fff;border:none">
</form>';











?>
