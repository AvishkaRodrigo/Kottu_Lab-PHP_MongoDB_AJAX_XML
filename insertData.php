<?php 

    require_once __DIR__.'/vendor/autoload.php';

    require 'connection.php';
    
    if($_POST){
        $doc=array(
            '_id' => $_POST['name'],
            'price' => $_POST['price'],
            'type' => $_POST['type'],
            'description' => $_POST['description'],
        );
        
        if($table->insertOne($doc)){
            echo "data inserted";
        }else{
            echo "error";

        }
    }else{
        echo "no data";
    }
?>
