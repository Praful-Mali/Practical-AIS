<?php
error_reporting(0);
include "./dao.php";
include "./model.php";
$d=new Dao();
$m=new Model();
$id=$_GET['id'];
$result=$d->select("product","id=$id");
$count= mysqli_num_rows($result);
$product = mysqli_fetch_assoc($result);


if($count > 0){
	
	if(isset($product['product_image']) && $product['product_image'] != ''){
		unlink('img/'.$product['product_image']);
	}

	$query=$d->delete("product","id=$id");
    echo "<script>alert('deleted record');</script>";
    header("location:display.php");}
 else{
     echo "<script>alert(' not deleted record');</script>";}
  ?>