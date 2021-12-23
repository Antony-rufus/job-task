<?php
session_start();
include_once('functions.php');

$complog=new job();

$compmail=$_POST['lcname'];

$comppa=$_POST['lcpass'];
$comppass=md5($comppa);

$sql=$complog->cologin( $compmail,$comppass);
if($sql>0)
{
   
  
   echo json_encode(array("statusCode"=>200));
}
else
{
   echo json_encode(array("statusCode"=>201));
}

?>