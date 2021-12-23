
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
	<main  style="height:80%;background:#FFCA33" class="container-fluid" >
	<div class="container">
	<h2>Job Recruiter Login </h2>
	<div class="alert alert-danger alert-dismissible" id="fail" style="display:none"> </div>
	<div class="alert alert-danger alert-dismissible" id="validate" style="display:none"> </div>
	<form name="loginrec"  id="loginrec" method="post" enctype="multipart/form-data" >
		<div class="form-group">
		<label>Company mail:</label>
		<input type="text" placeholder="Enter the company name" name="lcname" id="lcname" class="form-control">
		</div>
		
		<div class="form-group">
		<label>Password:</label>
		<input type="password" placeholder="Enter the password" name="lcpass" id="lcpass" class="form-control" autocomplete="on">
		</div>
		<input type="button" class="btn btn-primary" id="submit2" name="Submit2"  value="Submit" >
	</form>
	</div>
	<script>
		$(document).ready(function() {
			/*$('input').on('change', function(){
				$('#submit2').prop("disabled",false);
			});*/
			$('#submit2').on('click', function(){
       
	var mail=$('#lcname').val();
	var password=$('#lcpass').val();
	var mailcon= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	$('.error').remove();
	if(mail.length<1)
					{
						$('#lcname').after('<span class="error">Please fill the Company mail</span>');
						/*$('#submit2').prop("disabled",true);*/
						return;
					}
					else if(mail.length>1 && !mailcon.test(mail))
					{
						
						
							$('#lcname').after('<span class="error">Please enter a Valid Mail Address</span>');
						/*	$('#submit2').prop("disabled",true);*/
							return;
						

					}
					else if(password.length<8)
					{
						$('#lcpass').after('<span class="error">Your password must contain atleast 8 characters</span>');
					/*	$('#submit2').prop("disabled",true);*/
						return;
					}

					else
									{
										$('#submit2').prop("disabled",false);
									}


	
	  var data=$('#loginrec').serialize();
	  
			$.ajax({
				url:"/complogaction.php",
				type:"POST",
				data:data,
				catch:false,
				success: function(dataResult){
					var dataResult=JSON.parse(dataResult);
					if(dataResult.statusCode==200)
					{
						location.href="compside.php";
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
	/*}
	else
	{
		$('#validate').show();
		$('#validate').html('Please fill all the feild');
	} */

		</script>
		</main>

</body>
<footer style="height:10%;background: #1abc9c">
</footer>
</html>



