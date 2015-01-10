$(function(){

$("#showstatus").click(function(){
$("#st").slideToggle();
$("#direct").hide();
});



$("#showdirect").click(function(){
$("#direct").slideToggle();
$("#st").hide();
});


$("input#sinput").keyup(function()
{
var dpeople=$("input#sinput").val();
var datastring='p='+dpeople;

if(dpeople==''||dpeople=='@'){
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

$("input#tsinput").keyup(function()
{
var dpeople=$("input#tsinput").val();
var datastring='p='+dpeople;

if(dpeople==''||dpeople=='@'){
$("#resulta").html("");

}
else{
$("#tresult").html("Loading...");

$.ajax({

type:"POST",
url:"auto.php",
data:datastring,
success:function(data){ 

$("#tresult").html(data);
}

});

}
});




$("#sbutton").click(function()
{
$("#blow").slideToggle();
});

$("#stag").click(function()
{
$("#tblow").slideToggle();
});


});