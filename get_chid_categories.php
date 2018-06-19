<?php

include "./dao.php";
include "./model.php";

$d=new Dao();
$m= new Model();


if(isset($_REQUEST['parent_id']))
{
	$id 	= $_REQUEST['parent_id'];
	
	$result=$d->select("category","category_parent_id=$id");
	 
	$num_rows= @mysqli_num_rows($result);


	if($num_rows > 0)
	{?>
		<div class="form-group">
			<label class="col-md-4 control-label parent" for="main_category">Sub Category</label>  
		  <div class="col-md-4">
			<select id="sub_category" name="sub_category[]" class="form-control parent">
			<option value="" selected="selected">Sub Category</option>
			<?php
			while ($rows = mysqli_fetch_assoc($result))
			{?>
				<option value="<?php echo $rows['category_id'];?>"><?php echo $rows['category_name'];?></option>
			<?php
			}?>
		</select>
		</div>
	</div>		
		
	<?php	
	}
	else{echo "<script>alert('Not found sub category');</script>";}
}

if(isset($_REQUEST['product_category_id']))
{
	$id 	= $_REQUEST['product_category_id'];
	
	$result=$d->select("category","category_parent_id=$id");
	 
	$num_rows= @mysqli_num_rows($result);


	if($num_rows > 0)
	{?>
		<div class="form-group">
			<label class="col-md-4 control-label parent" for="main_category">SUB CATEGORY</label>  
		  <div class="col-md-4">
			<select id="sub_category" name="sub_category[]" class="form-control parent">
			<option value="" selected="selected">SUB CATEGORY </option>
			<?php
			while ($rows = mysqli_fetch_assoc($result))
			{?>
				<option value="<?php echo $rows['category_id'];?>"><?php echo $rows['category_name'];?></option>
			<?php
			}?>
		</select>
		</div>
	</div>		
		
	<?php	
	}
	else{echo "<script>alert('Not found sub category');</script>";}
}

?>