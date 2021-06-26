<?php

require_once('../models/login.php');

$login = new Auth();

if(!empty($_POST['facebook']) && !empty($_POST['email'])&& !empty($_POST['whatsapp'])&& !empty($_POST['phone']) && !empty($_POST['instagram'])){
    echo $login::updateSocialLinks($_POST["facebook"],$_POST["email"],$_POST["whatsapp"],$_POST["phone"],$_POST["instagram"]);
}

if(isset($_GET["action"]) && $_GET["action"] === "fetch"){
   echo $login::fetchSocialLinks();
}