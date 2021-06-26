<?php

require_once "../models/products.php";

$action = $_GET["action"];

$product = new Products();

if($action === "fetch"){
    echo $product::fetchAll();
}elseif($action === "total"){
    echo $product::totalProduct();
}

if (!empty($_POST["deleteid"])) {
echo  $product::deleteProduct($_POST["deleteid"]);
}