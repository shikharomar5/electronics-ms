<?php 
session_start();
if(isset($_SESSION['id'])) {
	$id=$_SESSION['id'];
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
	</style>
</head>
<body>
	<?php include "header.php"; ?>
	<div class="container-fluid">
		<div class="row gap1">
			
			<div class="col-md-2 gap1 divcolr_home">
				<div class="span1">
					<?php 
					include "connection.php";
					$stmt = $db->prepare("SELECT * from customer_info");
					$stmt->execute();
					$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$i=0;
					foreach ($row as $key) {
							$i++;
					}
					echo '<p style="margin:15px 0 0 0px;">'.$i.'</p>';
					?>
				</div>
				<span class="span1">Total Customers</span>
			</div>

			

			<div class="col-md-3 gap1 divcolr_home">
				<div class="span1"><?php
					$stmt = $db->prepare("SELECT * from tbl_product");
					$stmt->execute();
					$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$i=0;
					foreach ($row as $key) {
							$i++;
					}
					echo '<p style="margin:15px 0 0 0;">'.$i.'</p>';
					?>
				</div>
				<span class="span1">Total Product</span>
			</div>


			<div class="col-md-3 gap1 divcolr_home">
				<div class="span1"><?php
					$stmt = $db->prepare("SELECT * from tbl_order");
					$stmt->execute();
					$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$i=0;
					foreach ($row as $key) {
							$i++;
					}
					echo '<p style="margin:15px 0 0 0;">'.$i.'</p>';
					?></div>
				<span class="span1">Total Order</span>
			</div>


			<div class="col-md-3 divcolr_home" style="margin-left: 10px;">
				<div class="span1"><?php
					$stmt = $db->prepare("SELECT total from tbl_order");
					$stmt->execute();
					$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$i=0.0;
					foreach ($row as $key) {
							$i= $i+$key['total'];
					}
					echo '<p style="margin:15px 0 0 0;">'.$i.'</p>';
					?></div>
				<span class="span1">Total Sale</span></div>
		</div> 
		<div class="container marg">
			<div class="panel panel-default card-view panel-refresh">
        <div class="refresh-container">
          <div class="la-anim-1"></div>
        </div>
        <div class="panel-heading">
          <div class="pull-left">
            <h6 class="panel-title txt-dark">New Orders</h6>
          </div>
          <div class="pull-right">
            <a href="#" class="pull-left inline-block refresh mr-15">
              <i class="zmdi zmdi-replay"></i>
            </a>
            <a href="#" class="pull-left inline-block full-screen mr-15">
              <i class="zmdi zmdi-fullscreen"></i>
            </a>
            <div class="pull-left inline-block dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
              <ul class="dropdown-menu bullet dropdown-menu-right" role="menu">
                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
              </ul>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body row pa-0">
           <div class="table-wrap">
            <div class="table-responsive category-tab">
            <div id="productprint">
              <div id="datable_1_wrapper" class="dataTables_wrapper no-footer">

              
              <table id="datable_1" class="table table-bordered table-striped table-hover display mb0 pb15 dataTable no-footer" role="grid" aria-describedby="datable_1_info">
                <thead>
                  <tr role="row">
                  	<th class="sorting_asc" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S.No: activate to sort column descending" style="width: 67px;">S.No</th>
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Product Name: activate to sort column ascending" style="width: 174px;">Image</th>
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Product Name: activate to sort column ascending" style="width: 174px;">Product Name</th>
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Order Status: activate to sort column ascending" style="width: 161px;">Order Status</th>
                  
                  	<th class="sorting" tabindex="0" aria-controls="datable_1" rowspan="1" colspan="1" aria-label="Order Date: activate to sort column ascending" style="width: 139px;">Order Date</th>
                  	
                </thead>
                <tbody>
					
						<?php 
							$today=getdate();
							$d=$today['mday'];
							$m=$today['mon'];
							if(strlen($m)==1){
								$m='0'.$m;
							}
							$y=$today['year'];
							$date=$y."-".$m."-".$d;
							// echo "<br>".$date;
							$stmt = $db->prepare("SELECT p_id,date from tbl_order");
							$stmt->execute();
							$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
							foreach ($res as $key1) {
								$p_id=$key1['p_id'];
							}

							$stmt = $db->prepare("SELECT name,image from tbl_product where id=?");
							$stmt->bindValue(1,$p_id);
							$stmt->execute();
							$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
							foreach ($row as $key2) {
								$name=$key2['name'];
								$img=$key2['image'];
							}
							$i=0;
							if(!empty($p_id)){
								foreach ($res as $key) {
									$arr= substr($key['date'], 0, 10);
									if(strcmp($date, $arr)==0){
										
										echo "<tr>";
										echo "<td>".++$i.").</td>";
										echo "<td><img src='images/".$img."' height=100px></td>";
										echo "<td align='center'><h4>".$name."</h4></td>";
										echo "<td align='center'> Success </td>";
										echo "<td align='center'>".$arr."</td>";
										echo "</tr>";
									}
								}
							}else{
								echo "<tr> No Data to show.</tr>";
							}
							


						?>
					
				</tbody>
              </table>

              
            </div>
   			</div>
            </div>
          </div>  
          </div>  
        </div>
      </div>
		</div>
	</div>
</body>
</html>
<?php
if(isset($_GET['logout'])){
	echo "<p align='center'>Please Logout First.<p>";
}
}else{
	header("Location:home.php");
}
?>