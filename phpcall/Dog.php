<?php 
require_once "Callinterface.php";
Class Dog implements Callinterface{
    public function Call(){
        echo "arf arf";
    }
}
?>