<?php
	$f=0;
	if(@$_POST['submit']){
		$mail=$_POST['email'];
		$pswd=$_POST['password'];
		$c_pswd=$_POST['c_password'];
		if($pswd==$c_pswd)
		{
			try{
				include "connection.php";
				$pswd=password_hash($pswd,PASSWORD_BCRYPT);

				$stmt=$db->prepare("SELECT * from login where email= ?");
				$stmt->bindValue(1,$mail);
				$stmt->execute();
				$res=$stmt->fetch(PDO::FETCH_ASSOC);
				if(!empty($res)){
					$f=1;
				}
				if($f==1){
					echo "User Already Registered";
				}else{
					$stmt=$db->prepare("INSERT into login (email,password) values (?,?)");
					$stmt->bindValue(1,$mail);
					$stmt->bindValue(2,$pswd);
					if($stmt->execute()){
						header("Location:adminlogin.php");
					}else{
						echo "Some Error Occured.";
					}
				}
				
			}catch(PDOException $e){
				echo "Error ".$e;
			}
			
		}else{
			echo "Password And Confirm Password did not match.";
		}
	}
	include "registration.php";

?>