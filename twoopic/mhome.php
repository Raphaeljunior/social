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
        <title>Twoopic</title>
<link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
<link rel="stylesheet" href="css/slicknav.css" />
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/metro-bootstrap.css">
        <script src="js/jquery/jquery.min.js"></script>
    <script src="js/share.js"></script>
<script src="js/mhom.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>
<script type="text/javascript">

$(function(){

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
<body style="background:#d4d4d4">
<?php include 'header.php';?>
<div id="news"></div>
<div style="display:none">
<input id="u" value="<?php echo $_SESSION[current]?>">

</div>
<div style="background:#d3d3d3;margin:2px">


<span id="mm" style="font-size:14px;color:red"></span>
<div id="st" style="display:show;background:#fff;height:auto" class="metro">
<span style="color:#3b5998"><b>What's Trending...</b></span>
<form action="posttopic.php?mobile=x" method="post" data-ajax="false">
<span style="color:#3b5998">New Hashtag here(Optional)</span><br>
<input data-role="none" type="text" style="border-style:none;border-top:none;border-color:black;border:solid 1px;height:30px;width:100%" placeholder="Topic here #YourStory (Optional)" name="status" id="status" maxlength="50">
<br>
<span style="color:#3b5998">Story here</span><br>
<textarea type="text" style="border-style:none;border-top:none;border-color:black;border:solid 1px;height:auto;width:100%" data-role="none" placeholder="Add description here.Tag people with the @myfriend and include other topics with the #OtherStory" name="des" id="des" style="height:60px">
</textarea>

<br><input type="submit" style="background:#3b5998;border:none;color:#fff;border-radius:0px;height:30px;width:auto" data-role="none" value="Share">
</form>
<span id="err" style="color:green;font-size:15px;font-family:'Century Gothic'"><b></b></span>
<div style="display:none">
<input data-role="none" type="text" placeholder="Topic here #YourStory (Optional)" name="brow" id="brow" value="'.$_SERVER['HTTP_USER_AGENT'].'">
</div>
<a href="directshare.php" rel="external"><span><b>Share direct post</b></span></a><span style="color:black">  or  </span><a href="photoshare.php" rel="external"><span><b>Share photo</b></span></a>


</div>


<div id="trendfeed" style="width:100%">
</div>

<br><div id="sponsored" style="background:#fff;width:100%">
</div>

<br>
<div style="width:100%;height:40px;background:#fff"><center><a href="search.php?q=worldcup" rel="external"><span style="font-size:17px">See What's Trending In WorldCup Today</span></a></center></div><br>
<div id="feed" style="width:100%;background:#d4d4d4"></div>

<div class="metro" data-role="controlgroup" data-type="vertical">
<ul data-role="listview" data-theme="c">
<li style="list-style-type:none;background:#3b5998;color:white">People</li>
</ul>

<a id="pp" rel="external" href="mactions.php" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Find People</td></tr></table></a>

<a id="folowing" href="following.php?user=<?php echo $_SESSION[current] ?>" rel="external" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Following</td><td></td></tr></table></a>

<a id="folwers" href="followers.php?user=<?php echo $_SESSION[current] ?>" rel="external" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Followers</td></tr></table></a>


<ul data-role="listview" data-theme="c">
<li style="list-style-type:none;background:#3b5998;color:white">Categories</li>
</ul>
<a id="all" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">All News Feed</td></tr></table></a>


<a id="news" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td style="font-size:18px"><td style="font-size:18px">News </td></tr></table></a>

<a id="ent" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Entertainment</td></tr></table></a>

<a id="bus" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td style="font-size:18px"><td style="font-size:18px">Business</td></tr></table></a>

<a id="tech" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Technology</td></tr></table></a>

<a id="celeb" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td style="font-size:18px"><td style="font-size:18px">Celebrity</td></tr></table></a>

<a id="spor" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Sports</td></tr></table></a>

<a id="rel" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Religion</td></tr></table></a>

<a id="mus" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Music</td></tr></table></a>

<a id="life" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Lifestyle</td></tr></table></a>

<a id="hel" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Health</td></tr></table></a>

<a id="tv" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Tv Shows</td></tr></table></a>

<a id="jobs" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Jobs</td></tr></table></a>

<a id="com" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Comedy</td></tr></table></a>

<a id="youth" data-role="button" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Youth</td></tr></table></a>

<ul data-role="listview" data-theme="c">
<li style="list-style-type:none;background:#3b5998;color:white">Other Places</li>
</ul>


<a href="promote.php" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Promote Yourself</td></tr></table></a>


<a href="thread.php?with=@twoopic" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Report Problem</td></tr></table></a>

<a href="terms.php" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Terms of use</td></tr></table></a>

<a href="about.php" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">About us</td></tr></table></a>


<a href="logout.php" data-role="button" rel="external" data-mini="true" style="height:50px;font-size:20px;color:black;border:none;border-bottom-color:#d4d4d4;border-radius:0px;font-family:'Century Gothic'" data-theme="c">
<table style="background:none"><tr><td class="metro" style="width:30px"></td><td style="font-size:18px">Log Out(<?php echo $_SESSION[current]?>)</td></tr></table></a>

</div>


</div>









<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.mobile-1.3.0.min.js"></script>
	
        <script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
            app.initialize();
        </script>
       </body> 		

</html>