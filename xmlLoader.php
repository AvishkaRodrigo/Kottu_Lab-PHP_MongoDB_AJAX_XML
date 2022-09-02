<?php
    // connect to mongodb
    include 'connection.php';

    $xml = simplexml_load_file("menu.xml");

    
    // $tbl->InsertOne(["Name"=>"Kottu"]);
    // print_r($con);
    
    foreach($xml->children() as $item){
        $name = $item->name;
        $price = $item->price;
        $type = $item->type;
        $description = $item->description;

    try{
        $table->Insertone([
            "_id" => "$name",
            "price"=> "$price",
            "type" => "$type",
            "description" => "$description"
        ]);
    }catch (Exception $err) {
          // echo  $err;
    };

    };
    
?>
