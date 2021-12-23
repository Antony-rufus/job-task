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
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	

    </head>
    <body>
    <header style="height:10%;background: #1abc9c">
	<div>
  	<center><h1>Job Recruiter and Seeker Site</h1></center>
	</div>
</header>
<main  style="height:80%;background:#FFCA33" class="container-fluid">
	<div class="row">

		
			<div class="col-md-6">
		<center><h2>Adding New Jobs</h2>
		<a href="addjob.php" class="btn btn-primary"  name="addjob" id="addjob">Add job</a>
		</center>
		
		</div>
			
	
		        <div class="col-md-6">
		<center><h2>Alter Added Jobs</h2>
		<a href="viewjobtoedit.php" class="btn btn-success" id="editjob" name="editjob">Alter job</a></center>
		
		</div>
			
		
	
	</div>
    <div class="col-md-12">
		<center><h2>Job Recruiter Logout</h2>
		<a href="logout.php" class="btn btn-success" id="editjob" name="editjob">Logout</a></center>
		
		</div>
	
		
        </main>
<footer style="height:10%;background: #1abc9c">
</footer>

    </body>
</html>
