<?php 
session_start();
include_once('functions.php');
$sql=array();
$viewjobs=new job();
$sql=$viewjobs->availablejob();
if($sql)

{
 $i=1;
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