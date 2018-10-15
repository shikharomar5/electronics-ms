<?php
try{
	$host='localhost';
	$dbname='electronic_ms';
	$dsn='mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
	$db=new PDO($dsn,'root','');
}catch(Exception $e){
	echo "Something went wrong ".$e;
}
?>