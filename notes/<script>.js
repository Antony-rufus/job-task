<script>
	$(document).ready(function()
		{
 
	$('#signbtn').click( function() {
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
</script>