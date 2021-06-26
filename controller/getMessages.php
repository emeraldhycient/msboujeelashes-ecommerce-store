<?php

require_once "../models/messages.php";

$messages = new Messages();

$action = $_GET["action"];

if($action === "fetch"){
  echo $messages::fetchMessage();
}elseif($action === "total"){
   echo $messages::totalMessage();
}