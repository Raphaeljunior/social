$(function(){
var user=$("input#u").val();

var datastring='user='+user;
var datastringa='usera='+user;

setTimeout(function(){
var feed=window.localStorage.getItem("feed");
$("#feed").html(feed);
},200);


setInterval(function(){
$.ajax({
url:"appfeed.php?num=x",
type:"POST",
data:datastring,
success:function(data){
window.localStorage.setItem("feed",data);
 $("#feed").html(data);
}
});
},40000);




setTimeout(function(){

$.ajax({

url:"appfeed.php?all=x",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){
window.localStorage.setItem("feed",data); 
$("#feed").html(data);
$("#load").hide();

},

error:function(data){ 

}
});


$.ajax({

url:"trending.php?talk=x",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){
window.localStorage.setItem("trends",data); 
$("#trendfeed").html(data);
$("#load").hide();

},

error:function(data){ 
var ttrend=window.localStorage.getItem("trends");
$("#trendfeed").html(ttrend);
$("#load").hide(); 
}
});
},300);

$("#chang").click(function()
{
$("#cat").slideToggle();
});

$("#showstatus").click(function()
{
$("#st").slideToggle();
});

$("#sbutton").click(function()
{
$("#blow").slideToggle();
});

$("#stag").click(function()
{
$("#tblow").slideToggle();
});


$("#showphoto").click(function()
{
$("#phot").slideToggle();
});


$("#showdirect").click(function()
{
$("#direct").slideToggle();
});



$("#trl").click(function()
{
var cou=$("select#cou").val();
$("#trending").load('trending.php',{"cou":cou});
});

$("#photo").click(function()
{
$("#messages").hide();
$("#pfeed").show();


$("#feed").hide();
setTimeout(function(){

$("#counts").val("1");

$.ajax({

url:"http://twoopic.nanoxcorp.com/app/photo.php?photo=x",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#pfeed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot refresh feed");
$("#load").delay(3000).fadeOut();
}
});

},500);

});


$("#talks").click(function()
{
$("#tfeed").show();

$("#pfeed").hide();
$("#feed").hide();
$("#messages").hide();

$("#counts").val("1");

$.ajax({

url:"appfeed.php?talk=x",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot refresh feed");
$("#load").delay(3000).fadeOut();
}
});




});

$("#all").click(function()
{
$("#messages").hide();
$("#feed").show();


$("#pfeed").hide();




$("#counts").val("1");

$.ajax({

url:"appfeed.php?all=x",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){
window.localStorage.setItem("feed",data); 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot refresh feed");
$("#load").delay(3000).fadeOut();
}
});




});

setTimeout(function(){
$.ajax({

url:"promoted.php",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){
 
$("#sponsored").html(data);
$("#load").hide();

}
});
},2000);





$("#taball").click(function()
{
$("#messages").hide();
$("#feed").show();


$("#pfeed").hide();




$("#counts").val("1");

$.ajax({

url:"appfeed.php?all=x",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
window.localStorage.setItem("feed",data);
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot refresh feed");
$("#load").delay(3000).fadeOut();
}
});




});








$("#news").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=News",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});

$("#ent").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Entertainment",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});


$("#bus").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Business",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});


$("#tech").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Technology",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});

$("#celeb").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Celebrity",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});


$("#spor").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Sports",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});

$("#rel").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Religion",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});


$("#mus").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Music",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});

$("#life").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Lifestyle",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});

$("#hel").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Health",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});



$("#tv").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Tv Show",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});


$("#jobs").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Careers and Jobs",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});

$("#com").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Comedy",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

});

$("#youth").click(function()
{

$("#feed").show();


$("#pfeed").hide();


$("#counts").val("1");

$.ajax({

url:"appfeed.php?cat=Youth",
type:"POST",
data:datastring,
beforeSend:function(){
$("#load").show();
},
success:function(data){ 
$("#feed").html(data);
$("#load").hide();
},

error:function(data){ 
$("#load").html("Cannot load feed");
$("#load").delay(3000).fadeOut();
}
});

}); 


$.ajax({

url:"profilefeed.php?followers=x",
type:"POST",
data:datastringa,
success:function(data){ 
window.localStorage.setItem("followersno",data);
$("#wersno").html(data);

},

error:function(data){ 
var wer=window.localStorage.getItem("followersno");
$("#wersno").html(wer);
}
});

$.ajax({

url:"profilefeed.php?following=x",
type:"POST",
data:datastringa,
success:function(data){
window.localStorage.setItem("followingno",data); 
$("#folno").html(data);
},
error:function(data){
var wing=window.localStorage.getItem("followingno");
$("#folno").html(wing);

}
});




});


