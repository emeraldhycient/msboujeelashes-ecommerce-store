<?php

require_once "../models/products.php";

$product = new Products();

if (isset($_POST["deleteid"])) {
echo  $product::deleteProduct($_POST["deleteid"]);
}