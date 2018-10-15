<?php
session_start();
	if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
include 'connection.php';
include 'header.php';
$sr=@$_POST['search_barcode'];
if(isset($_POST['submit'])){
	$stmt = $db->prepare("Select * from tbl_product where serial_no=?");
	$stmt->bindValue(1,$sr);
	$stmt->execute();
	if($row = $stmt ->fetchAll(PDO::FETCH_ASSOC)){

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin-DashBoard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
			margin: 0;padding: 0;
		}
		body{background-color: #e5e5e5;}
		.r1{
			border: 1px solid black;
			padding: 5px;
		}
	</style>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12" align='center'>
		<?php foreach($row as $key){
			echo "<img src='images/".$key['image']."'>";?></div>

			<div class="row">
				<div class="col-md-6 r1" align="center">
		<?php
			echo $key['name'];
			?></div><div class="r1 col-md-6">
		<?php
			echo $key['about'];?></div>
		</div>
			<div class="row">

			<div class="r1 col-md-6" align="center">
		<?php
			echo $key['selling_price']."/-";?></div>
			<div class="r1 col-md-6">
		<?php
			echo $key['discount'];?></div>
		</div>
			<div class="row">

			<div class="r1 col-md-6" align="center">
		<?php
			echo $key['brand'];?></div>
			<div class="r1 col-md-6">
		<?php
			echo $key['color'];?></div>
		</div>
		<div class="row">

			<div class="r1 col-md-6" align="center">
		<?php
			echo $key['size']." inches"; }?>
		</div>
			<div class="col-md-6">
			</div>
		</div>
	</div>

</div>
<div class="container">
	<form action='confirm.php' method="post">
		<div class="row form-group">
			<div class="col-md-2"></div>
			<div class='col-md-8'>
				<label for="name">Customer Name:</label>
				 
					<input class="form-control" type="text" id="name" name="name" placeholder="Enter Customer Name">
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row form-group">
			<div class="col-md-2"></div>
			<div class='col-md-8'>
				<label for="shop_name">Shop Name:</label>
				 
					<input class="form-control" type="text" id="shop_name" name="shop_name" placeholder="Enter Customer Shop Name">
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row form-group">
			<div class="col-md-2"></div>

			<div class='col-md-8'>
				<label for="mobile">Mobile:</label><input class="form-control" type="number" id="mobile" name="mobile" placeholder="Enter Mobile Number">
			</div>
			<div class="col-md-2"></div>
			

		</div>
		<div class="row form-group">
			<div class="col-md-2"></div>

			<div class='col-md-8'>
				<label for="address">Customer Address:</label><input class="form-control" type="text" id="address" name="address" placeholder="Enter Customer Address">
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row form-group">
			<div class="col-md-2"></div>

			<div class='col-md-8'>
				<label for="qty">Quantity:</label><input class="form-control" type="number" id="qty" name="qty" placeholder="<?php foreach($row as $key){ echo"Enter less than".$key['quantity']." values";}?>">
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row form-group">
			<div class="col-md-2"></div>

			<div class='col-md-8'>
				<label for="br_code">Bar code Number:</label>
				<input class="form-control" type="number" id="br_code" name="br_code" value="<?php foreach($row as $key){ echo $key['serial_no'];}?>" readonly>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row form-group">
			<div class="col-md-4"></div>

			<div class='col-md-3'>
				<input type="submit" name="confirm" class="btn btn-warning form-control" value="Confirm">
			</div>
			<div class="col-md-5"></div>
		</div>
	</form>
</div>

</body>
</html>

<?php

	}else{
		echo "Invalid barcode/ Serial number.";
		?>
		<!DOCTYPE html>
<html>
<head>
	<title>Create Order</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">body{background-color: #e5e5e5;} </style>
</head>
<body>
<?php include "header.php"; ?>

<div class="row">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default card-view panel-refresh">
      <div class="refresh-container">
        <div class="la-anim-1"></div>
      </div>
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Create Order</h6>
        </div>
        <div class="pull-right">
          <a href="#" class="pull-left inline-block refresh mr-15">
            <i class="zmdi zmdi-replay"></i>
          </a>
          <a href="#" class="pull-left inline-block full-screen mr-15">
            <i class="zmdi zmdi-fullscreen"></i>
          </a>               
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">
            <form action="ordr.php" name="form1" autocomplete="off" method="post" accept-charset="utf-8">
            <div class="form-group">
             <span class="weight-500 uppercase-font block" style="margin-left:530px; text-transform:none !important;color:#212121">Barcode Scanner</span>
             <p><input type="text" name="search_barcode" value="" class="form-control" style="text-align: center;" placeholder="Barcode Scanner or Enter Serial Number..."></p>
             <p align="center"><input type="submit" class="btn btn-success" name="submit"></p>
           </div>            
           </form>         </div>
         <!--table-->
         </div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
	}
}
}else{
	header("Location:home.php");
}

?>
