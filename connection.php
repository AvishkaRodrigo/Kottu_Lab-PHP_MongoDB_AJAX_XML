<?php

    require_once __DIR__.'/vendor/autoload.php';
    $con = new MongoDB\Client("<ConnectionStringHere>");
    $db = $con->menu;
    $table = $db->item;

?> 
