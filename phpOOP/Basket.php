<?php 
require_once "Fruit.php";
class Basket extends Fruit{
    public $basket1;

    public function __construct($color, $name, $basket1, $size){
        $this->basket = $basket1;
        $this->name = $name;
        $this->color = $color;
        $this->size = $size;
    }

    public function inside(){
        echo "The $this->color $this->name in this $this->basket is $this->size.";
    }  
}
?>