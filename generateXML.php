<?php
    // connect to mongodb
    include 'connection.php';
    
    $xml= new DomDocument('1.0');
    $xml->formatOutput=true;

    $menu = $xml->createElement("menu");
    $xml->appendChild($menu);

    
    foreach($table->find() as $items){
        $item = $xml->createElement("item");
        $menu->appendChild($item);
        $name = $items->_id;
        $price = $items->price;
        $type = $items->type;
        $description = $items->description;

        $name=$xml->createElement("name", $name );
        $item->appendChild($name);
        $price=$xml->createElement("price", $price );
        $item->appendChild($price);
        $type=$xml->createElement("type", $type );
        $item->appendChild($type);
        $description=$xml->createElement("description", $description );
        $item->appendChild($description);
    }    
    
    $xml->saveXML();

    $xml->save("xml/new_menu.xml"); 
?>
