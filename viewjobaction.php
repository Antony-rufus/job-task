<?php 
session_start();
include_once('functions.php');

$viewjobs=new job();
$sql=$viewjobs->availablejob();
if($sql)

{

 foreach($sql as $dat) { ?>
    <tr>
        <td><?php echo $i; ?></td>    
        <td><?php echo $dat['compname']; ?></td>
        <td><?php echo $dat['jobtype']; ?></td>
        <td><?php echo $dat['qualification']; ?></td>
        <td><?php echo $dat['mail']; ?></td>
        <td><?php echo $dat['compnumber']; ?></td>
        </tr>
        
        <?php  $i=$i+1; } 
}
else
{
    echo "No Results";
}

?>