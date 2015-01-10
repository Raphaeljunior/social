$(function(){
function getUrl(key){
var result=new RegExp(key + "=([^&]*)","").exec(window.location.search);
return result && unescape(result[1])||"";}


var cur=$("input#u").val();

var key=getUrl("key");
var datastring='cur='+cur+'&key='+key;



var datastringa='user='+cur;

$.ajax({

url:"http://twoopic.nanoxcorp.com/app/update.php?chat=x",
type:"POST",
data:datastringa,
success:function(data){ 

}
});



setTimeout(function(){



$.ajax({
type:"POST",
url:"chats.php?id=normal",
data:datastring,
success:function(data){ 

$("#messages").html(data);
},
error:function(){
$("#messages").html("Check Internet Connection");
}
});},500);

setInterval(function(){
$.ajax({

type:"POST",
url:"chats.php?id=normal",
data:datastring,
success:function(data){
window.localStorage.setItem("chats",data); 
$("#messages").html(data);
}

});
},500);


$("#loadw").click(function(){
$(this).hide();
});


$("#dpost").click(function()
{
var des=$("textarea#ddes").val();
var dpeople=$("input#dpeople").val();
var cur=$("input#u").val();
var key=getUrl("key");
var datastring='des='+des+'&dpeople='+dpeople+'&cur='+cur+'&key='+key;

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
url:"message.php?id=normal",
data:datastring,
success:function(data){ 
$("#loadw").show();
$("#load").hide();
$("#mm").html(data);
$("input#dpeople").val('');
$("textarea#ddes").val('');
$("#st").show();
$("#direct").hide();
$.ajax({

type:"POST",
url:"chats.php?id=normal",
data:datastring,
success:function(data){ 
$("#messages").html(data);
}
});














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
$("#result").html("");

}
else{
$("#result").html("Loading...");

$.ajax({

type:"POST",
url:"am.php",
data:datastring,
success:function(data){ 

$("#result").html(data);



}

});

}




});






$("#sbutton").click(function()
{
$("#blow").slideToggle();
});

$("#pub").click(function()
{
$("#st").slideToggle();
$("#direct").hide();
});

$("#dp").click(function()
{
$("#st").hide();
$("#direct").slideToggle();
});






});
