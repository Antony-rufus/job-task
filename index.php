<?php
session_start();
session_destroy();
?>
<html>
    <head>
        <title>Job Seeker - Recruiter</title>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
	<script src="bootstrap/js/bootstrap.min.js" type="text/java-script"></script>
	<script src="jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    </head>
    <body>
	<header style="height:20%;background: #1abc9c">
	<div>
  	<center><br><h1>Job Recruiter and Seeker Site</h1></center>
	</div>
</header>
<main  style="height:70%;background:#FFCA33"  class="container-fluid">
	<div class="row">

		
			<div class="col-md-6">
		<center><h2>Job Recruiter</h2>
		<a href="cosignin.php" class="btn btn-primary"  name="signin" id="csignin">Sign In</a>
		<a href="complogin.php" class="btn btn-success" name="login" id="clogin">login In</a></center>
		<!--<form action="" id="signinrec" method="post" enctype="multipart/form-data" style="display:none">
		<div class="form-group">
		<label>Company Name:</label>
		<input type="text" placeholder="Enter the company name" name="cname" id="cname" class="form-control">
		</div>
		<div class="form-group">
		<label>Company MailId:</label>
		<input type="email" placeholder="Enter the mailid" name="cmail" id="cmail" class="form-control">
		</div>
		<div class="form-group">
		<label>Password:</label>
		<input type="password" placeholder="Enter the password" name="cpass" id="cpass" class="form-control">
		</div>
		<div class="form-group">
		<label>Confirm Password:</label>
		<input type="password" placeholder="Enter the password" name="cpass" id="cpass" class="form-control">
		</div>
		<div class="form-group">
		<label>Contact Number</label>
		<input type="number" placeholder="Enter the contact number" name="cnumb" id="cnumb" class="form-control">		
		</div>
		<button type="submit" class="btn btn-primary" id="signbtn" name="Submit">Submit</button>
		</form>

		<form action="" id="loginrec" method="post" enctype="multipart/form-data" style="display:none;">
		<div class="form-group">
		<label>Company mail:</label>
		<input type="email" placeholder="Enter the company name" name="lcname" id="lcname" class="form-control">
		</div>
		
		<div class="form-group">
		<label>Password:</label>
		<input type="password" placeholder="Enter the password" name="lcpass" id="lcpass" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary" id="logrebtn" name="Submit">Submit</button>
		</form>-->
		</div>
			
	
		        <div class="col-md-6">
		<center><h2>Job Seeker</h2>
		<a href="seekerlogin.php" class="btn btn-success" id="slogin" name="Sign-in">login In</a></center>
		<!--<form action="" id="loginsee" method="post" enctype="multipart/form-data" style="display:none;">
		<div class="form-group">
		<label>Name:</label>
		<input type="text" placeholder="Enter your name" name="lsname" id="lsname" class="form-control">
		</div>
		<div class="form-group">
		<label>Contact Mail:</label>
		<input type="email" placeholder="Enter your mail" name="lsmail" id="lsmail" class="form-control">
		</div>
		
		<button type="submit" class="btn btn-primary" id="logsebtn" name="Submit">Submit</button>
		</form>-->
		</div>
			
		
	
	</div>
	
	
	<!--<script>
  $(document).ready( function() {	
    $('#csignin').click( function() {
	$('#signinrec').show();
        $('#loginrec').hide();
	$('#loginsee').hide();
	alert("ffwefew");
	});
 $('#clogin').click( function() {
	$('#signinrec').hide();
        $('#loginrec').show();
	$('#loginsee').hide();
	});
$('#slogin').click( function() {
	$('#signinrec').hide();
        $('#loginrec').hide();
	$('#loginsee').show();
	});

  });
  </script>-->
  
 <!-- <script>
	$('#signirec').ready(function()
		{
 
	$('#signbtn').click( function(){
	alert("tfytfgyj");
	var name=$('#cname');
	var mail=$('#cmail');
	var password=$('#cpass');
	var number=$('#cnumb');
	if(name!="" && mail!="" && password!="" && number!="")
	{
		$.ajax({ 
			url:"cosignaction.php",
			type:"POST",
			data:{
				name=name,
				mail=mail,
				password=password,
				number=number,
			},
			catch:false,
			success: function(dataResult){
				var dataResult=JSON.parse(dataResult);
				if(dataResult.statusCode==200)
				{
					$('#success').html('Signin Successful');
				}
				elseif(dataResult.statusCode==201)
				{
					alert('Signin Unsuccessful');
				}
			}

		});
	}
	else
	{
		alert("Please fill all the feild");
	}
});


});
</script>-->




</main>
<footer style="height:10%;background: #1abc9c">
</footer>
    </body>
</html>
