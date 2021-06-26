<?php

require_once "../models/products.php";

$product = new Products();


if(isset($_POST["editid"])){
    echo $product::fetchOne($_POST["editid"]);
}


if(!empty($_POST["name"] ) && !empty($_POST["price"] ) && !empty($_POST["qty"] ) && !empty($_POST["category"] ) && !empty($_POST["description"] ) ){
    echo ($product::editProduct($_POST["id"],$_POST["name"],$_POST["price"],$_POST["qty"],$_POST["category"],$_POST["description"]));
}