<script type="text/javascript">
$("#add").click(function(){
var me=$("input#me").val();
var prev=$("input#dpeople").val();
var cool=$("input#tag").val();
var s=$("textarea#des").val();

$("input#dpeople").val(prev + " " + me);
$("input#tag").val(cool + me);

$("#sug").html("");
$("input#tsinput").val('');
$("input#sinput").val('');
});





</script>

<?php
include 'allcon.php';
$q=mysqli_real_escape_string($con,$_REQUEST['p']);
$get="select * from users where Username like '%$q%' or FirstName like '%$q%' or SecondName like '%$q%' limit 1 ";
$ty=mysqli_query($con,$get);
$users=mysqli_num_rows($ty);

while($result=mysqli_fetch_array($ty)){

echo '<li style="list-style-type:none">
<table><tr><td><img src="profilepics/'.$result[Photo].'" style="border-radius:500px;width:40px;height:40px;border:solid 0.5px;border-color:#000000">
</td><td style="width:200px">'.$result[FirstName].' '.$result[SecondName].'<br><a href="profile.php?user='.$result[Username].'" rel="external">
'.$result[Username].'</a>
<div style="display:none">
<input type="text" id="me" value="'.$result[Username].'">
</div>

</td>
<td>
<a href="" id="add" data-role="button">+ Add</a>
</td></tr></table></li>';

}

?>