<?php
session_start();
if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	include 'connection.php';
  	if(@$_GET['id']){
	    $id1=$_GET['id'];
	    $stmt= $db->prepare("Select * from tbl_product where id=?");
	    $stmt->bindValue(1,$id1);
	    $stmt->execute();
	    while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
	    	$name=$res['name'];
	    	$s_no=$res['serial_no'];
	    	$brnd=$res['brand'];
	    	$cat=$res['category'];
	    	$clr=$res['color'];
	    	$size1=$res['size'];
	    	$qty1=$res['quantity'];
	    	$mrp1=$res['mrp'];
	    	$size1=$res['size'];
	    	$buy=$res['buy_price'];
	    	$sell=$res['selling_price'];
	    	$disc=$res['discount'];
	    	$about1=$res['about'];
	    }
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
		body{background-color: #e5e5e5; background-repeat: no-repeat;background-size: cover; background-attachment: fixed;}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6"><h4>Product</h4></div>
			<div class="col-md-6" align="right"><h4>Home <i class="fa fa-angle-right"></i> Product</h4></div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Update Product Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body panelpad">
							<div class="form-wrap">

							  <form action="update.php?id=<?php echo $id1 ?>" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Product Name<span class="red">*</span></label>
										<input type="text" name="title" class="form-control"  placeholder="Product Name" value="<?php echo $name; ?>" required>
										 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Serial Number<span class="red">*</span></label>
										<input type="number" name="serial" class="form-control"  placeholder="Serial Number" value="<?php echo $s_no; ?>" required>
																	</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Brand<span class="red">*</span></label>
										<input type="text" name="brand" class="form-control brand_auto ui-autocomplete-input" value="<?php echo $brnd; ?>"  autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Catgeory <span class="like_msg">(Category like mobile,tv etc.)</span></label>								
										<input type="text" name="category" value="<?php echo $cat; ?>" class="form-control category2_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Color</label>
										<input type="text" name="color" class="form-control color_auto ui-autocomplete-input" value="<?php echo $clr; ?>" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>						

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Size</label>
										<input type="text" value="<?php echo $size1; ?>" name="size" class="form-control size_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Quantity<span class="red">*</span></label>
										<input type="number" name="qty" value="<?php echo $qty1; ?>" class="form-control" placeholder="Quantity" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Price (Mrp)<span class="red">*</span></label>
										<input type="text" name="mrp" value="<?php echo $mrp1; ?>" class="form-control decimal" readonly placeholder="Mrp Price" required>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Buying Price<span class="red">*</span></label>
										<input type="text" name="buying_price" value="<?php echo $buy; ?>" class="form-control decimal" value="" placeholder="Buying Price" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Selling Price<span class="red">*</span></label>
										<input type="text" name="selling_price" value="<?php echo $sell; ?>" class="form-control decimal" placeholder="Selling Price" required> 
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Discount</label>
										<input type="text" name="discount" value="<?php echo $disc; ?>" class="form-control decimal" readonly placeholder="Discount" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Description</label>
										<textarea rows="5" name="note" class="form-control" value="<?php echo $about1; ?>"> </textarea>
									</div>
								</div>

								<div class="col-md-12">
								<div class="form-group mt-15 mb-30 text-center">
									<input type="submit" class="btn btn-success btn-anim" name="submit" value="Confirm">
									<a href="admin_homepage.php" class="btn btn-default">Cancel</a>
								</div></div>
							</form>				</div>
					</div>
				</div>
			</div>
		</div>
		</div>


	</div>
</body>
</html>

<?php
}
}
?>