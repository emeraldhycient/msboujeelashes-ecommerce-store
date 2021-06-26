<?php

require_once "../models/products.php";

$product = new Products();

if(!empty($_GET["cat"])){
    echo $product::fetchCategory($_GET["cat"]);
 }