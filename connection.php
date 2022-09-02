<?php

    require_once __DIR__.'/vendor/autoload.php';
    $con = new MongoDB\Client("mongodb+srv://User1:Kottu01@kottulab.n74sbl3.mongodb.net/?retryWrites=true&w=majority");
    $db = $con->menu;
    $table = $db->item;

?> 