<?php 
class Student{
    public $name;
    public $age;
    
    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }

    // public function intro(){
    //     echo "This is $this->name $this->age years old <br/>";
    // }
}
?>