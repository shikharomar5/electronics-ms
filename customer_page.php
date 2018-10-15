<?php 
session_start();
if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer-Information</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">body{background-color: #e5e5e5;} </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row ">
			<div class="col-md-2">
				<div class="nav1">
					<ul>
						<li>
							<a href="admin_homepage.php"> <h4><i class="fa fa-align-justify">Electronic Ms</i></h4></a>
							<ul>
								<li><a href="admin_homepage.php"> <h4>DashBoard</h4> </a></li>
								<li><a href="create_order.php"><h4> Create Order </h4></a></li>
								<li><a href=""><h4> Product Management </h4></a>
									<ul class="ul1">
										<li><a href="add_product.php"> Add Product </a></li>
										<li><a href="manage_product.php"> Manage Product </a></li>
									</ul>
								</li>
								<li><a href="order.php"><h4> Order Management </h4></a>
								<li><a href="customer_page.php"><h4> Customer Management </h4></a></li>
								<li><a href="stock_report.php"><h4> Report Management </h4></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>


			<div class="col-md-8 pos" style="padding-left: 45px;">
				<div class="row">
					<div class="col-md-6"> <h4>Customer </h4></div>
					<div class="col-md-6" align="right"><h4> Home>Customer </h4></div>
				</div>
				<div class="row gap"> 
					<table class="table table-striped table-hover" border="1px solid gray" style="font-size: 14px;">
						<th>S.No.</th>
						<th>Customer Name</th>
						<th>Customer Shop Name</th>
						<th>Customer Mobile</th>
						<th>Customer Address</th>
						<?php
						include 'connection.php';
						$stmt = $db->prepare("select * from customer_info");
						$stmt->execute();
						$row = $stmt ->fetchAll(PDO::FETCH_ASSOC);
						$i=1;
						foreach ($row as $key) {
							// echo $key['name'];
							echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$key['name']."</td>";
							echo "<td>".$key['shop_name']."</td>";
							echo "<td>".$key['mobile']."</td>";
							echo "<td>".$key['address']."</td>";
							echo "</tr>";
							$i++;
						}
						
						?>
					</table>
				</div>
			</div>


			<div class="col-md-2 user" align="center">
				<ul>
					<li><h2><a href="#"> <i class="fa fa-user-circle icon1"></i> </a></h2>
					<ul>
						<li align="center" style="margin-left: -35px;"><a href="change_pass.php"> Change Password </a></li>
						<li align="center" style="margin-left: -35px;"><a href="home.php"> LogOut </a></li>
					</ul>				
				</li></ul>
			</div>
		</div>
	</div>
</body>
</html>
<style type="text/css">
	.ul2{height: 100px;}
</style>
<?php
}else{
	header("Location:home.php");
}
?>