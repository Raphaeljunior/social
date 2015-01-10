<script type="text/javascript">
$(function(){

var x=$(window).width();


if(x<550){
$("i").hide();
}


$(".cancela").click(function(){
$("#not").hide();

});
});

</script>
<?php

include 'allcon.php';
$current=$_POST[user];

$sel="select * from users where Username='$current'";
$checkuser=mysqli_query($con,$sel);
$row=mysqli_fetch_array($checkuser);

if(!empty($_GET[id])){
$y="select * from mentions where userid='$row[ID]' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[inter];

$new=$numm-$oldn;
$a=$new;
if($new>0){
echo '<span>('.$new.')</span>';
}


}




if(!empty($_GET[dir])){
$y="select * from status where  direct like '%$current%' and username!='$current' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[direct];

$new=$numm-$oldn;
$b=$new;
if($new>0){
echo '<span>('.$new.')</span>';
}

}


if(!empty($_GET[act])){
$y="select * from notifications where  usernotified='$current' and Username!='$current' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);


$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[activity];

$new=$numm-$oldn;
$c=$new;
if($new>0){
echo '<span>('.$new.')</span>';
}

}

if(!empty($_GET[chat])){
$y="select * from message where Receiver='$current' ";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);

$hi=mysqli_query($con,"select * from users where Username='$current'");
$old=mysqli_fetch_array($hi);
$oldn=$old[message];

$new=$numm-$oldn;
$d=$new;
if(empty($_GET[not])){

if($new>0){
echo '<span>('.$new.')</span>';
}


}

if(!empty($_GET[not])){
if($new>0){
echo '

<div class="modalDialog" style="opacity:1;background:none">
<center><div style="background:#d2d2d2;border:solid 3px;border-color:#3b5998;margin:20% 10% 10% 10%;width:auto;border-radius:5px;box-shadow:inset 0-1px">
<span><b>You have '.$new.' new messages from chat</b></span><br><br>';

$me=mysqli_query($con,"select * from message where Receiver='$current' order by id desc limit 1");
while($newmes=mysqli_fetch_array($me)){
echo '<span>'.$newmes[Message].' <b> from </b><a href="up.php?with='.$newmes[Sender].'" rel="external">'.$newmes[Sender].'</a></span>';
if($new>1){
$rem=$new-1;
echo '<span> and '.$rem.' other messages</span>';
}


}


echo '<table><tr><td>
<a style="font-size:20px;color:#3b5998" class="metro" href="talk.php" rel="external"><i class="icon-arrow-right-2"></i></a>
</td><td style="width:100px"></td>
<td class="metro" ><a style="font-size:20px;color:#3b5998" href="#" rel="external" class="cancela"><i class="icon-cancel"></i></a></td></tr></table>
</div></center>
</div>';
}
}




}



?>
