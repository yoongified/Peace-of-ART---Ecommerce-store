<?php
require('DATABASE/connection.php');
require('DATABASE/functions.php');
require('add_to_cart.php');

$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type=get_safe_value($con,$_POST['type']);

$ProductSoldQty=ProductSoldQty($con,$pid);
$ProductStock=ProductStock($con,$pid);

$ProductAvail=$ProductStock-$ProductSoldQty;

if($qty<=0){
}
else{ 
     if($qty>$ProductAvail && $type!='remove'){
     echo "not_available";
     die();
     } 

     $obj=new add_to_cart();

     if($type=='add'){
          $obj->addProduct($pid,$qty);
     }

     if($type=='remove'){
          $obj->removeProduct($pid);
     }

     if($type=='update'){
          $obj->updateProduct($pid,$qty);
     }
     echo $obj->totalProduct(); 
     
}


?>