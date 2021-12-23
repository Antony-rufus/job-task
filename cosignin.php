
<html>
    <head>
        <title>Job Seeker - Recruiter</title>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/java-script"></script>
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
<main  style="height:90%;background:#FFCA33" class="container-fluid">
	<div class="container">
	<h2>Job Recruiter Sign in</h2>
	<div class="alert alert-success alert-dismissible" id="success" style="display:none"> </div>
	<div class="alert alert-danger alert-dismissible" id="fail" style="display:none"> </div>
	<div class="alert alert-success alert-dismissible" id="exist" style="display:none"> </div>

	<form id="signinrec" method="post"  enctype="multipart/form-data">
		<div class="form-group">
		<label>Company Name:</label>
		<input type="text" placeholder="Enter the company name" name="cname" id="cname" class="form-control">
		</div>
		<div class="form-group">
		<label>Company MailId:</label>
		<input type="text" placeholder="Enter the mailid" name="cmail" id="cmail" class="form-control">
		</div>
		<div class="form-group">
		<label>Password:</label>
		<input type="password" placeholder="Enter the password" name="cpass" id="cpass" class="form-control" autocomplete="on">
		</div>
		
		<div class="form-group">
		<label>Contact Number</label>
		<input type="number" placeholder="Enter the contact number" name="cnumb" id="cnumb"  class="form-control">		
		</div>
		<input type="button" class="btn btn-primary" id="Submit1" name="Submit1"  value="Submit">
		</form>
		<a class="btn btn-success" href="complogin.php">Login</a><label>If Account Exist ! </label>
	</div>
	<script>
		$(document).ready(function(){
		/*	$('input').on('change', function(){
				$('#Submit1').prop("disabled",false);
			});*/
       		$('#Submit1').on('click',function(){
			
		
				$('#success').hide();
				$('#fail').hide();
				$('#exist').hide();
					var name=$('#cname').val();
					var mail=$('#cmail').val();
					var password=$('#cpass').val();
					var number=$('#cnumb').val();
					var mailcon= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
					$('.error').hide();
					if((name.length)<1)
					{
						$('#cname').after('<span class="error">Please fill the Company name</span>');
					/*	$('#Submit1').prop("disabled",true);*/
						return;
					}
						else if(mail.length<1)
						{
							$('#cmail').after('<span class="error">Please fill the Company mail</span>');
						/*	$('#Submit1').prop("disabled",true);*/
							return;
						}
						else if(mail.length>1 && !mailcon.test(mail))
						{
							
							
								$('#cmail').after('<span class="error">Please enter a Valid Mail Address</span>');
							/*	$('#Submit1').prop("disabled",true);*/
								return;
							

						}
						else if(password.length<8)
						{
							$('#cpass').after('<span class="error">Your Password must contain atleast 8 digits</span>');
						/*	$('#Submit1').prop("disabled",true);*/
							return;
						}
						else if(number.length<10)
						{
							$('#cnumb').after('<span class="error">Your Contact number should contain atleast 10 digits</span>');
						/*	$('#Submit1').prop("disabled",true);*/
							return;
						}
						else if(number.length>=11)
						{
							$('#cnumb').after('<span class="error">Your Contact number should contain only 10 digits</span>');
						/*	$('#Submit1').prop("disabled",true);*/
							return;
						}
						
						else
						{
							$('#Submit1').prop("disabled",false);
						}
			
			var data=$('#signinrec').serialize();
			
			$.ajax({
				
				url:"/cosignaction.php",
				type:"POST",
				data:data,
				catch:false,
				success:function(dataResult) {
					var dataResult=JSON.parse(dataResult);
					if(dataResult.statusCode==403)
					{
						$('#signinrec').trigger("reset");	
						$('#exist').show();
						$('#exist').html("Account Already exist");
						
					}
					else if(dataResult.statusCode==200)
					{
						$('#signinrec').trigger("reset");	
						$('#success').show();
						$('#success').html("Sign in Successfully");
						
					}
					else if(dataResult.statusCode==201)
					{
						$('#signinrec').trigger("reset");	
						$('#fail').show();
						$('#fail').html("Sign in UnSuccessful");
						
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
