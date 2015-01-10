$(function(){
function getUrl(key){
var result=new RegExp(key + "=([^&]*)","").exec(window.location.search);
return result && unescape(result[1])||"";}






$("#post").click(function()
{
var cur=$("input#u").val();
var key=getUrl("key");
var status=$("input#status").val();
var des=$("textarea#des").val();
var brow=$("input#brow").val();
var datastring='status='+status+'&des='+des+'&cur='+cur+'&key='+key;
if(status==''&des==''){
$("#loadw").show();
$("#mm").html("Please write something");
}else{
$("#loadw").show();
$("#load").show();
$("#mm").html("Updating status...");

$.ajax({

type:"POST",
url:"php/posttopic.php?id=normal",
data:datastring,
success:function(data){ 
$("#loadw").show();
$("#load").hide();
$("#mm").html(data);
$("input#status").val('');
$("textarea#des").val('');


$("#mm").delay(3000).html("");
$("#loadw").delay(2000).fadeOut();
var datastringa='user='+cur;
$.ajax({

url:"appfeed.php?all=x",
type:"POST",
data:datastringa,
success:function(data){ 
window.localStorage.setItem("feed",data); 
$("#feed").html(data);
$("#load").hide();
}
});
},
error:function(){
$("#loadw").show();
$("#load").hide();
$("#mm").html("Check your internet connection");
}

});

}
});

$("#loadw").click(function(){
$(this).hide();
});


$("#dpost").click(function()
{
var status=$("input#dstatus").val();
var des=$("textarea#ddes").val();
var dpeople=$("input#dpeople").val();
var cur=$("input#u").val();
var key=getUrl("key");
var datastring='status='+status+'&des='+des+'&dpeople='+dpeople+'&cur='+cur+'&key='+key;

if(status==''&des==''){
$("#loadw").show();
$("#mm").html("Please write something");
}else{
if(dpeople==''){
$("#loadw").show();
$("#mm").html("Add at least one person");
}else{
$("#loadw").show();
$("#load").show();
$("#mm").html("Sending message to "+dpeople);

$.ajax({

type:"POST",
url:"php/posttopic.php?id=normal",
data:datastring,
success:function(data){ 
$("#loadw").show();
$("#load").hide();
$("#mm").html(data);
$("input#dpeople").val('');
$("input#dstatus").val('');
$("textarea#ddes").val('');
$("#mm").delay(3000).fadeOut();
$("#direct").delay(2000).fadeOut();
},
error:function(){
$("#loadw").show();
$("#load").hide();
$("#mm").html("Check internet connection");
}

});

}

}
});

$("input#sinput").keyup(function()
{
var dpeople=$("input#sinput").val();
var datastring='p='+dpeople;

if(dpeople==''){
$("#resulta").html("");

}
else{
$("#resulta").html("Loading...");

$.ajax({

type:"POST",
url:"auto.php",
data:datastring,
success:function(data){ 

$("#resulta").html(data);



}

});

}




});






$("#sbutton").click(function()
{
$("#blow").slideDown();
});

$("#pub").click(function()
{
$("#st").slideToggle();
$("#direct").hide();
$("#shapho").hide();
});

$("#dp").click(function()
{
$("#st").hide();
$("#shapho").hide();
$("#direct").slideToggle();
});


$("#sp").click(function()
{
$("#st").hide();
$("#direct").hide();
$("#shapho").slideToggle();
});






});
