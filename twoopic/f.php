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







$username=$_POST[user];

if(!empty($_GET[cat])){

$email=mysqli_real_escape_string($con,$_POST[email]);
$mail= spamcheck($email);
if ($mail==TRUE){
$em=mysqli_query($con,"select * from users where email='$email' and Username='$username'");
if(mysqli_num_rows($em)!==0){ 
$password=rand(0,1000);

$subject="Password Recovery";
$message='Hi, '.$username.' Your new password is '.$password.' Follow this link to login <a href ="http://twoopic.nanoxcorp.com You can change it anytime" >http://twoopic.nanoxcorp.com</a>';
$from = "twoopicinc@gmail.com";
$c=mail($email,$subject,$message,$from);

if($c==true){
echo '<b>A email has been sent to you ('.$email.') with your new password.Open your email for confirmation</b><br>
<form data-ajax="false" method="post" action="fg.php">
<div style="display:none">
<input data-role="none" type="text" placeholder="Your email here" name="user" value="'.$username.'" style="border:solid 1px;border-color:#3b4998;border-radius:5px">
<input data-role="none" type="text" placeholder="Your email here" name="password" value="'.$password.'" style="border:solid 1px;border-color:#3b4998;border-radius:5px">
</div>
<span style="font-size:15px"><b>Please enter the new code sent to you</b></span>
<div class="metro">
<div class="input-control text">
<input data-role="none" type="text" placeholder="Your code here" name="code" style="border:solid 1px;border-color:#3b4998;border-radius:5px">
</div>
<input type="submit" style="border:none;background:#3b5998;border-radius:5px;color:#fff" value="Proceed">
</form>
';
}else{
echo '<b>Email not sent to '.$email.' Please try again later.Either email does not exist or connection problem</b>';
}

}else{
echo '<b>Wrong Username and Email match</b>';
}

} else {
echo "Invalid email address";
}

}
}
?>