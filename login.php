<?php session_start();
 if(isset($_SESSION['id'])) {
	   header("location:admin/admindash.php");
}
else {
	?>
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
<div class="container">
  <div class="row my-5">
    <div class="col-12 p-5" style="width:400px;border:1px solid #ddd;margin:auto;">
      <h3 class="m-3">Admin's login</h3>
        <input class="form-control m-3" type="text" id="username" placeholder="Enter your username">
        <input class="form-control m-3" type="password" id="password" placeholder="Enter your password">
        <input class="btn btn-primary btn-block m-3" type="submit" onclick="login()" value="Login">
				<div class="text-center text-danger">
					<?php
					if (isset($_SESSION['msg']))
					{

						echo $_SESSION['msg'];
						session_unset();
				}
					?>
				</div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
function login()
{
   var username = $("#username").val();
   var password = $("#password").val();
   var formdata = new FormData();
   formdata.append('username',username);
   formdata.append('password',password);
   formdata.append('login',"login");

   $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
					var msg = $.trim(data);
					if (msg=="ok") {
						window.location.href = "admin/admindash.php";
					}
					else {
						if (msg=="not") {
							window.location.href = "login.php";
						}

					}
          // window.location.href = "admin/admindash.php"+data;
				}
  				});
}
</script>
</html>
<?php

} ?>
