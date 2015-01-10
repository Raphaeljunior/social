<script type="text/javascript">
$(function(){

$("button").click(function(){
var x=$(this).attr("class");

var cur=$("input#u").val();
var id='Follow';
var user=$(this).attr("user");
var datastring='id='+id+'&user='+user+'&cur='+cur;
$(this).html("<b>Following</b>");
$.ajax({

type:"POST",
url:"followuser.php",
data:datastring,

success:function(data){
var cur=$("input#u").val();
var datastring='user='+cur;
$.ajax({

url:"promoted.php",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){
 
$("#sponsored").html(data);
$("#load").hide();

}
});




}
});

});






});

</script>
<?php
include 'allcon.php';
$user=$_POST[user];


echo '<div style="display:none">
<input type="text" value="'.$user.'" id="u">
</div>';
//get list of users the current user is following







$x="select * from users where Username='$user'";
$xx=mysqli_query($con,$x);
$it=mysqli_fetch_array($xx);
$cat=$it[Category];
$tar=$it[Country];







$xa="select * from promoted where user!='$user'  and (category='$cat' or category='all') and (target='$tar' or target='all') and (status!='pending')order by rand() limit 3";
$xxa=mysqli_query($con,$xa);

if(mysqli_num_rows($xxa)!==0){
echo '<div style="background:#fff;border:solid 1px;border-radius:6px;border-color:#fff"><span style="font-size:18px" class="metro"><i class="icon-rocket" style="color:green"></i> Promoted</span>';



while($pro=mysqli_fetch_array($xxa)){

$xv="select * from users where Username='$pro[user]'";
$xxv=mysqli_query($con,$xv);
$det=mysqli_fetch_array($xxv);

$t=$pro[time];
$now=time();
$diff=$now-$t;
$el=round($diff/60);
$h=round($el/60);
$d=round($h/24);
$w=round($d/7);
$s=$pro[period];


if($w<$s||$w==$s){


echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="metro">
<li style="list-style-type:none;height:40px"><a rel="external" href="profile.php?user='.$det['Username'].'&cuser='.$cuser.'">

<img  STYLE="border-radius:500px;height:40px;width:40px" src="profilepics/'.$det['Photo'].'"></a></li>
</td>
<td valign="top" style="color:black;width:200px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="profile.php?user='.$det[Username].'&cuser='.$cuser.'&key='.$_POST[key].'" rel="external" style="color:black;font-type:"Century Gothic"" class="metro"><b>'.$det[FirstName].' '.$det[SecondName].'</b><br style="color:purple"><i class="icon-rocket" style="color:green"></i>'.$det[Username].'</a>
</td>
<td>';

$s="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]'";
$v=mysqli_query($con,$s);
if($following!==$user){
if(mysqli_num_rows($v)==0){
echo '
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
';

}else{

echo '<a href="thread.php?cuser='.$user.'&with='.$det[Username].'&key='.$_POST[key].'" rel="external"><button user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Message</b></button>';
}
}
echo '</td>
</tr></table>';
}

}
}
echo '</div><br><div style="background:#fff;border:solid 1px;border-radius:6px;border-color:#fff"><span style="font-size:18px" class="metro">Discover These People</span>';




$xaw="select * from users where Username!='$user' and posts > 0 order by rand() limit 5";
$xxaw=mysqli_query($con,$xaw);


while($det=mysqli_fetch_array($xxaw)){


$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' limit 1";
$checkfollo=mysqli_query($con,$isfo);


if(mysqli_num_rows($checkfollo)==0){





echo '
<table style="width:100%;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<tr>
<td style="width:50px" class="metro">
<li style="list-style-type:none;height:40px"><a rel="external" href="profile.php?user='.$det['Username'].'&cuser='.$cuser.'">

<img  STYLE="border-radius:500px;height:40px;width:40px" src="profilepics/'.$det['Photo'].'"></a></li>
</td>
<td valign="top" style="color:black;width:200px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a href="profile.php?user='.$det[Username].'&cuser='.$cuser.'&key='.$_POST[key].'" rel="external" style="color:black;font-type:"Century Gothic"" class="metro"><b>'.$det[FirstName].' '.$det[SecondName].'</b><br style="color:purple">'.$det[Username].'</a>
</td>
<td>';

$s="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]'";
$v=mysqli_query($con,$s);
if($following!==$user){
if(mysqli_num_rows($v)==0){
echo '
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
';

}else{

echo '<a href="thread.php?cuser='.$user.'&with='.$det[Username].'&key='.$_POST[key].'" rel="external"><button user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Message</b></button>';
}
}
echo '</td>
</tr></table>';
}
}
echo '</div>';


?>

