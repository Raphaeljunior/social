<?php session_start();?>

<script type="text/javascript">
$(function(){

var x=$(window).width();

$("input#wid").val(x);

if(x<550){
$("#pc").hide();
$("#mobile").show();
$("i").hide();
}else{
$("#pc").show();
$("#mobile").hide();

}





var me=$("input#usc").val();
var datastringe='user='+me;


$.ajax({

url:"counters.php?id=inter",
type:"POST",
data:datastringe,
success:function(data){ 
$("#tags").html(data);
$("#mtags").html(data);
}
});

$.ajax({

url:"counters.php?dir=x",
type:"POST",
data:datastringe,
success:function(data){ 
$("#dir").html(data);
$("#mdir").html(data);

}

});

$.ajax({

url:"counters.php?act=inter",
type:"POST",
data:datastringe,
success:function(data){ 
$("#act").html(data);
$("#mact").html(data);
}

});

$.ajax({

url:"counters.php?chat=x",
type:"POST",
data:datastringe,
success:function(data){ 
$("#chatco").html(data);
$("#mchatco").html(data);
}

});





setInterval(function(){


$.ajax({

url:"counters.php?id=inter",
type:"POST",
data:datastringe,
success:function(data){ 
$("#tags").html(data);
$("#mtags").html(data);
}
});




$.ajax({

url:"counters.php?dir=x",
type:"POST",
data:datastringe,
success:function(data){ 
$("#dir").html(data);
$("#mdir").html(data);

}

});

$.ajax({

url:"counters.php?act=inter",
type:"POST",
data:datastringe,
success:function(data){ 
$("#act").html(data);
$("#mact").html(data);
}

});

$.ajax({

url:"counters.php?chat=x",
type:"POST",
data:datastringe,
success:function(data){ 
$("#chatco").html(data);
$("#mchatco").html(data);
}

});


},2000);

setInterval(function(){
$.ajax({

url:"counters.php?chat=x&not=x",
type:"POST",
data:datastringe,
success:function(data){ 
$("#not").html(data);

}

});
},5000);


setInterval(function(){
$.ajax({

url:"c.php",
success:function(data){ 
if(data!==''){
$(document).attr("title",data);}
}
});
},5000);






$("#go").click(function()
{
var qu=$("input#mquery").val();

if(qu!==''){

$("#body").load('search.php',{"q":qu});}
});




$("#feed").click(function()
{
$("#body").load('home.php');
});

$("#dir").click(function()
{


$("#body").load('direct.php');
});



$("input#query").keyup(function()
{
var query=$("input#query").val();
var datastring='p='+query;



if(query==''||query=='@'||query=='#'){
$("#result").html("");
$("#result").hide();
}
else{
$.ajax({

type:"POST",
url:"auto1.php",
data:datastring,
success:function(data){ 
$("#result").show();
$("#result").html(data);



}

});

}




});


$("#pr").click(function()
{
$("#mn").slideToggle();
});

$("#sm").click(function()
{
$("#body").load('home.php');
});


});

</script>
<?php
include 'allcon.php';

$user=$_SESSION['current'];
$sel="select * from users where Username='$user' limit 1";
$checkuser=mysqli_query($con,$sel);
$row=mysqli_fetch_array($checkuser);
$photo=$row['Photo'];
$fname=$row['FirstName'];
$sname=$row['SecondName'];

?>
<?php

echo '<div data-ajax="false" data-theme="a" data-role="header" id="pc" data-position="fixed" style="background:#000000;height:40px" data-tap-toggle="false">

<div style="display:none">
<input type="text" id="usc" value="'.$_SESSION[current].'">
<input type="text" id="cov" >
</div>


