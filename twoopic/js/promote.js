$(function(){






$("#pro").click(function(){
$("#form").slideToggle();
});

$("#term").click(function(){
$("#rt").slideToggle();
});


$("#loadw").click(function(){
$("#loadw").hide();
});

$("#ch").click(function(){
var phone=$("input#phone").val();
var cat=$("select#cat").val();
var cou=$("select#cou").val();
var time=$("select#time").val();

var datastring='phone='+phone+'&cat='+cat+'&time='+time+'&cou='+cou;


if(phone==''||cat=='Choose Category'||cou=='Choose Country'||time=='Choose Period'){

$("#loadw").show();
$("#mm").html("All fields are required");
}else{
$("#loadw").show();
$("#mm").html("Setting up your ad...Please wait");
$.ajax({

url:"ad.php?set=x",
type:"POST",
data:datastring,
success:function(data){ 
$("#loadw").show();
$("#mm").html(data);

},
error:function(data){ 
$("#loadw").show();
$("#mm").html("Error connecting to server");
}
});



}
});





});
