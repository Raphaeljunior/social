<?php 
session_start();
include 'allcon.php';
?>
<!DOCTYPE html>

<html>
    <head>


<?php include_once 'connections.php'?>

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
<h2>Twoopic's Counter Page</h2>
<?php 
$a="select * from users order by id desc";
$t=mysqli_query($con,$a);
$users=mysqli_num_rows($t);
echo '<h4>Total Registered Users by now: '.$users.'</h4>'; 

$b="select * from status";
$bb=mysqli_query($con,$b);
$topic=mysqli_num_rows($bb);
echo '<h4>Total Topics Shared by now: '.$topic.'</h4>'; 


$tt="select * from message";
$ta=mysqli_query($con,$tt);
$msg=mysqli_num_rows($ta);
echo '<h4>Total Messages Exchanged: '.$msg.'</h4>'; 

$aaa="select * from promoted where status='pending'";
$taa=mysqli_query($con,$aaa);
$seta=mysqli_num_rows($taa);


$aa="select * from promoted where status=''";
$ta=mysqli_query($con,$aa);
$set=mysqli_num_rows($ta);



echo '<h4>Ads pending: '.$seta.'</h4>';


echo '<h4>Ads set: '.$set.'</h4>';


$x="select SUM(bill) from promoted where status='pending'";
$xa=mysqli_query($con,$x);

while($row=mysqli_fetch_array($xa)){
$billp=$row['SUM(bill)'];
}
echo '<h4>Bill for Ads pending: KShs '.$billp.'</h4>';

$xe="select SUM(bill) from promoted where status=''";
$xae=mysqli_query($con,$xe);

while($row=mysqli_fetch_array($xae)){
$bills=$row['SUM(bill)'];
}
echo '<h4>Bill for Ads paid: KShs '.$bills.'</h4>';


while($m=mysqli_fetch_array($t)){
echo $m[Username].'<br>';
}


?>


</body>
</html>