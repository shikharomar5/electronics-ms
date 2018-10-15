<?php
session_start();
if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Order</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">body{background-color: #e5e5e5;} </style>
</head>
<body>
<?php include "header.php"; ?>

<div class="row">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default card-view panel-refresh">
      <div class="refresh-container">
        <div class="la-anim-1"></div>
      </div>
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">Create Order</h6>
        </div>
        <div class="pull-right">
          <a href="#" class="pull-left inline-block refresh mr-15">
            <i class="zmdi zmdi-replay"></i>
          </a>
          <a href="#" class="pull-left inline-block full-screen mr-15">
            <i class="zmdi zmdi-fullscreen"></i>
          </a>               
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-wrap">
            <form action="ordr.php" name="form1" autocomplete="off" method="post" accept-charset="utf-8">
            <div class="form-group">
             <span class="weight-500 uppercase-font block" style="margin-left:530px; text-transform:none !important;color:#212121">Barcode Scanner</span>
             <p><input type="text" name="search_barcode" value="" class="form-control" style="text-align: center;" placeholder="Barcode Scanner or Enter Serial Number..."></p>
             <p align="center"><input type="submit" class="btn btn-success" name="submit"></p>
           </div>            
           </form>         </div>
         <!--table-->
         </div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
}else{
  header("Location:home.php");
}
?>