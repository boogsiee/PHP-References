<?php 
require_once "Callinterface.php";
Class Cat implements Callinterface{
    public function Call(){
        echo "meow meow";
    }
}
?>