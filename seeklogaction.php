<?php
include_once('functions.php');

$seeklog=new job();

$seekername=$_POST['lsname'];

$seekermail=$_POST['lsmail'];

$sql=$seeklog->seekerlogin($seekername,$seekermail);


if($sql==1)
{
    
    echo json_encode(array("statusCode"=>200));
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