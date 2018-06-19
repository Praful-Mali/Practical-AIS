<?php


include "./dao.php";
include "./model.php";

$d=new Dao();
$m= new Model();

if(isset($_POST['newCategory']))
{
    extract($_POST);
	
   
    $m->setData("category_name", $category_name);
  
    
    $arry=array("category_name" => $m->getData("category_name"));
 
    $insert=$d->insert("category", $arry);
    if($insert)
        header("location:addcategory.php");
   
}else if(isset($_POST['category'])){
	
	extract($_POST);
	if(isset($_POST['sub_category'])){
		$main_category = end($_POST['sub_category']);
		
	}
   
    $m->setData("category_parent_id", $main_category);
    $m->setData("category_name", $category_name);
  
    
    $arry=array("category_parent_id" => $m->getData("category_parent_id"),"category_name" => $m->getData("category_name"));
 
    $insert=$d->insert("category", $arry);
    if($insert)
        header("location:addcategory.php");
	
	
}


