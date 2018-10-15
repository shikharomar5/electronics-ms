<?php 
session_start();
if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Report</title>
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
		<table id="datable_1" class="table table-bordered table-striped table-hover display pb-30 dataTable no-footer" role="grid" aria-describedby="datable_1_info">
	         <thead>
	            <tr role="row">
	            	<th class="sorting_asc" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S.No: activate to sort column descending" style="width: 56px;">S.No</th>
	            	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Product Code: activate to sort column ascending" style="width: 152px;">Product Code</th>
	            	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Product Name: activate to sort column ascending" style="width: 377px;">Product Name</th>
	            	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 77px;">Price</th>
	            	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Stock Qty: activate to sort column ascending" style="width: 113px;">Stock Qty</th>
    	        	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Stock Value: activate to sort column ascending" style="width: 136px;">Stock Value</th>
	            </tr>
	        </thead>
	        <tbody>
	               <?php

                	include 'connection.php';
						$stmt = $db->prepare("SELECT * FROM tbl_product");
						$stmt->execute();
						$row = $stmt ->fetchAll(PDO::FETCH_ASSOC);
						$i=1;
						if(!empty($row)){
							foreach ($row as $key) {
								// echo $key['name'];
								echo "<tr>";
								echo "<td>".$i."</td>";
								echo "<td>".$key['serial_no']."</td>";
								echo "<td>".$key['name']."</td>";
								echo "<td>".$key['selling_price']."</td>";
								echo "<td>".$key['quantity']."</td>";
								echo "<td>".$key['selling_price']*$key['quantity'].".00/-</td>";
								echo "</tr>";
								$i++;
							}
						}else{
							echo "<tr> <td align='center' colspan=7> No Stock Available</td></tr>";
						}

                	?>                                  
	    	</tbody>
	    </table>
    </div>

</body>
</html>
<?php
}else{
	header("Location:home.php");
}
?>