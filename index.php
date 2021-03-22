<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$path = strtolower(explode("/",$_SERVER['SERVER_PROTOCOL'])[0])."://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);

define('ROOT', $path);
define('ASSETS', $path."assets/");
define('CURRENCY', '&#x20A6;');


include "core/config.php";
include "core/controller.php";
include "core/functions.php";
include "core/database.php";

include "core/app.php";

$app = new App();