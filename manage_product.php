<?php
session_start();
	if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
 include"header.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Electronic Ms</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">body{background-color: #e5e5e5;}</style>
</head>
<body>

	<table id="datable_1" class="table table-bordered table-striped table-hover display pb-30 dataTable no-footer" role="grid" aria-describedby="datable_1_info">
                <thead>
                  <tr role="row">
                  	<th class="sorting_asc" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S.: activate to sort column descending" style="width: 13px;">S. No.</th>
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Product Name: activate to sort column ascending" style="width: 268px;">Product Name</th>
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Serial Number: activate to sort column ascending" style="width: 98px;">Serial Number</th><th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 107px;">Category</th>
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Brand: activate to sort column ascending" style="width: 71px;">Brand</th>
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Stock Available: activate to sort column ascending" style="width: 115px;">Stock Available</th><th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Added Date: activate to sort column ascending" style="width: 154px;">Added Date</th>
                  	<th width='100px'>Action</th>
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
								echo "<td>".$key['name']."</td>";
								echo "<td>".$key['serial_no']."</td>";
								echo "<td>".$key['category']."</td>";
								echo "<td>".$key['brand']."</td>";
								echo "<td>".$key['quantity']."</td>";
								echo "<td>".$key['added_date']."</td>";
								echo "<td width='100px'> <a href='view_product.php?id=".$key['id']."'' 	class='btn btn-primary btn-xs' title='View'>
                    				<i class='fa fa-eye'></i></a>
                    				<a href='edit_product.php?id=".$key['id']."'' class='btn btn-warning btn-xs' title='Edit'><i class='fa fa-pencil'></i></a> 
                    				<a href='javascript:;' data-id='".$key['id']."'' class='btn btn-danger btn-xs' id='del' title='delete'><i class='fa fa-trash'></i></a>
                    				</td>";
								echo "</tr>";
								$i++;
							}
						}else{
							echo "<tr> <td align='center' colspan=8> No Stock Available</td></tr>";
						}

                	?>
                </tbody>
              </table>

</body>
<script type="text/javascript">
    $('#del').click(function(){
        var id = $(this).attr('data-id');

        if(confirm("Are you sure you want to delete this record?")){
            location.href="del.php?id="+id;
        }
    });
</script>
</html>


<?php
}else{
	header("Location:home.php");
}
?>