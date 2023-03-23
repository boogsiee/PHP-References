<?php 
require_once "Student.php";
class Elementary extends Student{
    public $grade1;

    public function __construct($grade1){
        $this->grade1 = $grade1;
    }

    public function getGrade1(){
        echo "This is $this->grade1 Student.";
    }  
}
?>