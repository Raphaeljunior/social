<?php 
session_start(); 
if(!isset($_SESSION['current'])){
header('location:index.php');
}
?>
<?php session_start() ?>

<!DOCTYPE html>

<html>
    <head >

        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="Description" content="Twoopic helps you stay up to date with the latest topics around and those trending worldwide.Sign up now to stay updated">
<meta name="Keywords" content="Topic,Twoopic,Trending,Natkeezy,Dennis,Natalia">
<meta name="Language" content="English">
<meta name="Robots" content="All">
<link rel="shortcut icon" href="favicon.png"/>
        <title>Twoopic(People's Stories)</title>
<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
    <script src="js/share.js"></script>
<script src="js/hom.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">

$(function(){
$("#svv").click(function()
{
$("#st").hide();
$("#direct").hide();
$("#shavid").slideToggle();
$("#shapho").hide();
});

$("#sp").click(function()
{
$("#shavid").hide();
});

$("#dp").click(function()
{
$("#shavid").hide();
});

$("#pub").click(function()
{
$("#shavid").hide();
});

$("#postv").click(function()
{
var cur=$("input#u").val();
var status=$("input#vid").val();
var des=$("textarea#vdes").val();

var datastring='vid='+status+'&des='+des+'&cur='+cur;


if(status==''){
$("#loadw").show();
$("#mm").html("Please write something");
}else{
$("#loadw").show();
$("#load").show();
$("#mm").html("Posting video...");

$.ajax({

type:"POST",
url:"php/posttopic.php?id=normal",
data:datastring,
success:function(data){ 
$("#loadw").show();
$("#load").hide();
$("#mm").html("Your video has been shared");
$("input#vid").val('');
$("textarea#vdes").val('');


$("#mm").delay(3000).fadeOut();
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


$.ajax({

type:"POST",
url:"people.php?topl=x",
success:function(data){ 

$("#lc").html(data);
},
error:function(){ 

$("#lc").html("<b>Could not load topic</b>");

}

});




setInterval(function(){
$.ajax({

type:"POST",
url:"people.php?topl=x",
success:function(data){ 

$("#lc").html(data);
},
error:function(){ 

$("#lc").html("<b>Could not load topic</b>");

}

});
},20000);



$.ajax({

type:"POST",
url:"news.php",
success:function(data){ 
$("#news").html(data);
}

});



});
</script>

</head>

<div style="display:none">
<input id="u" value="<?php echo $_SESSION[current]?>">

</div>
<?php include 'header.php';?>

<div id="news"></div>
<table style="width:100%;background:none"><tr>
<td style="width:200px;background:none" valign="top">

<div class="metro" data-role="controlgroup" data-type="vertical">
<ul data-role="listview" data-theme="c">
<li>Me</li>
</ul>
<a id="me" href="profile.php?user=<?php echo $_SESSION[current] ?>" rel="external" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-user" style="font-size:18px;color:#3b5998"></i></td><td><span id="xu" style="font-size:18px"><?php echo $_SESSION[current];?></span></td></tr></table></a>

<a  href="talk.php" rel="external" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-comments-2" style="font-size:18px;color:#3b5998"></i></td><td><span id="xu" style="font-size:18px">Chats</span><b><span style="font-size:18px;color:red"><span id="chatco"></span></b></span></td></tr></table></a>


<ul data-role="listview" data-theme="c">
<li>People</li>
</ul>

<a id="pp" rel="external" href="actions.php" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-search" style="color:#3b5998"></i></td><td style="font-size:18px">Find People</td></tr></table></a>

<a id="folowing" href="following.php?user=<?php echo $_SESSION[current] ?>" rel="external" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-user-2" style="color:#3b5998"></i><i class="icon-user-2" style="color:#4b5998"></td><td style="font-size:18px">Following</td><td><span id="folno" style="font-size:18px">0</span></td></tr></table></a>

<a id="folwers" href="followers.php?user=<?php echo $_SESSION[current] ?>" rel="external" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-user-2" style="color:#3b5998"></i><i class="icon-user-2" style="color:#4b5998"></td><td style="font-size:18px">Followers</td><td><span id="wersno" style="font-size:18px">0</span></td></tr></table></a>


<ul data-role="listview" data-theme="c">
<li>Categories</li>
</ul>
<a id="all" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-newspaper" style="color:red"></i></td><td style="font-size:18px">All News Feed</td></tr></table></a>


<a id="news" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-newspaper" style="color:green"></i></td style="font-size:18px"><td style="font-size:18px">News </td></tr></table></a>

<a id="ent" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-film" style="color:green"></i></td><td style="font-size:18px">Entertainment</td></tr></table></a>

<a id="bus" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-briefcase" style="color:green"></i></td style="font-size:18px"><td style="font-size:18px">Business</td></tr></table></a>

<a id="tech" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-lab" style="color:green"></i></td><td style="font-size:18px">Technology</td></tr></table></a>

<a id="celeb" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-user-2" style="color:green"></i></td style="font-size:18px"><td style="font-size:18px">Celebrity</td></tr></table></a>

<a id="spor" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-support" style="color:green"></i></td><td style="font-size:18px">Sports</td></tr></table></a>

<a id="rel" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-plus" style="color:green"></i></td><td style="font-size:18px">Religion</td></tr></table></a>

<a id="mus" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-headphones" style="color:green"></i></td><td style="font-size:18px">Music</td></tr></table></a>

<a id="life" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-accessibility" style="color:green"></i></td><td style="font-size:18px">Lifestyle</td></tr></table></a>

<a id="hel" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-accessibility-2" style="color:green"></i></td><td style="font-size:18px">Health</td></tr></table></a>

<a id="tv" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-tv" style="color:green"></i></td><td style="font-size:18px">Tv Shows</td></tr></table></a>

<a id="jobs" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-briefcase-2" style="color:green"></i></td><td style="font-size:18px">Jobs</td></tr></table></a>

<a id="com" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-comments-2" style="color:green"></i><i class="icon-user-2" style="color:green"></i></td><td style="font-size:18px">Comedy</td></tr></table></a>

<a id="youth" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-user-3" style="color:green"></i></td><td style="font-size:18px">Youth</td></tr></table></a>

<ul data-role="listview" data-theme="c">
<li>Other Places</li>
</ul>

<a href="promote.php" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-rocket" style="color:red"></i></td><td style="font-size:18px">Promote Yourself</td></tr></table></a>


<a id="rep" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-flag" style="color:black"></i></td><td style="font-size:18px">Report Problem</td></tr></table></a>

<a href="app/terms.php" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"><i class="icon-clipboard-2" style="color:black"></i></td><td style="font-size:18px">Terms of use</td></tr></table></a>

</div>


</td>

<td style="background:#d3d3d3;width:5px"></td>
<td valign="top" style="background:#d3d3d3">

<center><div data-role="navbar" id="x" data-mini="true" style="max-width:500px">
<ul>
					<li><a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="pub" style="border:none;border-radius:5px">Share Public Post</a></li>
					<li><a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="dp" style="border:none">Share Direct Post</a></li>
					<li><a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="sp" style="border:none">Share Photo</a></li>
                                        <li><a href="#" data-role="button" data-mini="true" data-inline="true" data-theme="c" id="svv" style="border:none;border-radius:5px">Share Video</a></li>					
					</ul>
					</div></center>
<span id="mm" style="font-size:14px;color:green"></span><br>
<div id="st" style="display:show;background:#fff;height:auto;border-radius:5px;border:solid 2px;border-color:#fff;max-width:500px" >
<span style="font-size:18px"><b>What's Trending?</b></span><br>
<div class="metro">
<span style="font-size:15px">New hashtag here(Optional)</span>

<div class="input-control text">
<input data-role="none" type="text" placeholder="Topic here #YourStory (Optional)" name="status" id="status" maxlength="50" style="border:solid 1px;border-color:#3b4998;border-radius:5px">
</div>
<span style="font-size:15px">Your Story here</span>
<div class="input-control textarea">
<textarea type="text" data-role="none" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="des" id="des" style="height:auto;border:solid 1px;border-color:#3b4998;border-radius:5px">
</textarea>
</div>
<div id="sug"></div>
<a href="#" id="post" data-role="button"  data-inline="true" data-mini="true" align="right" data-theme="c" style="background:#3b5998;border:none;color:#fff;border-radius:4px">Share Post</a>
<span id="err" style="color:green;font-size:15px;font-family:'Century Gothic'"><b></b></span>
<div style="display:none">
<input data-role="none" type="text" placeholder="Topic here #YourStory (Optional)" name="brow" id="brow" value="'.$_SERVER['HTTP_USER_AGENT'].'">
</div>
</div>
</div>

<div id="direct" style="max-width:500px;display:none;background:#fff;width:auto;height:auto;border-radius:10px" class="metro">

<div id="blow" style="display:show">
<div class="input-control text">
<input style="background:#d4d4d4;border-color:black;border:solid 2px;border-top:none" data-role="none" type="text" placeholder="Search people here" id="sinput">
<button data-role="none" class="btn-search"></button>
</div>
<div id="resulta" ></div>

<div class="input-control text">
<input type="text" data-role="none" placeholder="Added recipients will appear here" name="dpeople" id="dpeople" max="10">
</div>
</div>
<div class="input-control text">
<input data-role="none" type="text" placeholder="Topic here #YourStory (Optional)" name="dstatus" id="dstatus" max="10">
</div>
<div class="input-control textarea">
<textarea data-role="none" type="text" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="ddes" id="ddes" style="height:60px">
</textarea>
</div>
<a href="#" id="dpost" data-role="button"  data-inline="true" data-mini="true" align="right" data-theme="c" style="background:#3b5998;border:none;color:#fff;border-radius:4px">Share</a>
<span id="derr" style="color:green;font-size:15px;font-family:'Century Gothic'"><b></b></span>


</div>

<div id="shavid" style="max-width:500px;display:none;background:#fff;border-radius:5px" class="metro">
<span style="font-size:15px">Paste the Youtube link here and click share</span>
<div class="input-control text">
<input data-role="none" type="text" placeholder="Add your youtube video link here" name="vid" id="vid" style="border:solid 1px;border-color:#3b4998;border-radius:5px">
</div><br>
<span style="font-size:15px">Tell a story about this video</span>
<div class="input-control textarea">
<textarea type="text" data-role="none" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="des" id="vdes" style="height:auto;border:solid 1px;border-color:#3b4998;border-radius:5px">
</textarea>
</div>
<a href="#" id="postv" data-role="button"  data-inline="true" data-mini="true" align="right" data-theme="c" style="background:#3b5998;border:none;color:#fff;border-radius:4px">Share Video</a>
</div>

<div id="shapho" style="max-width:500px;display:none;background:#fff;border-radius:5px">

<form action="upload.php" data-ajax="false" method="post" enctype="multipart/form-data" target="blank">
<span style="font-size:15px">Choose a photo here then click upload</span><br>
<input type="file" name="file">
<input type="submit" value="Upload Photo">
</form>
</div>



<br><div id="feed" style="width:100%"></div>










</td><td style="width:5px;background:#d4d4d4"></td></center>
<td style="width:300px;background:#d3d3d3" valign="top">
<div id="trendfeed" style="width:100%;background:#fff;border-radius:5px">
</div><br>

<div id="sponsored" style="background:none;width:100%">
</div><br>
<div  style="border-radius:5px;background:#fff;width:100%">
<span style="font-size:15px"><b>Latest Topics</b></span>
<div id="lc" style="border-radius:5px;background:#fff;width:100%">
Loading latest topics...
</div></div>
<a href="about.php" rel="external">About Us</a> |
<a href="promote.php" rel="external">Promote Yourself</a> |
<a href="terms.php" rel="external">Terms</a> |
<a href="thread.php?with=@twoopic" rel="external">Report Spam/Problem</a>
</td>


</tr></table></center>





<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
        		

</html>