<?php
include_once('functions.php');

$companysignin=new job();

$compname=$_POST['cname']; 
$compmail=$_POST['cmail'];
$comppa=$_POST['cpass'];
$comppass=md5($comppa);
$compnumb=$_POST['cnumb'];
$sql=$companysignin->cosignin($compname,$compmail,$comppass,$compnumb);

if($sql==1)
{
 echo json_encode(array("statusCode"=>403));	
}
else if($sql==2)
{
 echo json_encode(array("statusCode"=>200));
}
else if($sql==3)
{
    echo json_encode(array("statusCode"=>201));   
}

?>