$(function(){
var x=$(window).width();
if(x<550){
$("#pc").hide();
$("#mobile").show();
}else{
$("#pc").show();
$("#mobile").hide();
}

$("#sasa").click(function(){
$("#sin").show();
$("#lg").hide();

});

$("#sasg").click(function(){
$("#sin").hide();
$("#lg").show();

});

$("#button").click(function()
{

var uname=$("input#uname").val();
var password=$("input#password").val();
var datastring='uname='+uname+'&password='+password;
if(uname==''||password==''){
$("#loadw").show();
$("#hm").hide();
$("#cv").hide();
$("#mm").html("All fields are required");
}else{
$("#hm").hide();
$("#cv").hide();
$("#loadw").hide();

$.ajax({

type:"POST",
url:"php/login.php?new=x",
data:datastring,
success:function(data){ 
window.localStorage.clear();
$("input#st").val(data);
var status=$("input#st").val();
if(status=='ok'){
window.location.assign("home.php");
}else{
$("#fp").delay(3000).slideDown();
$("input#xn").val(uname);
$("#loadw").show();
$("#load").hide();
$("#mm").html(data);
}


},
error:function(){
$("#loadw").show();
$("#load").hide();
$("#hm").hide();
$("#cv").hide();
$("#mm").html("Check your internet connection");
}


});

}
});









$("#signup").click(function()
{
window.localStorage.clear();
var fname=$("input#fname").val();
var sname=$("input#lname").val();
var uname=$("input#suname").val();
var password=$("input#spass").val();
var cpass=$("input#scpass").val();
var cou=$("select#cou").val();
var datastring='fname='+fname+'&lname='+sname+'&uname='+uname+'&password='+password+'&country='+cou;
$("#hm").hide();
$("#cv").hide();

if(fname==''||sname==''||uname==''||password==''||cpass==''||cou=="Choose Country"){
$("#loadw").show();
$("#mm").html("All fields required");
}else{
if(password!==cpass){
$("#loadw").show();
$("#mm").html("Passwords do not match");
}else{
if(uname.length>30){
$("#loadw").show();
$("#mm").html("Username must be less than 30 characters");
}else{
$("#loadw").show();
$("#load").show();
$("#mm").html("Creating account...Please wait");
$.ajax({

type:"POST",
url:"php/signup.php",
data:datastring,
success:function(data){ 
$("#load").hide();
$("#mm").html(data);
window.localStorage.clear();
},
error:function(){
$("#loadw").show();
$("#load").hide();
$("#mm").html("Check your internet connection");

}

});
}
}
}
});




$("#lyn").click(function(){
$("#ctr").attr("data-role","none");
$("#lyn").hide();
$("#mj").hide();
$("#syn").show();
$("#create").hide();
$("#ic").hide();
$("#img").slideDown();
$("#log").slideDown();

});




$("#al").click(function(){
window.open("myapp//com.twitter.com");

});





$("#syn").click(function(){
$("#mj").hide();
$("#syn").hide();
$("#lyn").show();
$("#create").slideDown();
$("#ic").hide();
$("#img").slideUp();
$("#log").hide();
});

$("#counts").val("1");

setInterval(function(){

var val=$("#counts").val();

if(val=='0'){

$("#counts").val("1");
$("#load").html("<i class='icon-record'></i>");
}


if(val=='1'){

$("#counts").val("2");
$("#load").html("<i class='icon-record'></i><i class='icon-record'></i>");

}

if(val=='2'){

$("#counts").val("3");
$("#load").html("<i class='icon-record'></i><i class='icon-record'></i><i class='icon-record'></i>");

}

if(val=='3'){

$("#counts").val("4");
$("#load").html("<i class='icon-record'></i><i class='icon-record'></i><i class='icon-record'></i><i class='icon-record'></i>");

}



if(val=='4'){

$("#counts").val("0");

}

},700);


$("#loadw").click(function(){
$(this).hide();
});


$(document).on("pageinit","#actions",function(){

var user=sessionStorage.name;

$("#c").html("Hi,"+user);
$("#pic").attr("href","http://twoopic.nanoxcorp.com/apppic.php?user="+user);
$("#cov").attr("href","http://twoopic.nanoxcorp.com/appcover.php?user="+user);
$("#home").attr("href","home.html?user="+user);
$("#pp").attr("href","people.html?user="+user);
$("#sh").attr("href","share.html?user="+user);


});


});



