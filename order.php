<?php
session_start();
if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	include 'header.php';
?><!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">body{background-color: #e5e5e5;} </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6"> <h4>All Order </h4></div>
			<div class="col-md-6" align="right"><h4> Home<i class="fa fa-angle-right"></i>All<i class="fa fa-angle-right"></i>Orders </h4></div>
		</div>
		<div class="row gap"> 
			<table class="table table-striped table-hover" border="1px solid gray" style="font-size: 14px;">
				<th>S.No.</th>
				<th>PRODUCT NAME</th>
				<th>ORDER DATE</th>
				<th>QUANTITY</th>
				<th>PRICE</th>
				<th>TOTAL</th>
				<?php
				include 'connection.php';
				$stmt = $db->prepare("select * from tbl_order");
				$stmt->execute();
				$row = $stmt ->fetchAll(PDO::FETCH_ASSOC);
				$i=1;
				foreach ($row as $key) {
					// echo $key['name'];
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$key['p_name']."</td>";
					echo "<td>".$key['date']."</td>";
					echo "<td>".$key['qty']."</td>";
					echo "<td>".$key['price']."</td>";
					echo "<td>".$key['total']."</td>";
					echo "</tr>";
					$i++;
				}
				
				?>
			</table>
		</div>
	</div>
</body>
</html>
<?php 
}else{
	header("Location:home.php");
}
?> ?>