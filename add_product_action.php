<?php 
session_start();
include "connection.php";
if(isset($_POST['submit'])){
	$p_name=$_POST['title'];
	$s_no=$_POST['serial'];
	$brand=$_POST['brand'];
	$category=$_POST['category'];
	$color=$_POST['color'];
	$size=$_POST['size'];
	$qty=$_POST['qty'];
	$mrp=$_POST['mrp'];
	$buy_prce=$_POST['buying_price'];
	$sell_prce=$_POST['selling_price'];
	$discount=$_POST['discount'];
	$description=$_POST['note'];


	$target = 'images/'.basename($_FILES['image']['name']);
	$img=$_FILES['image']['name'];
	$stmt=$db->prepare("INSERT into tbl_product (name,serial_no,category,brand,color,size,quantity,mrp,buy_price,selling_price,discount,image,about) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bindValue(1,$p_name);
	$stmt->bindValue(2,$s_no);
	$stmt->bindValue(3,$category);
	$stmt->bindValue(4,$brand);
	$stmt->bindValue(5,$color);
	$stmt->bindValue(6,$size);
	$stmt->bindValue(7,$qty);
	$stmt->bindValue(8,$mrp);
	$stmt->bindValue(9,$buy_prce);
	$stmt->bindValue(10,$sell_prce);
	$stmt->bindValue(11,$discount);
	$stmt->bindValue(12,$img);
	$stmt->bindValue(13,$description);
	if($stmt->execute()){
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			header('location:add_product.php?add=1');
		}else{
			header('location:add_product.php?add=2');
		}
	}
}
 ?>