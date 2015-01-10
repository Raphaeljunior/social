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

}
});

});





var x=$(window).width();
if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}




});

</script>
<?php
include 'allcon.php';
$user=$_POST[user];


echo '<div style="display:none">
<input type="text" value="'.$user.'" id="u">
</div>';
//get list of users the current user is following


$isfo="select * from follow where Userfollowing='$user' and Userfollowed!='$user' order by rand()";
$checkfollo=mysqli_query($con,$isfo);
$numfollow=mysqli_num_rows($checkfollo);




if(!empty($_GET[pfollowing])){

while($list=mysqli_fetch_array($checkfollo)){
$following=$list['Userfollowed'];


$e="select * from users where Username='$following'";
$proc=mysqli_query($con,$e);

while($det=mysqli_fetch_array($proc)){
echo '
<table>
<tr>
<td class="avatar">
<li style="list-style-type:none"><a rel="external" href="profile.php?user='.$det['Username'].'">
<img  STYLE="border:solid thin;border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'"></a></li>
</td>
<td valign="top">
<a href="profile.php?user='.$det[Username].'&cuser='.$user.'" rel="external" style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
</tr></table>';
}

}

}




//get list of users followers

$ifo="select * from follow where Userfollowed='$user' and Userfollowing!='$user' order by rand()";
$checkfoll=mysqli_query($con,$ifo);
$numfollowers=mysqli_num_rows($checkfoll);




if(!empty($_GET[pfollowers])){

while($list=mysqli_fetch_array($checkfoll)){
$following=$list['Userfollowing'];


$e="select * from users where Username='$following'";
$proc=mysqli_query($con,$e);

while($det=mysqli_fetch_array($proc)){
echo '
<table>
<tr>
<td class="avatar">
<li style="list-style-type:none">
<img  STYLE="border:solid thin;border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'"></li>
</td>
<td valign="top">
<a href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'" rel="external" style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'</a>
</td>
</tr></table>';
}

}

}




$x="select * from users where Username!='$user' and posts > 0 order by id desc limit 10";
$xx=mysqli_query($con,$x);

if(!empty($_GET[discover])){



echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">
<img  STYLE="border-radius:5px;height:100px;width:100px;border:solid 1px;border-color:#d3d3d3" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:200px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a><br>
<span style="font-size:15px"><b>'.$det[bio].'</b></span><br>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>

</tr></table>

';
}
}

echo '</ul>';
}


if(!empty($_GET[ent])){
$x="select * from users where Username!='$user' and posts > 0 and posts > 0   and Category='Entertainment' order by posts  desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[news])){
$x="select * from users where Username!='$user' and posts > 0   and Category='News' order by posts  desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[bus])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Business' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[tech])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Technology' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[celeb])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Celebrity' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[spor])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Sports' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[rel])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Religion' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[mus])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Music' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[life])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Lifestyle' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[hel])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Health' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[tv])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Tv Show' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[job])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Careers and Jobs' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[com])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Comedy' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}

if(!empty($_GET[youth])){
$x="select * from users where Username!='$user' and posts > 0   and Category='Youth' order by posts desc limit 3";
$xx=mysqli_query($con,$x);

echo '<ul data-role="listview" data-theme="a" >';
while($det=mysqli_fetch_array($xx)){

$isfo="select * from follow where Userfollowing='$user' and Userfollowed='$det[Username]' order by rand()";
$checkfollo=mysqli_query($con,$isfo);



if(mysqli_num_rows($checkfollo)==0){
echo '
<table width:100%><tr><td class="avatar">


<img  STYLE="border-radius:500px;height:50px;width:50px" src="profilepics/'.$det['Photo'].'">
</td>
<td valign="top" style="min-width:100px;width:auto">
<a rel="external" href="profile.php?user='.$det[Username].'&cuser='.$user.'&key='.$_POST[key].'"  style="color:black;font-family:"Century Gothic""><b>'.$det[FirstName].' '.$det[SecondName].'</b><br>'.$det[Username].'
</a></td>
<td>
<button class="Follow" user="'.$det[Username].'" style="border:solid thin;border-color:#fff;background:#3b5998;border-radius:4px;color:#fff;height:25px;width:auto"><b>Follow</b></button>
</td>
</tr></table>

';
}
}

echo '</ul>';
}



$xa="select * from users where Username='$user'";
$xxa=mysqli_query($con,$xa);
$me=mysqli_fetch_array($xxa);
$t=time();

if($_GET[topw]){

$ad=mysqli_query($con,"select * from trending where TIME < $t order by talks limit 6");

while($trends=mysqli_fetch_array($ad)){
$se=ltrim($trends[topicid],'#');
echo '<li style="list-style-type:none">
<table><tr>
<td class="metro">
<i class="icon-fire" style="color:red"></i></td class="avatar">
<td>
<a href="search.php?q='.$se.'&cuser='.$user.'&key='.$_POST[key].'" rel="external" style="color:purple;font-size:15px"><b>'.$trends[topicid].'</b></a>
</td></tr></table></li>';
}
}

if($_GET[topc]){

$ad=mysqli_query($con,"select * from trending where Country='$me[Country]' and   TIME < $t order by talks desc limit 6");

while($trends=mysqli_fetch_array($ad)){
$se=ltrim($trends[topicid],'#');
echo '<li style="list-style-type:none">
<table><tr>
<td class="metro">
<i class="icon-fire" style="color:red"></i></td>
<td>
<a href="search.php?q='.$se.'&cuser='.$user.'&key='.$_POST[key].'" rel="external" style="color:purple;font-size:15px"><b>'.$trends[topicid].'</b></a>
</td></tr></table></li>';
}
}
if($_GET[topl]){

$ad=mysqli_query($con,"select distinct topic from status where topic!='' order by id desc limit 10");

while($trends=mysqli_fetch_array($ad)){
$se=ltrim($trends[topic],'#');
echo '<li style="list-style-type:none">
<table><tr>
<td class="metro">
<i class="icon-fire" style="color:red"></i></td>
<td>
<a href="search.php?q='.$se.'&cuser='.$user.'&key='.$_POST[key].'" rel="external" style="color:purple;font-size:15px"><b>'.$trends[topic].'</b></a>
</td></tr></table></li>';
}


}





?>

