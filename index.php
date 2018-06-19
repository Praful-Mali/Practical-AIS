<?php
error_reporting(0);
include "./dao.php";
include "./model.php";
$d=new Dao();
$m=new Model();
$id=$_GET['id'];
$category = $d->select('category', "category_parent_id = 0");
$count= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
	<script>
		$(document).ready(function() {
		
		$(document).on('change', '.parent',function() {		
		
			
			$('#dynamic-category').append('<img src="img/loader.gif" style="float:left; margin-top:7px;" id="loader" alt="" />');
			
			$.post("get_chid_categories.php", {
				product_category_id: $(this).val(),
			}, function(response){
				
				setTimeout("finishAjax('dynamic-category', '"+escape(response)+"')", 400);
			});
			
			return false;
		});
	});

	function finishAjax(id, response){
	  $('#loader').remove();

	  $('#'+id).append(unescape(response));
	} 

</script>
	<body>
 
		<form class="form-horizontal" method="post" name="data" action="control.php" enctype="multipart/form-data">
			<fieldset>


			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>  
			  <div class="col-md-4">
			  <input id="product_id" name="product_id" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
			  <div class="col-md-4">
			  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>  
			  <div class="col-md-4">
			  <input id="product_price" name="product_price" placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>  
			  <div class="col-md-4">
			  <input id="product_description" name="product_description" placeholder="PRODUCT DESCRIPTION" class="form-control input-md" required="" type="text">
				
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_category">PRODUCT CATEGORY</label>
			  <div class="col-md-4">
			
				<select id="product_category" name="product_category" class="form-control parent">
					<option value="" selected="selected">SELECT CATEGORY</option>
					<?php  while ($row = mysqli_fetch_assoc($category)) { ?>
							<option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
					<?php }?>
					</select>
			  </div>
			</div>
			
			<div id="dynamic-category">
				
			</div>
			

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="product_quantity">PRODUCT QUANTITY</label>  
			  <div class="col-md-4">
			  <input id="product_quantity" name="product_quantity" placeholder="PRODUCT QUANTITY" class="form-control input-md" required="" type="text">
				
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
				<button id="addproduct" name="addproduct" value="submit" class="btn btn-primary">Add Product</button>
			  </div>
			  </div>

			</fieldset>
			</form>
   </body>
</html>
