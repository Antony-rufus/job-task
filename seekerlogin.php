
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
	<h2>Job Seeker Login</h2>
	<div class="alert alert-danger alert-dismissible" id="fail" style="display:none"> </div>	
	<form id="loginsee" method="post" enctype="multipart/form-data" >
		<div class="form-group">
		<label>Name:</label>
		<input type="text" placeholder="Enter your name" name="lsname" id="lsname" class="form-control">
		</div>
		<div class="form-group">
		<label>Contact Mail:</label>
		<input type="email" placeholder="Enter your mail" name="lsmail" id="lsmail" class="form-control">
		</div>
		
		<button type="button" class="btn btn-primary" id="logsebtn"  name="Submit">Submit</button>
		</form>
	</div>

<script>
		$(document).ready(function() {
		/*	$('input').on('change', function(){
				$('#logsebtn').prop("disabled",false);
			});*/
       		$('#logsebtn').on('click',function(){
					

			var name=$('#lsname').val();
			var mail=$('#lsmail').val();
			var mailcon= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			$('.error').remove();
			if(name.length<1)
					{
						$('#lsname').after('<span class="error">Please enter your name</span>');
					/*	$('#logsebtn').prop("disabled",true);*/
						return;
					}
					else if(mail.length<1)
					{
						$('#lsmail').after('<span class="error">Please fill the Company mail</span>');
					/*	$('#logsebtn').prop("disabled",true);*/
						return;
					}
					else if(mail.length>1 && !mailcon.test(mail))
					{
							$('#lsmail').after('<span class="error">Please enter a Valid Mail Address</span>');
					/*		$('#logsebtn').prop("disabled",true);*/
							return;
						}
						
					else
					{
						$('#logsebtn').prop("disabled",false);
					}
			
		
			var data=$('#loginsee').serialize();
	
			$.ajax({
				url:"seeklogaction.php",
				type:"POST",
				data:data,
				catch:false,
				success: function(dataResult){
					var dataResult=JSON.parse(dataResult);
					if(dataResult.statusCode==200)
					{
						location.href="viewjob.php";
					}
					else if(dataResult.statusCode==201)
					{
						$('#fail').show();
						$('#fail').html('Login Unsuccessful');
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



