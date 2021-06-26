<?php

require_once "../models/orders.php";

$action = null ;

if(isset($_GET["action"])){
    $action = $_GET["action"];
}

$orders = new orders();

if($action === "fetch"){
    echo $orders::getorders();
}elseif($action === "total"){
    echo $orders::totalOrders();
}


if(isset($_POST["deleteid"])){
       echo $orders::deleteOrder($_POST["deleteid"]);
}