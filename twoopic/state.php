<?php
session_start();
include 'allcon.php';
$cur=$_SESSION['current'];
$t=time();
$topicid=md5($_POST[des]).rand();



//get users locale



$receiver=$_POST[dpeople];

$message=$_POST[des];


$see="update chat set state='$cur' where (Sender='$cur' and Receiver='$receiver')";
mysqli_query($con,$see);

$sve="update chat set state='$cur' where (Receiver='$cur' and Sender='$receiver')";
mysqli_query($con,$sve);





?>