<table  style="background:none;width:100%" class="metro"><tr>
<td valign="top"><a align="center" href="home.php" rel="external" style="color:white"><img src="icon.png" style="height:35px;width:35px">
Twoopic</a>
</td>
<td valign="top"><a align="center" href="home.php" rel="external" style="color:white;font-size:14px">
<i class="icon-home"></i> Home<span  style="font-size:18px;color:red"><sup ></sup></span></a>
</td>
<td valign="top">
<a href="interactions.php?id=z" rel="external" style="color:white">
<i class="icon-tag">  </i> Interactions<span  style="font-size:18px;color:red"><sup id="tags"></sup></span>
</a></td>
<td valign="top">
<a href="activity.php" rel="external"  style="color:white">
<i  class="icon-alarm"> </i> Activity<span  style="font-size:18px;color:red"><sup id="act"></sup></span>
</a><td>
<td valign="top">
<a href="direct.php" rel="external" style="color:white">
<i  class="icon-comments-5"></i> Direct Posts<span style="font-size:18px;color:red"><sup id="dir"></sup></span>
</a></td>
<td valign="top">';

?>

<?php
if(isset($_SESSION['current'])){
 echo '<img src="profilepics/'.$photo.'" style="border-radius:500px;width:35px;height:35px">
<a rel="external" align="right" href="#"  data-inline="true" id="pr" style="border:none;border-radius:0px;background:#000000;color:white"><b>'.$_SESSION['current'].'</b></a>';}
echo '
<div id="mn" style="background:#fff;border-radius:5px;height:auto;border:solid 3px;display:none;border-color:#3b5998">
<li style="list-style-type:none;height:30px;border-bottom:solid 0.5px;border-bottom-color:#fff">
<a rel="external" href="profile.php?user='.$_SESSION[current].'" style="color:black;font-size:15px">Profile</a></li>
<li style="list-style-type:none;height:30px;border-bottom:solid 0.5px;border-bottom-color:#fff">
<a rel="external" href="promote.php" style="color:black;font-size:15px">Promote Yourself</a></li>
<li style="list-style-type:none;height:30px;border-bottom:solid 0.5px;border-bottom-color:#fff">
<a rel="external" href="logout.php" style="color:black;font-size:15px;background:#fff;border:none;border-radius:0px" >Log Out</a></li>


</div>


</td>
<td valign="top" class="metro">
<div class="input-control text" style="background:none">
<input type="text" data-role="none" data-theme="c" style="border-radius:4px;width:100%" placeholder="Search people and topics here" id="query"><div>
<div id="result" style="display:none;background:#d3d3d3;border-radius:5px;border:solid 5px;border-color:#3b5998;max-width:350px"></div>
</td>


</tr></table>

</div>
<div id="not"></div>

<div data-ajax="false" data-theme="a" data-role="header" id="mobile" data-position="fixed" style="display:none;background:#3b5998;height:auto" data-tap-toggle="false">

<span><a rel="external" href="mhome.php" data-role="none" style="color:#fff">Home</a></span>
<span><a rel="external" href="interactions.php" data-role="none" style="color:#fff">Interactions<span  style="font-size:15px;color:white"><span id="mtags" style="color:orange"></span></a></span>
<span><a rel="external" href="activity.php" data-role="none" style="color:#fff">Activity<span  style="font-size:15px;color:white"><span id="mact" style="color:orange"></span></a></span>
<span><a rel="external" href="direct.php" data-role="none" style="color:#fff">Direct<span  style="font-size:15px;color:white"><span id="mdir" style="color:orange"></span></a></span>
<span><a rel="external" href="talk.php" data-role="none" style="color:#fff">Chats<span  style="font-size:15px;color:white"><span id="mchatco" style="color:orange"></span></a></span>
<span><a rel="external" href="profile.php?user='.$_SESSION[current].'" data-role="none" style="color:#fff">Profile</a></span>
<div style="width:100%">
<form action="search.php" method="GET" data-ajax="false">
<input type="text" data-role="none" data-theme="c" style="border-radius:0px;width:70%;border:solid 1px;height:30px" placeholder="Search people and topics here" id="mquery" name="q">
<input type="submit" value="Search" data-role="none" style="background:#fff;color:black;border:none;height:30px">
<div style="display:none">
<input type="text" name="type" value="mobile">
</div>

</form>
</div>
</div>


';?>