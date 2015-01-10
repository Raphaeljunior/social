<?php 
session_start();
include 'allcon.php';
?>
<!DOCTYPE html>

<html>
    <head>



        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title></title>
        <link rel="stylesheet" href="css/metro-bootstrap.css">
<link rel="stylesheet" href="modal.css">
        <link rel="stylesheet" href="css/modify.css">
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/jquery/jquery.widget.min.js"></script>
        <script src="js/metro/metro.min.js"></script>
        <script src="js/metro/metro-live-tile.js"></script>


</head>
<body class="metro">
<div data-role="page" data-theme="d">
<div data-role="header" data-position="fixed"><h1>Admin Panel</h1></div>
<?php 
$a="select * from users order by id desc";
$t=mysqli_query($con,$a);
$users=mysqli_num_rows($t);


$pos="select * from users  order by posts desc limit 10";
$tpos=mysqli_query($con,$pos);








$b="select * from status";
$bb=mysqli_query($con,$b);
$topic=mysqli_num_rows($bb);

$bq="select * from status where media!=''";
$bbq=mysqli_query($con,$bq);
$photo=mysqli_num_rows($bbq);


$tt="select * from message";
$ta=mysqli_query($con,$tt);
$msg=mysqli_num_rows($ta);


$aaa="select * from promoted where status='pending'";
$taa=mysqli_query($con,$aaa);
$seta=mysqli_num_rows($taa);



$aa="select * from promoted where status=''";
$ta=mysqli_query($con,$aa);
$set=mysqli_num_rows($ta);

$aak="select SUM(time) from logged where time!=''";
$tak=mysqli_query($con,$aak);
while($el=mysqli_fetch_array($tak)){
$tot=$el['SUM(time)'];
}
$min=$tot/60;

$rate=$min/$users;

$now=date("d/m/Y");
$dt=date("h:i:s");

echo '

<h2><b>Twoopic Counter Page</b></h2>
<H6>AS ON '.$now.' AT '.$dt.'</H6>
<h3><b><u>Userbase and Activity</u></h3></span>
<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Registered Users</b></span><br>
<span style="font-size:18px;color:green"><b>'.$users.'</b></span>
</div><br>';


while($p=mysqli_fetch_array($tpos)){
echo '<div style="border-bottom-color:#d4d4d4;border-bottom:solid 1px"><span>'.$p[Username].'<br>
<span>'.$p[posts].'</span></div><br>';

}


echo'<div style="display:none;width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total User Activity Time </b></span><br>
<span style="font-size:18px;color:green"><b>'.$min.' minutes</b></span>
</div><br>';





echo'<div style="display:none;width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Average User Activity Rate per Minute</b></span><br>
<span style="font-size:18px;color:green"><b>'.$rate.' minutes per user</b></span>
</div><br>';

$msgrate=$msg/$users;

echo '
<h3><b><u>User Messaging</u></h3></span>
<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Messages Exchanged</b></span><br>
<span style="font-size:18px;color:green"><b>'.$msg.'</b></span>
</div><br>';

echo'<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Average User Messaging Rate</b></span><br>
<span style="font-size:18px;color:green"><b>'.$msgrate.' messages per user</b></span>
</div><br>';

$srate=$topic/$users;

echo '
<h3><b><u>User Sharing Activity</u></h3></span>
<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Updates Shared(Photos included)</b></span><br>
<span style="font-size:18px;color:green"><b>'.$topic.'</b></span>
</div><br>';

echo '
<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Photos Shared</b></span><br>
<span style="font-size:18px;color:green"><b>'.$photo.'</b></span>
</div><br>';

echo'<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Average User Sharing Rate</b></span><br>
<span style="font-size:18px;color:green"><b>'.$srate.' updates per user</b></span>
</div><br>';


echo '
<h3><b><u>Advertising Statistics</u></h3></span>
<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Ads Pending(Yet to be paid)</b></span><br>
<span style="font-size:18px;color:green"><b>'.$seta.'</b></span>
</div><br>';

echo'<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Ads Set(Paid ads)</b></span><br>
<span style="font-size:18px;color:green"><b>'.$set.'</b></span>
</div><br>';


$x="select SUM(bill) from promoted where status='pending'";
$xa=mysqli_query($con,$x);

while($row=mysqli_fetch_array($xa)){
$billp=$row['SUM(bill)'];
}

$xe="select SUM(bill) from promoted where status=''";
$xae=mysqli_query($con,$xe);

while($row=mysqli_fetch_array($xae)){
$bills=$row['SUM(bill)'];
}






echo '
<h3><b><u>Revenue Statistics</u></h3></span>
<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Revenue from pending ads</b></span><br>
<span style="font-size:18px;color:green"><b>KShs '.$billp.'</b></span>
</div><br>';

echo'<div style="width:100%;border:solid 2px;border-color:#3b5998;border-radius:2px;border-top-color:#fff">
<span style="font-size:18px"><b>Total Revenue from paid ads</b></span><br>
<span style="font-size:18px;color:green"><b>KShs '.$bills.'</b></span>
</div><br>';








?>
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