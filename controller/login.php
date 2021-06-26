<?php

require_once('../models/login.php');

$login = new Auth();



if(isset($_POST["updatelogin"])){
    if(!empty($_POST['email']) || !empty($_POST['password'])){
        echo $login::change($_POST["email"],$_POST["password"]);
    }
}else{
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        echo $login::login($_POST["email"],$_POST["password"]);
    }
}

if(isset($_GET["action"]) && $_GET["action"] === "logout" ){
    echo $login::logout();
}