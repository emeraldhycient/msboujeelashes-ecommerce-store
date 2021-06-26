<?php
require_once "../models/orders.php";

$orders = new orders();

if(!empty($_POST["productname"]) && !empty($_POST["id"]) && !empty($_POST["qty"]) && !empty($_POST["email"]) && !empty($_POST["address"])){
     echo $orders::bookOrder($_POST["qty"],$_POST["productname"],$_POST["id"],$_POST["address"],$_POST["fullname"],$_POST["email"]);
}