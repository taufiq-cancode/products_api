<?php

class ProductException extends Exception { }

class Product{

    private $_id;
    private $_name;
    private $_price;
    private $_size;
    private $_color;
    private $_description;
    private $_image;

    public function __construct($id, $name, $price, $size, $color, $description, $image){

        $this->setID($id);
        $this->setName($name);
        $this->setPrice($price);
        $this->setSize($size);
        $this->setColor($color);
        $this->setDescription($description);
        $this->setImage($image);
        
    }

    // Creating Getters

    public function getID(){
        return $this->_id;
    }

    public function getName(){
        return $this->_name;
    }

    public function getPrice(){
        return $this->_price;
    }

    public function getSize(){
        return $this->_size;
    }

    public function getColor(){
        return $this->_color;
    }

    public function getDescription(){
        return $this->_description;
    }

    public function getImage(){
        return $this->_image;
    }

    // Creating Setters

    public function setID($id){
        
        if(($id !== null) && (!is_numeric($id) || $id <= 0 || $id > 9223372036854775807 || $this->_id !== null)){
            throw new ProductException("Product ID error");
        }
        $this->_id = $id;
    }
    
    public function setName($name){

        if(strlen($name) < 0 || strlen($name) > 255){
            throw new ProductException("Product name error");
        }
        $this->_name = $name;
    }

    public function setPrice($price){

        if(($price === null) || ($price < 0 || $price > 100000000)){
            throw new ProductException("Product price error");
        }
        $this->_price = $price;
    }

    public function setSize($size){

        if(!is_array($size)){
            throw new ProductException("Product size error");
        }
        $this->_size = $size;
    }

    public function setColor($color){

        if(!is_array($color)){
            throw new ProductException("Product color error");
        }
        $this->_color = $color;
    }

    public function setImage($image){
        
        $imgExtension = strrchr($image, ".");
        if($imgExtension !== ".jpg") {
            throw new ProductException("Product image error");
        }
        $this->_image = $image;
    }

    public function setDescription($description){
        
        if(($description !== null) && (strlen($description) > 16777215)){
            throw new ProductException("Product Description Error");
        }
        $this->_description = $description;
    }


    public function returnProductAsArray(){

        $product = array();
        $product['id'] = $this->getID();
        $product['name'] = $this->getName();
        $product['price'] = $this->getPrice();
        $product['size'] = $this->getSize();
        $product['color'] = $this->getColor();
        $product['description'] = $this->getDescription();
        $product['image'] = $this->getImage();
        
        return $product;
    }

}
