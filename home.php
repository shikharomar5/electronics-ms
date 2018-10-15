<?php
session_start();
if(isset($_SESSION['id'])){
	header("location:admin_homepage.php?logout=0");}
	if(@$_GET['error']){
	echo "<p align='center' style='margin-top:30px; color:red;'>*Password is incorrect!</p>";
	echo "<p align='center' style='color:red;'>*Please enter your password again.</p>";
	$id=$_GET['error'];
	$conn=mysqli_connect('localhost','root','','electronic_ms');
	$qry="select email from login where id='$id'";
	$sql=mysqli_query($conn,$qry);
	$res=mysqli_fetch_assoc($sql);

?>
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
				<form method="post" action="home.php">
					<h2 align="left" class="log_title">LogIn</h2>
					<div class="form-group row">
						<div class="col-md-10 form_brdr">
						<p><input class="form-control" type="email" name="email" placeholder="Enter Your Email Id" value="<?php  echo $res['email'] ?>" required></p>
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

<?php
}else{
?>
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
				<form method="post" action="home.php">
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
<?php
}
	include "connection.php";
	if(isset($_POST['submit'])){

		if(isset($_SESSION['id'])){
			header("location:admin_homepage.php?logout=0");
		}else{

			$mail=$_POST['email'];
			$pswd=$_POST['pswd'];

			
			$stmt = $db->prepare("SELECT * from login where email= ?");
			$stmt->bindValue(1,$mail);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($res)){
				if(password_verify($pswd,$res['password'])){
					$id=$res['id'];
					$_SESSION['id']=$id;
					header('Location:admin_homepage.php');
				}else{
					header("location:home.php?error=".$res['id']."");	
				}
			}else{
				echo "<h3 align=center>User is not registered.</h3>";
			}		
			
		}
	}

?>
