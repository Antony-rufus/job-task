<?php
include_once('functions.php');

$deletejob=new job();

$jobid=$_POST['del_id']; 

$sql=$deletejob->jobdelete($jobid);
if($sql==1)
{
	echo json_encode(array("statusCode"=>200)); 	
}
else
{
	echo json_encode(array("statusCode"=>201));
}

?>