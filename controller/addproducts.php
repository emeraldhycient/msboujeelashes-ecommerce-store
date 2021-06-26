<?php

require_once "../models/products.php";

$product = new Products();

if(!empty($_POST["name"] ) && !empty($_POST["price"] ) && !empty($_POST["qty"] ) && !empty($_POST["category"] ) && !empty($_FILES["image1"]) && !empty($_FILES["image2"]) && !empty($_FILES["image3"] ) && !empty($_POST["description"] ) ){
    echo ($product::addProduct($_POST["name"],$_POST["price"],$_POST["qty"],$_POST["category"],$_FILES["image1"],$_FILES["image2"],$_FILES["image3"],$_POST["description"]));
}