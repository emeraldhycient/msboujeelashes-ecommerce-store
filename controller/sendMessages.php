<?php

require_once "../models/messages.php";

$messages = new Messages();

if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])){
    echo $messages::sendMessage($_POST["name"],$_POST["email"],$_POST["message"]);
}