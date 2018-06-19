<?php


include "./dao.php";
include "./model.php";

$d=new Dao();
$m= new Model();

if(isset($_POST['addproduct']))
{
    extract($_POST);
	
    move_uploaded_file($_FILES['product_image']['tmp_name'], 'img/'.$_FILES['product_image']['name']);
    $product_image=$_FILES['product_image']['name'];
   // $product_category=  implode(",", $product_category);
   
    
	 if(isset($_POST['sub_category']) && !empty($_POST['sub_category'])){
		 $sub_category = @array_filter($_POST['sub_category']);
		 $product_category = end($sub_category);
	 }else{
		 $product_category =$_POST['product_category'];
	 }
   
    $m->setData("product_id", $product_id);
    $m->setData("product_name", $product_name);
    $m->setData("product_price", $product_price);
    $m->setData("product_category", $product_category);
    $m->setData("product_description", $product_description);
    $m->setData("product_quantity", $product_quantity);
    $m->setData("product_image", $product_image);
    
    
    $arry=array("product_id" => $m->getData("product_id"),
        "product_name" => $m->getData("product_name"),
        "product_price" => $m->getData("product_price"),
        "product_category" => $m->getData("product_category"),
        "product_description" => $m->getData("product_description"),
        "product_quantity" => $m->getData("product_quantity"),
        "product_image" => $m->getData("product_image"),
        );
 
    $insert=$d->insert("product", $arry);
    if($insert)
        header("location:display.php");
   
}

