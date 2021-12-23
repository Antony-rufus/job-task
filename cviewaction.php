<?php 
session_start();
include_once('functions.php');
$cid=$_SESSION['cid'];
$cviewjob=new job();
$sql=$cviewjob->companyaddedjob($cid);
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
        <td><a href="editjob.php?id=<?php echo $dat['id']; ?>">Edit</a> </td>
        <td><a href="" id=<?php echo $dat['id']; ?> class="delid">Delete</a> </td>        
        </tr>
        
        <?php  $i=$i+1; } 
}
else
{
    echo "No Results";
}       
?>