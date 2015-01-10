<!DOCTYPE html> 
<html> 
	<head> 
		<title>About Twoopic</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
<link rel="shortcut icon" href="favicon.png"/>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
<script src="js/promote.js"></script>

        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">
$(function(){





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



var x=$(window).width();
if(x<550){
$(".avatar").hide();
$("i").hide();
$(".pc").hide();
$(".mobile").show();
}


});



</script>
	</head> 
	<body> 
	
		<div data-role="page" data-theme="d">
<div id="not"></div>

<div class="modalDialog" id="loadw" style="display:none">
<div>
<center>
<center><div id="mm" style="color:black"><b>Please wait...</b></div>
<a href="#"  data-role="button"data-mini="true" rel="external" data-inline="false" id="co" style="display:none;background:#3b5998;border:none;color:#fff;border-radius:0px">Continue</a>
</center>
</div>
</div>	
<div data-role="header" data-position="fixed"><h1>About Twoopic</h1></div>




			<div data-role="content">
<center><img src="favicon.png" style="width:200px;height:200px;border-radius:500px"><br>
<span style="font-size:20px"><b>Welcome to Twoopic's about page</b></span><br><br></center>
<span style="font-size:15px"><b>

Twoopic is an online topic-based social networking service that enables people to share content-specific stories either publicly or directly to specific people. Stories are based on topics [hash tags] happening around you and under the question “What’s trending?” Shared stories are categorized into various groups depending on who shares them including news, business, music, entertainment, celebrities, sport, lifestyle among others.<br><br>
Stories are shared under different topics defined by the sharer, making them easily discoverable by others. With that, users can group their stories under different topics as they wish for example [#Programming] then a story is told under [#programming].Various stories can then be shared under the topic [#programming] and Twoopic will group them for you to make them easily discoverable in a reverse chronological order.Other people can also post under a topic started by others.
<br><br>Twoopic takes in the aspect of privacy and allows you to share private messages and private photos. Stories or photos shared privately can be posted to one’s wall directly with a single click to make them public <br><br>
Twoopic aims to be the top solution for all your news enabling you to always be updated. Twoopic is available under the domain http://twoopic.nanoxcorp.com and can be accessed either from pc or mobile devices. Registration is required either to post and view content. Content includes people’s profile and stories and is open to anyone. Users are required to follow other people in order to read their news.<br><br>
Twoopic was created by Dennis Natalia [@natkeezy] a member of Nanoxcorp.Nanoxcorp is a group of young Kenyans innovators whose dreams are IT based.Read more about Nanoxcorp <a href="http://nanoxcorp.com"> here</a> The team at Nanoxcorp comprises Dennis Natalia[@natkeezy],Dalphon Orechi[@dalphjhydraxx], Raphael Junior[@raphnano],Erick Orenge[@dablessedo],Nelson Ouru[@nelsonouru],Livon Dominic[@livon]<br><br>
Twoopic went live on 18th April 2014 under the domain http://twoopic.nanoxcorp.com and has since been recording increase in usage both in user growth and sharing rate.Currently Twoopic has a growth rate of  61.75 users per day.


<br><br>Twoopic
Tell a story differently<br>


</b></span>
<H2>Our contacts</H2>
<span style="font-size:15px"><b>
Dennis Natalia - 0712766208 (Founder/Chief Executive Officer)<br>
Raphael Owino -0719237478 (Chief Software Engineer)<br>
Erick Orenge-0718399464 (Senior Web Developer)<br>
Dalphon Orechi-0716109218 (Head of Operations/Head of Technology)<br>
Perminus Nyamweya -0712332512 (Vice President)<br>
Nelson Ouru-0715324235 (Chief Financial Officer/Head of Business)<br>
Livon Dominic -0702966958 (Products Manager)<br>

</b></span>

</div></div>



		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
        		
	</body>
</html>
