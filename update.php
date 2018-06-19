 <?php 
 include "./dao.php";
include "./model.php";

$d=new Dao();
$m= new Model();
  if(isset($_POST['update'])){
		 extract($_POST);
                 move_uploaded_file($_FILES['product_image']['tmp_name'],'img/'. $_FILES['product_image']['name']);
                 //$image=$_FILES['image']['name'];
                
                $newimage=$_FILES["product_image"]["name"];
                if($newimage == '')
                    $product_image=$_POST['oldimage'];
                else
                    $product_image=$_FILES["product_image"]["name"];

                
    $m->setData("product_id", $product_id);
    $m->setData("product_name", $product_name);
    $m->setData("product_price", $product_price);
    $m->setData("product_description", $product_description);
    $m->setData("product_quantity", $product_quantity);
    $m->setData("product_image", $product_image);
    
    
    $arry=array("product_id" => $m->getData("product_id"),
        "product_name" => $m->getData("product_name"),
        "product_price" => $m->getData("product_price"),
        "product_description" => $m->getData("product_description"),
        "product_quantity" => $m->getData("product_quantity"),
        "product_image" => $m->getData("product_image"),
        );
		
       $pk=$d->update("product", $arry, "id=$id");
	if($pk)
        header("location:display.php");
  }	
 ?>