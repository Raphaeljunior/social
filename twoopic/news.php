<?php
session_start();
include 'allcon.php'; 
$me=$_SESSION[current];
$chk=mysqli_query($con,"select * from users where Username='$me'");
$user=mysqli_fetch_array($chk);
if($user[email]==''){
echo '<div style="border:solid 1px;border-radius:5px;width:auto;height:auto;background:#d4d4d4">
<span style="font-size:15px"><b>Hello,'.$me.' ,We need your email address in order for you to be able to recover your password in case you lose it.We will also be sending notifications concerning you to your email</b></span><br>
<a href="editprofile.php" rel="external" style="font-size:15px;color:#3b5998"><b>Edit Profile</b></a>
</div><br>';
}

?>
<script type="text/javascript">

$(function(){
$(".x").click(function(e)
{

});
});
</script>