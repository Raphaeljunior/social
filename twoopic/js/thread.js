$(function(){
function getUrl(key){
var result=new RegExp(key + "=([^&]*)","").exec(window.location.search);
return result && unescape(result[1])||"";}


var user=$("input#u").val();
var key=getUrl("key");
var you=getUrl("with");
$("input#dpeople").val(you);
var datastring='cur='+user+'&key='+key+'&you='+you;

var x=$(window).width();
if(x<550){

$.ajax({

type:"POST",
url:"msthread.php?id=normal",
data:datastring,
success:function(data){ 
$("#messages").html(data);
},
error:function(){

$("#messages").html("Error connecting to server");
}

});
}else{

$.ajax({

type:"POST",
url:"sthread.php?id=normal",
data:datastring,
success:function(data){ 
$("#messages").html(data);
},
error:function(){

$("#messages").html("Error connecting to server");
}

});

setInterval(function(){
$.ajax({

type:"POST",
url:"sthread.php?id=normal",
data:datastring,
success:function(data){ 
window.localStorage.setItem(you,data);
$("#messages").html(data);
}

});},500);

}
$("#loadw").click(function(){
$(this).hide();
});


$("#dmpost").click(function()
{
var des=$(".msg").val();

var dpeople=$("input#dpeople").val();
var cur=$("input#u").val();
var datastring='des='+des+'&dpeople='+dpeople+'&cur='+cur+'&you='+you;
if(status==''&des==''){
$("#loadw").show();
$("#mm").html("Please write something");
}else{
$("#xx").html("Sending message");
$.ajax({

type:"POST",
url:"message.php?id=normal",
data:datastring,
success:function(data){ 
$("#xx").html("Sent");
$("#xx").delay(2000).html(you);
$("input#dpeople").val(you);
$("#ddes").val('');

var datastring='cur='+user+'&key='+key+'&you='+you;

if(x<550){

$.ajax({

type:"POST",
url:"msthread.php?id=normal",
data:datastring,
success:function(data){ 
$("#messages").html(data);
}
});
}else{
$.ajax({

type:"POST",
url:"sthread.php?id=normal",
data:datastring,
success:function(data){ 
$("#messages").html(data);
$("#real").html("");

}
});
}
},
error:function(){
$("#xx").html(you);
$("#loadw").show();
$("#mm").html("Message not sent.Check network settings");

}

});

}
});



$("#dpost").click(function()
{
var des=$("input#ddes").val();

var dpeople=$("input#dpeople").val();
var cur=$("input#u").val();
var datastring='des='+des+'&dpeople='+dpeople+'&cur='+cur+'&you='+you;
if(status==''&des==''){
$("#loadw").show();
$("#mm").html("Please write something");
}else{
$("#xx").html("Sending message");
$.ajax({

type:"POST",
url:"message.php?id=normal",
data:datastring,
success:function(data){ 
$("#xx").html("Sent");
$("#xx").delay(2000).html(you);
$("input#dpeople").val(you);
$("#ddes").val('');

var datastring='cur='+user+'&key='+key+'&you='+you;

if(x<550){

$.ajax({

type:"POST",
url:"msthread.php?id=normal",
data:datastring,
success:function(data){ 
$("#messages").html(data);
}
});
}else{
$.ajax({

type:"POST",
url:"sthread.php?id=normal",
data:datastring,
success:function(data){ 
$("#messages").html(data);
$("#real").html("");

}
});
}
},
error:function(){
$("#xx").html(you);
$("#loadw").show();
$("#mm").html("Message not sent.Check network settings");

}

});

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


$("input#ddes").keyup(function()
{
var des=$("input#ddes").val();
var dpeople=$("input#dpeople").val();
var cur=getUrl("user");
var key=getUrl("key");
var datastring='des='+des+'&dpeople='+dpeople;

if(des!==''){

$.ajax({

type:"POST",
url:"state.php?typing=x",
data:datastring,
success:function(data){

}

});

}

if(des==''){

$.ajax({

type:"POST",
url:"http://twoopic.nanoxcorp.com/app/state.php?complete=x",
data:datastring,
success:function(data){

}

});

}


});



setInterval(function(){
$.ajax({

type:"POST",
url:"http://twoopic.nanoxcorp.com/app/chats.php?real=normal",
data:datastring,
success:function(data){

$("#real").html(data);
}

});
},500);


setInterval(function(){
$.ajax({

type:"POST",
url:"chats.php?real=normal",
data:datastring,
success:function(data){ 
$("#ns").html(data);
}

});},500);




});
