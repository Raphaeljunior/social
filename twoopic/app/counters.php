<script type="text/javascript">
$(function(){


$(".cancela").click(function(){
$("#not").hide();

});
});

</script>

<?php

include 'allcon.php';
$current=$_POST[user];

if(!empty($_GET[id])){
$y="select * from status where  tags like '%$current%' or description like '%$current%' or talk like '%$current%'  and direct=''";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[inter];

$new=$numm-$oldn;
echo $new;
}




if(!empty($_GET[dir])){
$y="select * from status where  direct like '%$current%' and username!='$current' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[direct];

$new=$numm-$oldn;
echo $new;

}


if(!empty($_GET[act])){
$y="select * from notifications where  usernotified='$current' and Username!='$current' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);


$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[activity];

$new=$numm-$oldn;
echo $new;

}

if(!empty($_GET[chat])){
$y="select * from message where Receiver='$current' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[message];

$new=$numm-$oldn;
if(empty($_GET[not])){
echo $new;
}

if(!empty($_GET[not])){
if($new>0){
echo '
<embed src="new.mp3" style="height:0;width:0">
</embed>
<div class="modalDialog" style="opacity:1;background:none">
<center><div style="background:#d2d2d2;border:solid 3px;border-color:#3b5998;margin:20% 10% 10% 10%;width:auto;border-radius:5px;box-shadow:inset 0-1px">
<span><b>You have '.$new.' new messages from chat</b></span><br><br>';

$me=mysqli_query($con,"select * from message where Receiver='$current' order by id desc limit 1");
while($newmes=mysqli_fetch_array($me)){
echo '<span>"<i>'.$newmes[Message].'</i>" <b> from </b><a href="profile.html?user='.$newmes[Sender].'&cuser='.$current.'&key='.$_POST[key].'" rel="external">'.$newmes[Sender].'</a></span>';
if($new>1){
$rem=$new-1;
echo '<span> and '.$rem.' other messages</span>';
}


}


echo '<table><tr><td>
<a style="font-size:20px;color:#3b5998" class="metro" href="message.html?user='.$current.'&key='.$_POST[key].'" rel="external"><i class="icon-arrow-right-2"></i></a>
</td><td style="width:100px"></td>
<td class="metro" ><a style="font-size:20px;color:#3b5998" href="#" rel="external" class="cancela"><i class="icon-cancel"></i></a></td></tr></table>
</div></center>
</div>';
}
}




}





?>