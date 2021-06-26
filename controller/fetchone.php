<?php

require_once "../models/products.php";

$product = new Products();

if(!empty($_GET["productId"])){
    echo $product::fetchOne($_GET["productId"]);
 }