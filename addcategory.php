<?php
//error_reporting(0);
include_once 'dao.php';
include_once 'model.php';
$d = new Dao();
$m = new Model();
$result = $d->select('category', "category_parent_id = 0");
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
				parent_id: $(this).val(),
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
	
		<form class="form-horizontal" method="post" name="data" action="category.php">
			<fieldset>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="category_name">Add Main Category</label>  
				  <div class="col-md-4">
					 <input id="category_name" name="category_name" placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text">
				  </div>
				</div>
				
				<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="newCategory"></label>  
			  <div class="col-md-4">
				<button id="newCategory" name="newCategory" class="btn btn-primary">Add New Category</button>
			  </div>
			</div>
			</fieldset>
		</form>
 
		<form class="form-horizontal" method="post" name="data" action="category.php">
			<fieldset>
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="main_category">Main Category</label>  
				  <div class="col-md-4">
					<select id="main_category" name="main_category" class="form-control parent">
					<option value="" selected="selected">Categories</option>
					<?php  while ($row = mysqli_fetch_assoc($result)) { ?>
							<option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
					<?php }?>
					</select>
				  </div>
				</div>
				
				<div id="dynamic-category">
				
				</div>
				
				<div class="form-group">
				  <label class="col-md-4 control-label " for="category_name" >Category Name</label>  
				  <div class="col-md-4">
					 <input id="category_name" name="category_name" placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-4 control-label" for="category"></label>  
				  <div class="col-md-4">
					<button id="category" name="category" class="btn btn-primary">Add Category</button>
				  </div>
				</div>
			</fieldset>
		</form>
		
		
		
   </body>
</html>
