
<?php 
include 'allcon.php';
?>
<?php 

$type=$_POST['id'];
$userfollowed=$_POST['user'];
$userfollowing=$_POST[cur];

$chk="select * from follow where Userfollowing='$userfollowing' and Userfollowed='$userfollowed'";
$chkk=mysqli_query($con,$chk);






if($type==Follow){
//check if already following;



if(mysqli_num_rows($chkk)==0){
$fol="insert into follow(Userfollowing,Userfollowed)
values('$userfollowing','$userfollowed')";
mysqli_query($con,$fol);

$folx="insert into notifications(Usernotified,type,Username)
values('$userfollowed','follow','$userfollowing')";
mysqli_query($con,$folx);

echo "Following";






}
}

if($type==Following){

$unfol="delete from follow where Userfollowing='$userfollowing' and Userfollowed='$userfollowed'";
$p=mysqli_query($con,$unfol);
echo "Follow";
$folx="insert into notifications(Usernotified,type,Username)
values('$userfollowed','unfollow','$userfollowing')";
mysqli_query($con,$folx);

}

?> 