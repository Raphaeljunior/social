<?php 
session_start();
include 'allcon.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
$id=$_POST[id];
$num=$_POST[number];
$t=time();
mysqli_query($con,"update promoted set status='',time='$t' where id='$id' and phone='$num'");


}
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

<?php 
include 'header.php';
$a="select * from promoted";
$t=mysqli_query($con,$a);
echo '<h2>Ads Manager</h2>
<div id="not"></div>';

$aa="select * from promoted where status=''";
$ta=mysqli_query($con,$aa);
$set=mysqli_num_rows($ta);

$aaa="select * from promoted where status='pending'";
$taa=mysqli_query($con,$aaa);
$seta=mysqli_num_rows($taa);

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



echo '<table style="width:100%"></tr><td>
<span style="font-size:18px"><b>Number of set(paid) ads ('.$set.')</b></span><br>
<span style="font-size:18px"><b>Number of pending ads ('.$seta.')</b></span>
</td>
<td>
<span style="font-size:18px"><b>Total bill from set(paid) ads (KShs '.$bills.')</b></span><br>
<span style="font-size:18px"><b>Total Bill from pending ads (KShs '.$billp.')</b></span>

</td>
</tr>
</table>';



while ($ad=mysqli_fetch_array($t)){
echo '<table style="width:100%;border:solid 1px;border-color:black"></tr>
<td style="width:50px"><span style="font-size:18px;color:green"><b>id</b></span><br><span style="font-size:15px">'.$ad[id].'</span></td>

<td style="width:200px"><span style="font-size:18px;color:green"><b>User</b></span><br><span style="font-size:15px">'.$ad[user].'</span></td>

<td style="width:200px"><span style="font-size:18px;color:green"><b>Phone Number</b></span><br><span style="font-size:15px">'.$ad[phone].'</span></td>
<td style="width:200px"><span style="font-size:18px;color:green"><b>Period</b></span><br><span style="font-size:15px">'.$ad[period].'</span></td>
<td style="width:200px"><span style="font-size:18px;color:green"><b>Status</b></span><br><span style="font-size:15px">'.$ad[status].'</span></td>
<td style="width:200px"><span style="font-size:18px;color:green"><b>Bill</b></span><br><span style="font-size:15px">'.$ad[bill].'</span></td>

</tr></table>
';}
echo '
<form action="admanager.php" method="post" class="metro">
<div class="input-control text" size3>
<input type="text" name="id" placeholder="Ad Id">
</div>

<div class="input-control text" size3>
<input type="text" name="number" placeholder="PhoneNumber">
</div>

<input type="submit" value="Set Ad">
</form>';

?>


</body>
</html>