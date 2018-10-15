<?php
	
	include "connection.php";
	if(isset($_POST['submit'])){
		$mail=$_POST['email'];
		$pswd=$_POST['pswd'];

		try{
			$stmt = $db->prepare("SELECT * from login where email= ?");
			$stmt->bindValue(1,$mail);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($res)){
				if(password_verify($pswd,$res['password'])){
				header('Location:admin_homepage.php');
				}else{
				echo "<h3 align=center>Password is incorrect.</h3>";
				}
			}else{
				echo "<h3 align=center>User is not registered.</h3>";	
			}		
		}catch(Exception $e){
			echo "<h3 align=center>Some Error Occuered.</h3>".$e;
		}
	}
include "adminlogin.php";
?>
