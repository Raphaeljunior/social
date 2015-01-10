<?php
session_start();
$current=$_SESSION[current];
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>My Page</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>

        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">
$(function(){


function getUrl(key){
var result=new RegExp(key + "=([^&]*)","").exec(window.location.search);
return result && unescape(result[1])||"";}

var key=getUrl("key");
var current=$("input#user").val();
var datastring='user='+current+'&key='+key;



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




$.ajax({

type:"POST",
url:"people.php?discover=x",
data:datastring,
success:function(data){ 

$("#feedd").html(data);
},
error:function(){ 

$("#feedd").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?news=x",
data:datastring,
success:function(data){ 

$("#news").html(data);
},
error:function(){ 

$("#news").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?ent=x",
data:datastring,
success:function(data){ 

$("#ent").html(data);
},
error:function(){ 

$("#ent").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?bus=x",
data:datastring,
success:function(data){ 

$("#bus").html(data);
},
error:function(){ 

$("#bus").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?tech=x",
data:datastring,
success:function(data){ 

$("#tech").html(data);
},
error:function(){ 

$("#tech").html("Could not load people");

}

});


$.ajax({

type:"POST",
url:"people.php?celeb=x",
data:datastring,
success:function(data){ 

$("#celeb").html(data);
},
error:function(){ 

$("#celeb").html("Could not load people");

}

});


$.ajax({

type:"POST",
url:"people.php?spor=x",
data:datastring,
success:function(data){ 

$("#spor").html(data);
},
error:function(){ 

$("#spor").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?rel=x",
data:datastring,
success:function(data){ 

$("#rel").html(data);
},
error:function(){ 

$("#rel").html("Could not load people");

}

});


$.ajax({

type:"POST",
url:"people.php?mus=x",
data:datastring,
success:function(data){ 

$("#mus").html(data);
},
error:function(){ 

$("#mus").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?life=x",
data:datastring,
success:function(data){ 

$("#life").html(data);
},
error:function(){ 

$("#life").html("Could not load people");

}

});


$.ajax({

type:"POST",
url:"people.php?tv=x",
data:datastring,
success:function(data){ 

$("#tv").html(data);
},
error:function(){ 

$("#tv").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?job=x",
data:datastring,
success:function(data){ 

$("#job").html(data);
},
error:function(){ 

$("#job").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?com=x",
data:datastring,
success:function(data){ 

$("#com").html(data);
},
error:function(){ 

$("#com").html("Could not load people");

}

});

$.ajax({

type:"POST",
url:"people.php?youth=x",
data:datastring,
success:function(data){ 

$("#youth").html(data);
},
error:function(){ 

$("#youth").html("Could not load people");

}

});


$.ajax({

type:"POST",
url:"people.php?hel=x",
data:datastring,
success:function(data){ 

$("#hel").html(data);
},
error:function(){ 

$("#hel").html("Could not load people");

}

});


$.ajax({

type:"POST",
url:"people.php?topw=x",
data:datastring,
success:function(data){ 

$("#hw").html(data);
},
error:function(){ 

$("#hw").html("Could not load topic");

}

});

$.ajax({

type:"POST",
url:"people.php?topc=x",
data:datastring,
success:function(data){ 

$("#hc").html(data);
},
error:function(){ 

$("#hc").html("Could not load topic");

}

});





$("#n").click(function(){
$("#feedn").slideDown();
$("#feedp").hide();
$("#dd").hide();
});

$("#p").click(function(){
$("#feedn").hide();
$("#dd").hide();
$("#feedp").slideDown();
});


$("#da").click(function(){
$("#feedn").hide();
$("#feedp").hide();
$("#dd").slideDown();
});



});



</script>
	</head> 
	<body> 
	
		<div data-role="page" data-theme="d">
<?php

echo'<div style="display:none">
<input type="text" value="'.$current.'" id="user">
</div>';?>
			<div data-role="header" data-position="fixed" style="height:60px;background:#3b5998;border-bottom-color:#fff" data-theme="a">
<h1 class="metro" style="color:white">Explore Twoopic <?php echo $current?></h1>
<a href="mhome.php"  rel="external" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" style="border:none;background:#d3d3d3;color:#fff">Home</a>		
<a href="profile.php?user=<?php echo $current ?>"  rel="external" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" style="border:none;background:#d3d3d3;color:#fff">Edit Your Profile</a>		
<div data-role="navbar" id="x" style="background:#3b5998">
<ul>
<li style="list-style-type:none"><a href="#"  id="da" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" style="border:none;color:#fff">Discover People</a></li>					
<li style="list-style-type:none"><a href="#" id="p" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" style="border:none;color:#fff">Categories</a></li>
<li style="list-style-type:none"><a href="#" id="n" data-role="button" data-mini="true" data-inline="true" data-theme="c" class="metro" style="border:none;color:#fff">Discover Topics</a></li>

</ul></div>
</div>		

			<div data-role="content">
<center><br></center>
<center><span id="load" class="metro" style="font-size:15px;color:blue;display:none"><i class="icon-record"></i></span></center>
<div style="display:none"><input type="text" id="counts" value="1"></div>		

<div id="feedp" style="width:100%;display:none">

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>News</b></span>
<div id="news" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Entertainment</b></span>
<div id="ent" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Business</b></span>
<div id="bus" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Technology</b></span>
<div id="tech" style="width:100%">

</div>
</li>


<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Celebrity</b></span>
<div id="celeb" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Sports</b></span>
<div id="spor" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Religion</b></span>
<div id="rel" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Music</b></span>
<div id="mus" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Lifestyle</b></span>
<div id="life" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Health</b></span>
<div id="hel" style="width:100%">

</div>
</li>


<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Tv Show</b></span>
<div id="tv" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Jobs and Careers</b></span>
<div id="job" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Comedy</b></span>
<div id="com" style="width:100%">

</div>
</li>


<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Youth</b></span>
<div id="youth" style="width:100%">

</div>
</li>




</div>

<div id="feedn" style="width:100%;display:none">



<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Hot Worldwide</b></span>
<div id="hw" style="width:100%">

</div>
</li>

<li style="list-style-type:none;border-bottom:solid thin;border-bottom-color:#d3d3d3;height:auto">
<span style="font-size:15px"><b>Hot in my country</b></span>
<div id="hc" style="width:100%">

</div>
</li>




</div>

<div id="dd" style="width:100%;display:show;background:none">
<span style="font-size:15px"><b>Discover these people</b></span>
<div id="feedd">

</div>
</div>

</div>	
			

		<div data-role="footer" data-position="fixed" data-theme="c" data-tap-toggle="false">

				<div data-role="navbar" id="x">
<ul>
					<li></li>
</ul></div>
			</div>

		</div>


<div data-role="page" data-theme="b" id="trends">


</div>


		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
        		
	</body>
</html>
