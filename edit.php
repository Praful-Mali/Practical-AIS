<?php
error_reporting(0);
include "./dao.php";
include "./model.php";
$d=new Dao();
$m=new Model();
$id=$_GET['id'];
$query=$d->select("product","id=$id");
$row= mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
	
	<body>
	
	<form class="form-horizontal" method="post" name="data" action="update.php" enctype="multipart/form-data">
			<fieldset>

				<input type="hidden" name="id" value="<?php echo $row[0];?>">
                <input type="hidden" name="oldimage" value="<?php echo $row[7];?>">
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>  
			  <div class="col-md-4">
			  <input id="product_id" name="product_id" placeholder="PRODUCT ID" value="<?php echo $row[1];?>" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
			  <div class="col-md-4">
			  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" value="<?php echo $row[2];?>" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>  
			  <div class="col-md-4">
			  <input id="product_price" name="product_price" placeholder="PRODUCT PRICE" value="<?php echo $row[3];?>" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>  
			  <div class="col-md-4">
			  <input id="product_description" name="product_description" placeholder="PRODUCT DESCRIPTION" value="<?php echo $row[4];?>" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_category">PRODUCT CATEGORY</label>
			  <div class="col-md-4">
				<select id="product_category" name="product_category[]" value="<?php echo $row[5];?>" class="form-control">
				</select>
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_quantity">PRODUCT QUANTITY</label>  
			  <div class="col-md-4">
			  <input id="product_quantity" name="product_quantity" value="<?php echo $row[6];?>" placeholder="PRODUCT QUANTITY" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>

			<!-- File Button --> 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_image">PRODUCT IMAGE</label>
			  <div class="col-md-4">
				<input id="product_image" name="product_image" class="input-file" type="file">
			  </div>
			</div>
			

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="addproduct"></label>  
			  <div class="col-md-4">
				<button id="addproduct" name="update" value="submit" class="btn btn-primary">Add Product</button>
			  </div>
			  </div>

			</fieldset>
			</form>
	</body>
</html>
			