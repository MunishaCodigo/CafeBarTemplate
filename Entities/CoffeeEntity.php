<?php

class CoffeeEntity
{
    public $id;
    public $name;
    public $type;
    public $price;
    public $image;
    public $shot;
    public $description;
    
    function __construct($id, $name, $type, $price, $image, $shot, $description) {
        $this->id           = $id;
        $this->name         = $name;
        $this->type         = $type;
        $this->price        = $price;
        $this->image        = $image;
        $this->shot         = $shot;
        $this->description  = $description;
    }

}

?>
