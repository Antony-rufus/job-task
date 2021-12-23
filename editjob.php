
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

	

	<style>
		.error
		{
			color:red;

		}

 	</style>

    </head>
    <body>
    <header style="height:10%;background: #1abc9c">
	<div>
  	<center><h1>Job Recruiter and Seeker Site</h1></center>
	</div>
</header>
	<main  style="height:80%;background:#FFCA33" class="container-fluid">
	<div class="container">
	<h2>Alter Job</h2>
	<div class="alert alert-success alert-dismissible" id="success1" style="display:none"> </div>
	<div class="alert alert-danger alert-dismissible" id="fail1" style="display:none"> </div>
	
    <?php
    include_once('functions.php');
    $editjob=new job();
    $i=1;
    $jobid=$_GET['id'];
    $data=$editjob->editjob($jobid);
    foreach($data as $dat) {
    ?>
	<form id="addcomp" method="post" enctype="multipart/form-data" >
		<div class="form-group">
		<label>Company Name:</label>
		<input type="text" disabled value="<?php echo $dat['compname'];?>" placeholder="Enter the company name" name="cname" id="cname" class="form-control">
		</div>
		<input type="hidden" value="<?php echo $dat['id'];?>" name="cid" id="cid" class="form-control">	
        <div class="form-group">
		<label>Job Type:</label>
		<input type="text" value="<?php echo $dat['jobtype'];?>" placeholder="Enter the job type" name="jobtype" id="jobtype" class="form-control">
		</div>
        <div class="form-group">
		<label>Qualification:</label>
		<input type="text" value="<?php echo $dat['qualification'];?>" placeholder="Enter the qualification" name="qua" id="qua" class="form-control">
		</div>
		<div class="form-group">
		<label>Company MailId:</label>
		<input type="email" value="<?php echo $dat['mail'];?>" placeholder="Enter the mailid" name="cmail" id="cmail" class="form-control">
		</div>
		<div class="form-group">
		<label>Contact Number</label>
		<input type="number" value="<?php echo $dat['compnumber'];?>" placeholder="Enter the contact number" name="cnumb" id="cnumb" class="form-control">		
		</div>
		<input type="button" class="btn btn-primary" id="editsub" name="Submit" value="Submit" >
		</form>
		<a class="btn btn-success" href="viewjobtoedit.php">View</a><label>Added Job ! </label>
		<?php } ?>
	</div>
	<script>
			$(document).ready(function() {
				/*$('input').on('change', function(){
					$('#editsub').prop("disabled",false);
				});*/
				$('#editsub').on('click',function(){
				
				$('#success1').hide();
				$('#fail1').hide();
				
				var mailcon= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;	
					var name=$('#cname').val();
					var jobtype=$('#jobtype').val();
					var qua=$('#qua').val();
					var mail=$('#cmail').val();
					var number=$('#cnumb').val();
					$('.error').remove();
					if(name.length<1)
					{
						$('#cname').after('<span class="error">Please fill the Company name</span>');
					/*	$('#editsub').prop("disabled",true);*/
						return;
					}
					else if(jobtype.length<1)
							{
								$('#jobtype').after('<span class="error">Please fill the Job type</span>');
					/*			$('#editsub').prop("disabled",true);*/
								return;
							}
					else if(qua.length<1)
						{
							$('#qua').after('<span class="error">Please fill the Qualification</span>');
					/*		$('#editsub').prop("disabled",true);*/
							return;
						}
					else if(mail.length<1)
						{
							$('#cmail').after('<span class="error">Please fill the Company mail</span>');
					/*		$('#editsub').prop("disabled",true);*/
							return;
						}
					else if(mail.length>1 && !mailcon.test(mail))
						{
							
							
								$('#cmail').after('<span class="error">Please enter a Valid Mail Address</span>');
							/*	$('#editsub').prop("disabled",true);*/
								return;
							

						}
					else if(number.length<10)
						{
							$('#cnumb').after('<span class="error">Your Contact number should contain atleast 10 digits</span>');
					/*	$('#editsub').prop("disabled",true);*/
							return;
						}
					else if(number.length>=11)
						{
							$('#cnumb').after('<span class="error">Your Contact number should contain only 10 digits</span>');
						/*	$('#editsub').prop("disabled",true);*/
							return;
						}
						
					else
						{
							$('input').prop("disabled",false);
						}
			
						
					var data=$('#addcomp').serialize();
						$.ajax({
							
							url:"updateaction.php",
							type:"POST",
							data:data,
							catch:false,
							
			success: function(dataResult){
				var dataResult=JSON.parse(dataResult);
				
				if(dataResult.statusCode==200)
				{
					
					$('#success1').show();
					$('#success1').html('Job added Successful');
				}
				else if(dataResult.statusCode==201)
				{
					$('#fail1').show();
					$('#fail1').html('Error in adding Job');
				}
				
			}

						});
					});
					});
</script>
    </main>

</body>
<footer style="height:10%;background: #1abc9c">
</footer>
</html>
