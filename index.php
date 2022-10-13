<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div style="margin: auto;width: 40%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<H1><center><u><b> REGISTRATION FORM </b></u></center></H1>
	<form id="fupForm" name="form1" method="post">
		<div class="form-group">
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Phone:</label>
			<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
		</div>
		<div class="form-group">
			<label for="add">Address</label>
			<textarea class="form-control"  id="add" rows="3" placeholder="address" name="add"></textarea>
		</div>
		<div class="form-group" >
			<label for="pwd">City:</label>
			<select name="city" id="city" class="form-control">
				<option value="">Select</option>
				<option value="Accra">Accra</option>
				<option value="Lagos">Cape Coast</option>
				<option value="Cape Coast">Takoradi</option>
				<option value="Kumasi">Kumasi</option>
				<option value="Abuja">Goaso</option>
				<option value="Tema">Tema</option>
				<option value="Accra">Koforidua</option>
				<option value="Lagos">Ahafo</option>
				<option value="Cape Coast">Tamale</option>
				<option value="Kumasi">Bolgatanga</option>
				<option value="Abuja">Wa</option>
				<option value="Tema">Ho</option>
			</select>
		</div>
		<input type="button" name="save" class="btn btn-primary" value="Submit Form" id="butsave">
	</form>
	<br>
	<p> Thank you for visiting us</p>
</div>

<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var city = $('#city').val();
		if(name!="" && email!="" && phone!="" && city!=""){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					name: name,
					email: email,
					phone: phone,
					city: city				
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>
  