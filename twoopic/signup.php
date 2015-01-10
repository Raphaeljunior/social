<?php session_start();


include 'allcon.php';
function spamcheck($field) {
  // Sanitize e-mail address
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    return TRUE;
  } else {
    return FALSE;
  }
}

if($_SERVER["REQUEST_METHOD"]=="POST"){


$firstname=mysqli_real_escape_string($con,$_POST[fname]);
$secondname=mysqli_real_escape_string($con,$_POST[lname]);
$usernam=mysqli_real_escape_string($con,ltrim($_POST[uname],"@"));
$password=md5($_POST[password]);

if($firstname==''||$secondname==''||$_POST[uname]==''||$_POST[country]=='Choose Country'||$_POST[cat]=='Choose Category'){
echo "All fields are required";
echo $firstname;
echo $secondname;
echo $_POST[uname];
}else{
if($_POST[password]!==$_POST['cword']){
echo "Passwords do not match";
}else{



$username=preg_replace('/\s+/','',$usernam);
$r="select * from users where Username like '%@$username%'";
$pass=mysqli_query($con,$r);






$cat=mysqli_real_escape_string($con,$_POST[cat]);

if(!empty($_GET[cat])){
mysqli_query($con,"update users set Category='$cat' where Username='$_SESSION[current]'");

}else{

$mailcheck = spamcheck($username);
    if ($mailcheck==TRUE) {
      echo "You cannot use your email as a username";
    } else {


if(mysqli_num_rows($pass)!==0){

echo "This Username has already been taken";



}else{

mysqli_query($con,"insert into users (FirstName,SecondName,Username,Password,Photo,Country,coverphoto,Category)
values('$firstname','$secondname','@$username','$password','d.png','$_POST[country]','cover.jpg','$_POST[cat]')");
$usera='@'.$username;


$status="I just joined Twoopic and I really want to interact with more people Lets start sharing #mystory";
$topicid=md5($status).rand(0,100);
$t=time();
$post="insert into status(username,topicid,TIME,description) 
VALUES('$usera','$topicid','$t','$status')";
mysqli_query($con,$post);
mysqli_query($con,"insert into follow(Userfollowed,Userfollowing)values('$usera','$usera')");

$id=md5($usera).rand();
$_SESSION[id]=$id;
$t=time();
mysqli_query($con,"insert into logged(uid,username,ip)
values('$id','$usera','$t')");

$message="Welcome To Twoopic $usera You will now be able to interact with as many people as possible.Please read this short guide on how to use Twoopic.You have to follow people in order to read their news.You can easily unfollow them when you wish.With 
Twoopic you can share new hashtags as topics which are happening around you then describe them more like stories for example .... #mystory Just had a faboulous evening...People will be able to read your news when you post a new update 
or when you talk about an update.You can choose to follow a topic to receive notifications whenever people talk about it.You can share public posts or private posts including photos and text updates.Feel free to ask any question regarding your usage on Twoopic or suggest ways to improve Twoopic.We need your support and feedback to 
make Twoopic a success.Official Twoopic messages will only be delivered using this account or @TwoopicSupport only";

$sel="insert into chat(Sender,Receiver,Message,messageid,Time,Status)
values('@Twoopic','$usera','$message','0','$t','Sending')";
mysqli_query($con,$sel);

$se="insert into chat(Sender,Receiver,Message,messageid,Time,Status)
values('$usera','@Twoopic','$message','0','$t','Receiving')";
mysqli_query($con,$se);

$post="insert into message(Sender,Receiver,Message,Time,Status,messageid) 
VALUES('@Twoopic','$usera','$message','$t','1','$topicid')";
mysqli_query($con,$post);



$key=md5($t).rand(000000,999999).md5($usera).$t;

mysqli_query($con,"update users set App='$key' where Username='$usera'");
$_SESSION[current]=$usera;
$expire=time()+60*24*30;
setcookie("user",$usera,$expire);
if(!empty($_GET[mobile])){
header("location:pic.php");
}else{

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

<br><a align="center" data-role="button" href="categ.php" id="hm" rel="external" style="background:#3b5998;color:white;font-size:20px">
<button style="background:#3b5998;border:none;color:#fff;border-radius:0px">Proceed</button></a>

</div>';
}



}


}


}



}}


}
?>