<!DOCTYPE html>
<html>
<head>
	<title>User Login-Electrnics Ms</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	 
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col col-md-6" align="center">
				<h1 class="top-left">Electronics MS</h1>
			</div>
			<div class="col col-md-6 login_sec">
				<form method="post" action="login.php">
					<h2 align="left" class="log_title">LogIn</h2>
					<div class="form-group row">
						<div class="col-md-10 form_brdr">
						<p><input class="form-control" type="email" name="email" placeholder="Enter Your Email Id" required></p>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-10">
							<p><input class="form-control" type="password" name="pswd" placeholder="Enter Your Password" required></p>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-offset-2">
							<input class="btn col-md-4 btn-primary" type="submit" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>