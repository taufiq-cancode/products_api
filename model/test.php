<?php

require_once('Product.php');
$size = array("large", "medium");
$color = array("green", "blue");

try{

    $product = new Product(1, "Shirt", "1000", $size, $color, "Description here", "picture123kj.jpg");
    header("Content-type: application/json;charset=UTF-8");
    echo json_encode($product->returnProductAsArray()); 
}catch(ProductException $ex){
    echo "Error: ".$ex->getMessage();
}