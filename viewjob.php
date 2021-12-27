<?php 
session_start();
if(!isset($_SESSION['SMAIL']) && empty($_SESSION['SMAIL']))
{
	header("location:seekerlogin.php");
}


?>
<html>
    <head>
        <title>Job Seeker - Recruiter</title>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf-8" src="DataTables/media/js/jquery.dataTables.js"></script>
	

    </head>
    <body>
        <header style="height:10%;background: #1abc9c">
	<div>
  	<center><h1>Job Recruiter and Seeker Site</h1></center>
	</div>
</header>
<main style="height:80%;background:#FFCA33" class="container-fluid">
	<?php
    include_once('functions.php');
    $viewjob=new job();
    $i=1;
    
    $data=$viewjob->availablejob();
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
        
    </tr>
    </thead>
    <tbody id="table">

</tbody>
    </table>
    </div>    
    <a class="btn btn-primary" href="logout.php">Log Out</a>
    
    </div>
<script>
    $(document).ready(function(){
    $('#view').DataTable();
});
    $.ajax({
        url:"viewaction.php",
        type:"POST",
        catch:false,
        success: function(data) {
          
            $('#table').html(data);
        }
    });
    </script>
    </main>
<footer style="height:10%;background: #1abc9c">
</footer>

</body>
</html>
