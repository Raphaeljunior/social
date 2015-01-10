<script type="text/javascript">
$(function(){

$(".share").click(function(){
var key=$("input#key").val();
var current=$("input#u").val();
var status=$(this).attr("content");

var datastring='cur='+current+'&des='+status+'&key='+key;

$(this).css("color","green");

$.ajax({

type:"POST",
url:"app/posttopic.php",
data:datastring,
success:function(data){

}

});

});


$(".sharephoto").click(function(){
var key=$("input#key").val();
var current=$("input#u").val();
var status=$(this).attr("content");
var x="";
var datastring='cur='+current+'&file='+status+'&status='+x;

$(this).css("color","green");

$.ajax({

type:"POST",
url:"uploadred.php",
data:datastring,
success:function(data){

}

});

});

var x=$(window).width();
if(x<550){
$(".avatar").hide();
$("i").hide();
$("#pc").hide();
$("#mobile").show();
}


});
</script>
<?php

include 'allcon.php';
include 'functions.php';
$cur=$_POST['cur'];
$t=time();
$topicid=md5($_POST[des]).rand();
$you=$_POST[you];




//get users locale

echo '<div style="display:none">
<input type="text" value="'.$cur.'" id="u">
<input type="text" value="'.$_POST[key].'" id="key">
</div>';


$t=$p="select * from message where Receiver='$you' and Sender='$cur' or Receiver='$cur' and Sender='$you' order by id desc LIMIT 25";
$pr=mysqli_query($con,$t);

$id=$_SESSION[id];



while($mes=mysqli_fetch_array($pr)){
$reci=$mes['Receiver'];
$sen=$mes[Sender];
$msg=$mes[Message];

$des=$mes['Message'];

$new=preg_replace('/@([^(@|\s)]+)/','<a style="color:green" data-prefetch rel="external" href="profile.html?user=@$1&cuser='.$cur.'&key='.$_POST[key].'&key='.$POST[key].'">@$1</a>',$des);
$clea=preg_replace('/#([^(#|\s)]+)/','<a rel="external" style="color:green" href="search.html?q=$1&cuser='.$cur.'&key='.$_POST[key].'">#$1</a>',$new);
$pro=preg_replace('/http:([^(http|\s)]+)/','<a rel="external" style="color:blue" href="http://$1">two.pic/'.rand().'</a>',$clea);






echo '<hr>
<div style="background:#fff;width:100%;height:auto">
<a href="profile.php?user='.$sen.'" rel="external" style="color:#3b5998"><b>'.$sen.'</b></a><br>';

if(!empty($mes[media])){
echo '
<div style="background:#d4d4d4;width:100%;min-height:200px">
<img src="sharedmedia/'.$mes[media].'" style="width:100%;height:auto;max-height:300px;max-width:500px;border-radius:4px"></div>';
}else{
echo '<span>'.$pro.'</span><br>';}
showtime($mes[Time]);

if(!empty($mes[media])){
echo '<br><a align="right" href="#" class="sharephoto" content="'.$mes[media].'" style="color:black"> <i class="icon-share"></i>Share photo to your wall</a>';
}else{
echo '<br><a align="right" href="#" class="share" content="'.$msg.'" style="color:black"> <i class="icon-share"></i>Share message to your wall</a>';
}

echo '</div>';


}




?>