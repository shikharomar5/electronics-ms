<?php
session_start();
if(isset($_SESSION['id'])){
	include 'connection.php';

if(isset($_POST['confirm'])){
	$name=$_POST['name'];
	$mob=$_POST['mobile'];
	$address=$_POST['address'];
	$qty=$_POST['qty'];
	$shop=$_POST['shop_name'];
	$br_cd=$_POST['br_code'];

	$stmt= $db->prepare('select * from tbl_product where serial_no=?');
	$stmt->bindValue(1,$br_cd);
	$stmt->execute();
	$row = $stmt ->fetchAll(PDO::FETCH_ASSOC);
	foreach ($row as $key) {
		$store=$key['quantity'];
		$p_id=$key['id'];
		$p_name=$key['name'];
		$price=$key['selling_price'];
	}
	if($store < $qty){
		echo "<h4 align='center'>Quantity can not be greater than stock.</h4>";
		include 'ordr.php';
	}else{

		$stmt= $db->prepare('select name from customer_info where shop_name=?');
		$stmt->bindValue(1,$shop);
		$stmt->execute();
		$res1 = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		foreach ($res1 as $key) {
			$val =  $key['name'];
		}
		if(empty($val)){
			echo "<h4 align='center'>Welcome a new Customer.</h4>";
			$stmt= $db->prepare('insert into customer_info (name,shop_name,mobile,address) values(?,?,?,?)');
			$stmt->bindValue(1,$name);
			$stmt->bindValue(2,$shop);
			$stmt->bindValue(3,$mob);
			$stmt->bindValue(4,$address);
			$stmt->execute();
		}elseif(strcmp($val,$name)==0){

		}
		$stmt= $db->prepare('select * from customer_info where shop_name=?');
		$stmt->bindValue(1,$shop);
		$stmt->execute();
		$row1 = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		foreach($row1 as $key1){
			$cust_id=$key1['id'];
		}


		$remain=$store-$qty;

		$stmt= $db->prepare('update tbl_product set quantity=? where serial_no=?');
		$stmt->bindValue(1,$remain);
		$stmt->bindValue(2,$br_cd);
		$stmt->execute();


		$ttl=$price + $price*10/100;

		$stmt= $db->prepare('insert into tbl_order(p_id,cust_id,p_name,price,qty,barcode,total) values(?,?,?,?,?,?,?)');
		$stmt->bindValue(1,$p_id);
		$stmt->bindValue(2,$cust_id);
		$stmt->bindValue(3,$p_name);
		$stmt->bindValue(4,$price);
		$stmt->bindValue(5,$qty);
		$stmt->bindValue(6,$br_cd);
		$stmt->bindValue(7,$ttl);
		$stmt->execute();

		echo "<h3 align='center'>Your order is confirmed</h3>";
		include 'header.php';
	}
	
}
}else{
	header("Location:home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body></body>
</html>