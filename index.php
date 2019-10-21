<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/index.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="" />
	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ajax.min.js"></script>
	<title>sms</title>
</head>
<body>
	<nav class="navbar bg-dark text-light">
	 <div class="container">
		 <h1>Darul marif</h1>
  	 <a href="login.php">
  	 	<button type="button" class="btn btn-outline-light">Login</button>
  	 </a>
	 </div>
	</nav>
	<!-- start body content -->
	<div class="row mx-0 my-5">
		<div class="col-6">
			<h2 class="mb-3 text-center">Enter student information</h2>
			<div class="m-auto p-4" style="width: 100%;border:1px solid #ddd;">
				<input type="number" id="roll" placeholder="Enter your roll no" class="form-control my-3" required>
				<select class="form-control my-3" id="standard" required>
					<option value="">Choose standard</option>
					<option value="1">1st</option>
	 				<option value="2">2nd</option>
	 				<option value="3">3rd</option>
	 				<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
	 				<option value="7">7th</option>
	 				<option value="8">8th</option>
	 				<option value="9">9th</option>
					<option value="10">10th</option>
					<option value="11">11th</option>
	 				<option value="12">12th</option>
				</select>
				<input type="submit" onclick="showresult()" value="Show Detail" class="btn btn-primary btn-block my-3">
			</div>
		</div>
		<div class="col-6" id="showdetail"></div>
	</div>
	<h1 class="text-center">Added to github!</h1>
</body>
<script type="text/javascript">
	function showresult()
	{
		var roll = $("#roll").val();
		var standard = $("#standard").val();
		var formdata = new FormData();
		formdata.append('roll',roll);
		formdata.append('standard',standard);
		formdata.append('showresult',"showresult");

		$.ajax({
				 processData:false,
				 contentType:false,
				 data:formdata,
				 type:"post",
				 url:"data.php",
				 success:function(data)
				 {
					 $("#showdetail").html(data);
					 // alert(data);
				 }
					});
	}
</script>
</html>
