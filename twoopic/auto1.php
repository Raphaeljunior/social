<?php
session_start();
?>
<script type="text/javascript">
$("#add").click(function(){
var me=$("input#me").val();
var prev=$("input#dpeople").val();
var cool=$("input#tag").val();

$("input#dpeople").val(prev + " " + me);
$("input#tag").val(cool + me);
$("input#tsinput").val('');
$("input#sinput").val('');

});


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

}
});

});


</script>

<?php

include 'allcon.php';
$q=mysqli_real_escape_string($con,trim($_REQUEST['p'],"#"));
$user=$_SESSION[current];


echo '<div style="display:none">
<input type="text" value="'.$user.'" id="u">
</div>';



$gete="select * from users where Username like '%$q%' or FirstName like '%$q%' or SecondName like '%$q%'";
$tye=mysqli_query($con,$gete);
$usern=mysqli_num_rows($tye);

$ya="select * from status where topic like '%$q%'  and direct=''";
$yya=mysqli_query($con,$ya);
$numa=mysqli_num_rows($yya);

$y="select distinct topic from status where topic like '%$q%'  and direct='' and topic!='' order by id desc limit 3";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);


$get="select * from users where Username like '%$q%' or FirstName like '%$q%' or SecondName like '%$q%' limit 3";
$ty=mysqli_query($con,$get);
$users=mysqli_num_rows($ty);

$nam=$usern + $numa;








echo '<div style="background:#fff"><a href="search.php?q='.$q.'&cuser='.$user.'&key='.$_POST[key].'" rel="external"><span style="color:purple;font-size:15px"><b>See All('.$nam.')</b></span></a><br>';


while($result=mysqli_fetch_array($ty)){

echo '<li style="list-style-type:none;border-bottom:solid 1px;border-bottom-color:#d4d4d4">
<table style="background:none"><tr><td><img src="profilepics/'.$result[Photo].'" style="border-radius:500px;width:40px;height:40px;border:none;border-color:#000000">
</td><td style="width:200px;color:black">'.$result[FirstName].' '.$result[SecondName].'<br><a href="profile.php?user='.$result[Username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">
'.$result[Username].'</a>
<div style="display:none">
<input type="text" id="me" value="'.$result[Username].'">
</div>

</td>
<td>';
$yof=mysqli_real_escape_string($con,$result[Username]);
$s="select * from follow where Userfollowing='$user' and Userfollowed='$yof'";
$v=mysqli_query($con,$s);
if($result[Username]!==$user){
if(mysqli_num_rows($v)==0){
echo '
<button class="Follow" user="'.$result[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
';

}else{

echo '<a href="thread.php?cuser='.$user.'&with='.$result[Username].'&key='.$_POST[key].'" rel="external"><button user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Message</b></button>';
}
}
echo '
</tr></table></li>';

}
while($topic=mysqli_fetch_array($yy)){
$n=ltrim($topic[topic],"#");
echo '<li style="list-style-type:none">
<table style="background:none"><tr><td class="metro">
<i class="icon-rocket" style="color:black">
</td><td style="width:250px;color:black">
<div style="color:black;width:250px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
<a rel="external" style="color:black" href="search.php?q='.$n.'&cuser='.$user.'&key='.$_POST[key].'"><b>'.$topic[topic].'</b></a>
</div>
<div style="display:none">
<input type="text" id="me" value="'.$result[Username].'">
</div>

</td>
</tr></table></li>';

}
echo'</div>';
?>