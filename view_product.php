<?php
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    background-color: #fff;
  </style>
</head>
<body>
  <div class="container">
          <div style="background-color: white;">
          <h3 align="center" class="modal-title text-secondry" id="myLargeModalLabel">Product Details</h3>
          </div>
          <div class="col-md-12">
            <div class="modal-body" style="max-height: 900px;">
              <div class="row">
                <div class="col-md-3">
                  <div class="row">
                    <div class="product-thumbnail">
                     
                      <?php
                      include 'connection.php';
                      if(@$_GET['id']){
                        $id=$_GET['id'];
                        $stmt= $db->prepare("Select * from tbl_product where id=?");
                        $stmt->bindValue(1,$id);
                        $stmt->execute();
                        while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
                          echo "<img src='images/".$res['image']."' width='150px' height='60%'' alt='Product Image'>";
                       
                       ?>

                                         
                      </div>
                    </div>
                  </div>

                  <div class="col-md-9">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="active mhead" colspan="2"><?php 
                        echo $res['name'];
                       ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="col-sm-5">Serial Number</td>
                        <td>
                        <?php echo $res['serial_no']; ?>
                        </td>
                      </tr>
                                          <tr>
                       <td class="col-sm-5">Category</td>
                       <td> 
                        <?php echo $res['category']; ?>
                       </td>
                     </tr>
                     
                    
                    <tr>
                      <td class="col-sm-5">Available Stock</td>
                      <td>
                        <?php echo $res['quantity']; ?>
                      </td>
                    </tr>

                    <tr>
                      <td class="col-sm-5">Product Note</td>
                      <td>
                        <?php echo $res['about']; ?>
                      </td>
                    </tr>

                    <tr>
                      <th class="active" colspan="2">Product General Price</th>
                    </tr>
                    <tr>
                      <td class="col-sm-3">MRP</td>
                      <td>
                        <?php echo $res['mrp']; ?>                        
                      </td>
                    </tr>
                    <tr>
                      <td class="col-sm-3">Buying Price</td>
                      <td>
                        <?php echo $res['buy_price']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="col-sm-3">Selling Price</td>
                      <td>
                        <?php echo $res['selling_price']; ?>                        
                      </td>
                    </tr>
                    <tr>
                      <th class="active" colspan="2">Discount Offer</th>
                    </tr>
                    <tr>
                      <td class="col-sm-3">Discount(%)</td>
                      <td>
                        <?php echo $res['discount']; ?>                        
                      </td>
                    </tr>                                       
                    <tr>
                      <th class="active" colspan="2">Attribute</th>
                    </tr>
                    <tr>
                      <td class="col-sm-3">Brand</td>
                      <td>
                        <?php echo $res['brand']; ?>
                      </td>
                    </tr>

                                      <tr>
                      <td class="col-sm-3">Color</td>
                      <td>
                        <?php echo $res['color']; ?>
                      </td>
                    </tr>
                    
                    <tr>
                      <td class="col-sm-3">Size</td>
                      <td>
                        <?php echo $res['size']." Inches"; }}?>
                        
                      </td>
                    </tr>
                                                             
                    <tr>
                      <td colspan="2">
                      </td>
                    </tr>
                  </tbody>                                                           
                </table>

              </div>
            </div>
          </div>
        </div>
</div>
       

</body>
</html>
<style type="text/css">
  
button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
button, html input[type=button], input[type=reset], input[type=submit] {
    -webkit-appearance: button;
    cursor: pointer;
}
button, select {
    text-transform: none;
}
button {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font: inherit;
    color: inherit;
}

@media print{.barcodeprint {overflow:hidden;}.barcode-img {float: left;}
.barcode-img img{width:120px}}tbody { text-align: center;}
.category-tab { overflow-x: none;}
.category-tab .table th { border-right: 1px solid #DEDEDE; text-align: center; font-size: 12px; font-weight: 500; }
.category-tab .table td { padding: 10px 14px; }th.mhead { padding: 10px; }
.btn.act-b-top {width: 35px; height: 35px; padding-top: 8px; margin-bottom: 1px; }
.btn.act-b-top:hover { background: #224CB9; }.modal .table th { padding: 10px; }
.btn.act-b-top i { color: #fff !important; }td.row-hide { padding: 0 !important;border: 0 !important;}
.btn.act-b {width: 26px; height: 26px; padding-top: 4px; margin-bottom: 1px; }
.btn.act-b:hover { background: #224CB9; }
.btn.act-b i { color: #fff !important; }@media (min-width: 992px){.modal-lg {width: 800px !important;}}
.modal-body .product-thumbnail { border-bottom: 1px solid #ddd;}
.modal-body .product-thumbnail img { width: 255px;height: 155px;margin-bottom: 35px;}
.modal-body .product-barcode img {width: 255px;height: 175px;margin-top: 52px;}
.modal-body td.col-sm-5, td.col-sm-3 { font-weight: 500;} .modal-body th.active {/* text-align: center; */
font-weight: 500;color: #000;font-size: 14px;text-transform: unset;}
input.form-control { font-size: 13px !important; }

</style>
<style type="text/css">
  .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
  modal-open {
    overflow: hidden;
}
body {
    color: #878787;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    font-style: normal;
    line-height: 1.5;
    background: #acb0b1;
    overflow-x: hidden;
}
.wrapper {
    background: #fff;
}

.wrapper.theme-1-active .navbar.navbar-inverse {
    background: #f4f4f4;
}
.navbar.navbar-inverse.navbar-fixed-top {
    border-bottom: 1px solid #dedede;
    margin-bottom: 0;
    min-height: 66px;
    padding: 0 15px 0 0;
}
.navbar.navbar-inverse {
    background: #fff;
}
.navbar-inverse {
    background-color: #222;
    border-color: #080808;
}
.navbar-fixed-top {
    top: 0;
    border-width: 0 0 1px;
}
@media (min-width: 768px)
.navbar-fixed-bottom, .navbar-fixed-top {
    border-radius: 0;
}
.navbar-fixed-bottom, .navbar-fixed-top {
    position: fixed;
    right: 0;
    left: 0;
    z-index: 1030;
}
@media (min-width: 768px)
.navbar {
    border-radius: 4px;
}
.navbar {
    position: relative;
    min-height: 50px;
    margin-bottom: 20px;
    border: 1px solid transparent;
}

.wrapper.theme-1-active .fixed-sidebar-left, .wrapper.theme-3-active .fixed-sidebar-left, .wrapper.theme-6-active .fixed-sidebar-left {
    border-right: 1px solid #212121;
}
.wrapper.theme-1-active .fixed-sidebar-left {
    z-index: 1030;
}
@media (max-width: 1400px)
.fixed-sidebar-left {
    width: 44px;
}
.fixed-sidebar-left {
    position: fixed;
    top: 66px;
    left: 0;
    width: 225px;
    margin-left: 0;
    bottom: 0;
    z-index: 100;
    border-right: 1px solid #dedede;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
@media (max-width: 1400px)
.page-wrapper {
    margin-left: 44px;
}
.st1{
  color:success;
}
.page-wrapper {
    margin-left: 225px;
    padding: 50px 20px;
    position: relative;
    background: #e9e9e9;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    left: 0;
}
</style>
<?php
}else{
  header("Location:home.php");
}
?>