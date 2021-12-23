<?php
include_once('functions.php');

$updatejob=new job();
$cid=$_POST['cid'];
$compname=$_POST['cname']; 
$jobtype=$_POST['jobtype']; 
$quali=$_POST['qua'];
$compmail=$_POST['cmail'];
$compnumb=$_POST['cnumb'];
$sql=$updatejob->jobupdate($cid,$compname,$jobtype,$quali,$compmail,$compnumb);
if($sql==1)
{
	echo json_encode(array("statusCode"=>200)); 
}
else 
{
	echo json_encode(array("statusCode"=>201));
}

?>