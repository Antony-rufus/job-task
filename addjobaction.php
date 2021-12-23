<?php
session_start();
include_once('functions.php');

$addjob=new job();

$compname=$_SESSION['comname'];
$jobtype=$_POST['addjobtype']; 
$quali=$_POST['addqua'];
$compmail=$_SESSION['MAIL'];
$compnumb=$_SESSION['comnumb'];
$cid=$_SESSION['cid'];
$sql=$addjob->jobadd($compname,$jobtype,$quali,$compmail,$compnumb,$cid);
if($sql==1)
{
	echo json_encode(array("statusCode"=>403));
}
else if($sql==2)
{
	echo json_encode(array("statusCode"=>200)); 
}
else 
{
	echo json_encode(array("statusCode"=>201)); 
}
?>