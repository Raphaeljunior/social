<?php session_start();?>
<?php

include 'allcon.php';

?>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){


$firstname=$_POST[fname];
$secondname=$_POST[sname];
$usernam=ltrim($_POST[uname],"@");
$password=md5($_POST[password]);


$username=preg_replace('/\s+/','',$usernam);
$r="select * from users where Username like '@$username%'";
$pass=mysqli_query($con,$r);


if(!empty($_GET[cat])){
mysqli_query($con,"update users set Category='$_POST[cat]' where Username='$_POST[user]'");

}else{


if(!mysqli_num_rows($pass)==0){

echo "This Username has already been taken";



}else{

mysqli_query($con,"insert into users (FirstName,SecondName,Username,Password,Photo,Country,coverphoto)
values('$firstname','$secondname','@$username','$password','d.png','$_POST[country]','cover.jpg')");
$usera='@'.$username;

$key=md5($t).rand(000000,999999).md5($usera).$t;

mysqli_query($con,"update users set App='$key' where Username='$usera'");


echo '
<div id="cx" style="display:show">

<table style="width:auto;height:100px">
<div style="background:#3b5998;height:40px;width:100%">
<span style="font-size:16px;color:white"><b>Welcome To Twoopic</b></span>
</div>
<tr>
<td>
<img src="img/p.png" style="height:60px;width:60px">
</td>
<td style="background:#fff">
<span style="font-size:16px;color:black"><b>'.$firstname.' '.$secondname.'</b><br>'.$usera.'
</span>
</td>
</tr>
</table>

<br><a align="center" data-role="button" href="categ.html?user='.$usera.'&key='.$key.'" id="hm" rel="external" style="background:#3b5998;color:white;font-size:20px">
<button style="background:#3b5998;border:none;color:#fff;border-radius:4px">Proceed</button></a>

</div>';




}


}









}
?>