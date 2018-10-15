<?php
include 'connection.php';
if(isset($_GET['id'])){
	$id1=$_GET['id'];
}
$name=@$_POST['title'];
$serial=@$_POST['serial'];
$brand=@$_POST['brand'];
$category=@$_POST['category'];
$color=@$_POST['color'];
$size=@$_POST['size'];
$qty=@$_POST['qty'];
$buy_price=@$_POST['buying_price'];
$sell_price=@$_POST['selling_price'];

$about=@$_POST['note'];

if(isset($_POST['submit'])){
	$stmt= $db->prepare("UPDATE tbl_product set name='".$name."',serial_no='".$serial."',category='".$category."',brand='".$brand."',color='".$color."',size='".$size."',quantity='".$qty."',buy_price='".$buy_price."',selling_price='".$sell_price."',about='".$about."' where id=?");
    $stmt->bindValue(1,$id1);
    if($stmt->execute()){
    	header('location:manage_product.php');
    }else{
    	echo "Some error occured.";
    }
}



else{
	header('Location:home.php');
}
?>