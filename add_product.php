<?php
	session_start();
	if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
		include "header.php";

if(@$_GET['add']==2){
	echo "<h3 align='center'>Some Error Occured to upload image.</h3>";
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
							<h6 class="panel-title txt-dark">Add Product</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body panelpad">
							<div class="form-wrap">

							  <form action="add_product_action.php" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Product Name<span class="red">*</span></label>
										<input type="text" name="title" class="form-control"  placeholder="Product Name" required>
										 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Serial Number<span class="red">*</span></label>
										<input type="number" name="serial" class="form-control"  placeholder="Serial Number" required>
																	</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Brand<span class="red">*</span></label>
										<input type="text" name="brand" class="form-control brand_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Catgeory <span class="like_msg">(Category like mobile,tv etc.)</span></label>								
										<input type="text" name="category" class="form-control category2_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Color</label>
										<input type="text" name="color" class="form-control color_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>						

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Size</label>
										<input type="text" name="size" class="form-control size_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Quantity<span class="red">*</span></label>
										<input type="number" name="qty" class="form-control" placeholder="Quantity" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Price (Mrp)<span class="red">*</span></label>
										<input type="text" name="mrp" class="form-control decimal" placeholder="Mrp Price" required>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Buying Price<span class="red">*</span></label>
										<input type="text" name="buying_price" class="form-control decimal" value="" placeholder="Buying Price" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Selling Price<span class="red">*</span></label>
										<input type="text" name="selling_price" class="form-control decimal" placeholder="Selling Price" required> 
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Discount</label>
										<input type="text" name="discount" class="form-control decimal" placeholder="Discount" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Browse Image</label>
										<input type="file" class="mt-10" name="image" accept="image/*" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Description</label>
										<textarea class="form-control" rows="5" name="note"></textarea>
									</div>
								</div>

								<div class="col-md-12">
								<div class="form-group mt-15 mb-30 text-center">
									<input type="submit" class="btn btn-success btn-anim" name="submit" value="Submit">
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
}elseif(@$_GET['add']==1){
	echo "<h3 align='center'> Data is submitted.</h3>";
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
		body{background-color:#e5e5e5; background-repeat: no-repeat;background-size: cover; background-attachment: fixed;}
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
							<h6 class="panel-title txt-dark">Add Product</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body panelpad">
							<div class="form-wrap">

							  <form action="add_product_action.php" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Product Name<span class="red">*</span></label>
										<input type="text" name="title" class="form-control"  placeholder="Product Name" required>
										 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Serial Number<span class="red">*</span></label>
										<input type="number" name="serial" class="form-control"  placeholder="Serial Number" required>
																	</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Brand<span class="red">*</span></label>
										<input type="text" name="brand" class="form-control brand_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Catgeory <span class="like_msg">(Category like mobile,tv etc.)</span></label>								
										<input type="text" name="category" class="form-control category2_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Color</label>
										<input type="text" name="color" class="form-control color_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>						

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Size</label>
										<input type="text" name="size" class="form-control size_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Quantity<span class="red">*</span></label>
										<input type="number" name="qty" class="form-control" placeholder="Quantity" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Price (Mrp)<span class="red">*</span></label>
										<input type="text" name="mrp" class="form-control decimal" placeholder="Mrp Price" required>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Buying Price<span class="red">*</span></label>
										<input type="text" name="buying_price" class="form-control decimal" value="" placeholder="Buying Price" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Selling Price<span class="red">*</span></label>
										<input type="text" name="selling_price" class="form-control decimal" placeholder="Selling Price" required> 
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Discount</label>
										<input type="text" name="discount" class="form-control decimal" placeholder="Discount" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Browse Image</label>
										<input type="file" class="mt-10" name="image" accept="image/*" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Description</label>
										<textarea class="form-control" rows="5" name="note"></textarea>
									</div>
								</div>

								<div class="col-md-12">
								<div class="form-group mt-15 mb-30 text-center">
									<input type="submit" class="btn btn-success btn-anim" name="submit" value="Submit">
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
}else{
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
							<h6 class="panel-title txt-dark">Add Product</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body panelpad">
							<div class="form-wrap">

							  <form action="add_product_action.php" autocomplete="off" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Product Name<span class="red">*</span></label>
										<input type="text" name="title" class="form-control"  placeholder="Product Name" required>
										 
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Serial Number<span class="red">*</span></label>
										<input type="number" name="serial" class="form-control"  placeholder="Serial Number" required>
																	</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Brand<span class="red">*</span></label>
										<input type="text" name="brand" class="form-control brand_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Catgeory <span class="like_msg">(Category like mobile,tv etc.)</span></label>								
										<input type="text" name="category" class="form-control category2_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Color</label>
										<input type="text" name="color" class="form-control color_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>						

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Size</label>
										<input type="text" name="size" class="form-control size_auto ui-autocomplete-input" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible" required></span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Quantity<span class="red">*</span></label>
										<input type="number" name="qty" class="form-control" placeholder="Quantity" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Price (Mrp)<span class="red">*</span></label>
										<input type="text" name="mrp" class="form-control decimal" placeholder="Mrp Price" required>
																	</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Buying Price<span class="red">*</span></label>
										<input type="text" name="buying_price" class="form-control decimal" value="" placeholder="Buying Price" required>
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Selling Price<span class="red">*</span></label>
										<input type="text" name="selling_price" class="form-control decimal" placeholder="Selling Price" required> 
																	</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Discount</label>
										<input type="text" name="discount" class="form-control decimal" placeholder="Discount" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Browse Image</label>
										<input type="file" class="mt-10" name="image" accept="image/*" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Description</label>
										<textarea class="form-control" rows="5" name="note"></textarea>
									</div>
								</div>

								<div class="col-md-12">
								<div class="form-group mt-15 mb-30 text-center">
									<input type="submit" class="btn btn-success btn-anim" name="submit" value="Submit">
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
}else{
	header("Location:home.php");
}
?>