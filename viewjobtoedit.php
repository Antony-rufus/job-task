<?php 
session_start();
if(!isset($_SESSION['MAIL']) && empty($_SESSION['MAIL']))
{
	header("location:complogin.php");
}
?>
<html>
    <head>
        <title>Job Seeker - Recruiter</title>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8" src="DataTables/media/js/jquery.dataTables.js"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
        
	  
	
    </head>
    <body>
    <header style="height:10%;background: #1abc9c">
	<div>
  	<center><h1>Job Recruiter and Seeker Site</h1></center>
	</div>
</header>
<main  style="height:80%;background:#FFCA33" class="container-fluid">
<div class="alert alert-success alert-dismissible" id="success1" style="display:none"> </div>
	<div class="alert alert-danger alert-dismissible" id="fail1" style="display:none"> </div>
	
<?php
    include_once('functions.php');
    $viewjobtoedit=new job();
    $i=1;
    $cid=$_SESSION['cid'];
    $data=$viewjobtoedit->companyaddedjob($cid);
    ?>
    <div class="container">
    <div class="table-responsive">
    <table id="view" class="table table-bordered">
    <thead>
    <tr>
        <th> Serial No.</th>
        <th>Company Name</th>
        <th>Job Type</th>
        <th>Qualification</th>
        <th>Company Mail</th>
        <th> Contact Number</th>
        <th> Edit</th>
        <th> Delete</th>
    </tr>
    </thead>
    <tbody id="table">

</tbody>
    </table>
    </div> 
    <a class="btn btn-primary" href="addjob.php">Add Job</a><label>Add additional Jobs! </label>
    <a class="btn btn-primary" href="compside.php">Home</a><label>Back to Home page! </label>
    </div>   
    <script>
          $(document).ready(function(){
                 $('#view').DataTable();
            });
    $.ajax({
        url:"cviewaction.php",
        type:"POST",
        catch:false,
        success: function(data) {
          
            $('#table').html(data);
        }
    });
    $(document).on('click','.delid', function(){
        var del_id=$(this).attr('id');
        var ele=$(this).parent().parent();
        $.ajax({
            url:"deletejob.php",
            type:"POST",
            data:{del_id:del_id},
                success: function(dataResult){
				var dataResult=JSON.parse(dataResult);
				
				if(dataResult.statusCode==200)
				{
					$('#success1').show();
					$('#success1').html('Job Deleted Successful');
				}
				else if(dataResult.statusCode==201)
				{
					$('#fail1').show();
					$('#fail1').html('Error in Deleting Job');
				}
				
			}
            
        });
    });
    </script>
    </main>
<footer style="height:10%;background: #1abc9c">
</footer>

</body>
</html>
