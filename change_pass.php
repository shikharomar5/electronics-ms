<?php
session_start();
if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
	if(isset($_POST['submit'])){
		$o_pass=$_POST['old_pass'];
		$n_pass=$_POST['new_pass'];
		$c_pass=$_POST['c_pass'];

	include "connection.php";
	$stmt= $db->prepare("SELECT * FROM login where user_type =?");
	$stmt->bindValue(1,'Admin');
	$stmt->execute();
	$res=$stmt->fetch(PDO::FETCH_ASSOC);
	if(password_verify($o_pass,$res['password'])){
		if(strcmp($n_pass,$c_pass)==0){
			$n_pass=password_hash($n_pass,PASSWORD_BCRYPT);
			$stmt=$db->prepare("UPDATE login set password = '$n_pass' WHERE id=? ");
			$stmt->bindValue(1,$res['id']);
			if($stmt->execute()){
				echo "<h3 align='center'>Password is Changed</h3>";
			}else{
				echo "<h3 align='center'> Some Error Occurred.</h3>";
			}

		}else{
			echo "<h3 align='center'> Confirm Password is not same.</h3>";
		}
	}else{
		echo "<h3 align='center'> Old Password did not match.</h3>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Change Password</title>
	<style type="text/css">
		body{
			background-color: #e5e5e5;
		}
	</style>
</head>
<body>

	<div class="container">
		<h1 align="center" style=" margin-top: 80px;">Change Password</h1>
		<div>
		<form action="change_pass.php" method="post">
			<div class="row form-group" align="center">
				<div class="col-md-offset-2 col-md-8 col-md-offset-2" style="margin-top: 20px;">
					<p> 
						<input type="password" class="form-control" name="old_pass" placeholder="Enter Your Old Password" required>
					</p>
				</div>
			</div>
			<div class="row form-group" align="center">
				<div class="col-md-offset-2 col-md-8 col-md-offset-2">
					<p> 
						<input type="password" class="form-control" name="new_pass" placeholder="Enter New Password" required>
					</p>
				</div>
			</div>
			<div class="row form-group" align="center">
				<div class="col-md-offset-2 col-md-8 col-md-offset-2">
					<p> 
						<input type="password" class="form-control" name="c_pass" placeholder="Re-enter Your New Password" required>
					</p>
				</div>
			</div>
			<div class="row form-group" align="center">
				
				<div class="col-md-2"></div>
					<div class="col-md-4">    
						<input type="submit" class="form-control btn btn-primary" name="submit">
					</div>
					<div class="col-md-4">
						<a href="admin_homepage.php" class="form-control btn btn-primary">Back</a>
				</div>
				<div class="col-md-2"></div>

			</div>
			
		</form>
	</div>
	</div>

</body>
</html>
<?php
}else{
	header("Location:home.php");
}
?>