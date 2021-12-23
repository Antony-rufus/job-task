
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
	 <div id="header">
  <header style="height:10%;background: #1abc9c">
	<div>
  	<center><h1>Job Recruiter and Seeker Site</h1></center>
	</div>
</header>
	</div>
    </head>
    <body>
	
<main  style="height:80%;background:#FFCA33" >
	
	<h2>Adding New Jobs</h2>
	<div class="alert alert-success alert-dismissible" id="success1" style="display:none"> </div>
	<div class="alert alert-danger alert-dismissible" id="fail1" style="display:none"> </div>
	<div class="alert alert-success alert-dismissible" id="exist" style="display:none"> </div>
	<form  id="addcomp" name="addcomp" method="post" enctype="multipart/form-data" >
		
        <div class="form-group">
		<label>Job Type:</label>
		<input type="text" placeholder="Enter the job type" name="addjobtype" id="addjobtype" class="form-control">
		</div>
        <div class="form-group">
		<label>Qualification:</label>
		<input type="text" placeholder="Enter the qualification" name="addqua" id="addqua" class="form-control">
		</div>

		<input type="button" id="btnsub" name="btnsub" class="btn btn-primary"  value="Submit">

		</form>
		<a class="btn btn-success" href="viewjobtoedit.php">View</a><label>Added Job ! </label>
	
	
	<script>
			$(document).ready(function() {
				/*$('input').on('change', function(){
					$('#btnsub').prop("disabled",false);
				});*/
				$('#btnsub').on('click',function(){

				$('#success1').hide();
				$('#fail1').hide();
				$('#exist').hide();
			
			
					var jobtype=$('#addjobtype').val();
					var qua=$('#addqua').val();
					
					
					$('.error').remove();
					
					if(jobtype.length<1)
						{
							$('#addjobtype').after('<span class="error">Please fill the Job type</span>');
							/*$('#btnsub').prop("disabled",true);*/
							return;
						}
					else if(qua.length<1)
					{
						$('#addqua').after('<span class="error">Please fill the Qualification</span>');
						/*$('#btnsub').prop("disabled",true);*/
						return;
					}
				
					else
					{
						$('#btnsub').prop("disabled",false);
					}
				
				
					
				/*	var name=$('#addcname').val();
					var jobtype=$('#addjobtype').val();
					var qua=$('#addqua').val();
					var mail=$('#addcmail').val();
					var number=$('#addcnumb').val();
					$('.error').remove();
					if(name.length<1)
					{
						$('#addcname').after('<span class="error">Please fill the Company name</span>');
						return;
					}
					if(jobtype.length<1)
						{
							$('#addjobtype').after('<span class="error">Please fill the Job type</span>');
							return;
						}
					if(qua.length<1)
					{
						$('#addqua').after('<span class="error">Please fill the Qualification</span>');
						return;
					}
					if(mail.length<1)
					{
						$('#addcmail').after('<span class="error">Please fill the Company mail</span>');
						return;
					}
					else
					{
						var mailcon= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
						var validmail=mailcon.test(mail);
						if(!validmail)
						{
							$('#addcmail').after('<span class="error">Please enter a Valid Mail Address</span>');
							return;
						}

					}
					if((number.length)<10)
					{
						$('#addcnumb').after('<span class="error">Your Contact number must contain atleast 10 digits</span>');
						return;
					}
					else if((number.length)>=11)
					{
						$('#addcnumb').after('<span class="error">Your Contact number should be 10 digits</span>');
						return;
					}
						*/
						

						var data=$('#addcomp').serialize();
						$.ajax({
						
							url:"addjobaction.php",
							type:"POST",
							data:data,
							catch:false,
							
			success: function(dataResult){
				var dataResult=JSON.parse(dataResult);
				
				if(dataResult.statusCode==200)
				{
					$('#addcomp').trigger("reset");
					$('#success1').show();
					$('#success1').html('Job added Successful');
				}
				else if(dataResult.statusCode==201)
				{
					$('#fail1').show();
					$('#fail1').html('Error in adding Job');
				}
				else if(dataResult.statusCode==403)
				{
					$('#addcomp').trigger("reset");
				    $('#exist').show();
					$('#exist').html('Job Exist');
				}
			}

						});
						});
						});
			
</script>
</main>
		
</body>
<div id="footer">
<footer style="height:10%;background: #1abc9c">
</footer>
		</div>

</html>
