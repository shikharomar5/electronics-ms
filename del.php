<?php
session_start();
if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	include 'connection.php';
  	if(@$_GET['id']){
	    $id1=$_GET['id'];
	    $stmt= $db->prepare("DELETE from tbl_product where id=?");
	    $stmt->bindValue(1,$id1);
	    if($stmt->execute()){
	    	header('location:manage_product.php');
	    }else{
	    	echo $id1." Some error occured.";
	    }
	}
}else{
	header('location:home.php');
}
?>