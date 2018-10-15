<!DOCTYPE html>
<html>
<head>
	<title> Register Your Self Here</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<form method="post" action="reg.php">
	
	<div class="container">
	<div class="form-group row">
		<div class="col">
		<p align="center">
			<input type="email" class="col-md-5 col-md-offset-3 form-control" name="email" placeholder="Enter your Email" required>
		</p>
	</div>
	</div>
	<div class="form-group row">
		<div class="col">
		<p align="center">
			<input type="password" class="col-md-5 col-md-offset-3 form-control" name="password" placeholder="Enter your Password" required>
		</p></div>
	</div>
	<div class="form-group row"><div class="col">
		<p align="center">
			<input type="password" class="col-md-5 col-md-offset-3 form-control" name="c_password" placeholder="Confirm your Password" required>
		</p></div>
	</div>
	<div class="form-group row"><div class="col">
		<p align="center">
			<input type="submit" class="col-sm-3 form-control btn btn-primary" name="submit">Already a member? <a href='adminlogin.php'>Sign in</a>
		</p></div>
	</div>
		
	
</div>
</form>
</body>
</html>