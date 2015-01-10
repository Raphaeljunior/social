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
</script>

<?php
include 'allcon.php';
$q=$_REQUEST['p'];
$user=$_POST[user];
$gete="select * from users where Username like '%$q%' or FirstName like '%$q%' or SecondName like '%$q%'";
$tye=mysqli_query($con,$gete);
$usern=mysqli_num_rows($tye);

$ya="select * from status where topic like '%$q%'  and direct=''";
$yya=mysqli_query($con,$ya);
$numa=mysqli_num_rows($yya);

$y="select * from status where topic like '%$q%'  and direct='' order by id desc limit 3";
$yy=mysqli_query($con,$y);
$numm=mysqli_num_rows($yy);


$get="select * from users where Username like '%$q%' or FirstName like '%$q%' or SecondName like '%$q%' limit 3";
$ty=mysqli_query($con,$get);
$users=mysqli_num_rows($ty);

$nam=$usern + $numa;








echo '<a href="search.html?q='.$q.'&cuser='.$user.'&key='.$_POST[key].'" rel="external"><span style="color:purple;font-size:15px"><b>See All('.$nam.')</b></span></a><br><br> ';


while($result=mysqli_fetch_array($ty)){

echo '<li style="list-style-type:none">
<table><tr><td><img src="http://twoopic.nanoxcorp.com/profilepics/'.$result[Photo].'" style="border-radius:500px;width:50px;height:50px;border:none;border-color:#000000">
</td><td style="width:200px">'.$result[FirstName].' '.$result[SecondName].'<br><a href="profile.html?user='.$result[Username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external">
'.$result[Username].'</a>
<div style="display:none">
<input type="text" id="me" value="'.$result[Username].'">
</div>

</td>
</tr></table></li>';

}

while($topic=mysqli_fetch_array($yy)){
$n=ltrim($topic[topic],"#");
echo '<li style="list-style-type:none">
<table><tr><td class="metro">
<i class="icon-rocket">
</td><td style="width:200px"><a rel="external" href="search.html?q='.$n.'&cuser='.$user.'&key='.$_POST[key].'">'.$topic[topic].'</a>
<div style="display:none">
<input type="text" id="me" value="'.$result[Username].'">
</div>

</td>
</tr></table></li>';

}

?>