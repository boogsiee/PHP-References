<?php
function connection(){
    // echo "This is a connection";
    $host = "localhost";
    $username = "root";
    $password = "M7b/vh442.0T35k2";
    $database = "school_registrar";
    $con = new mysqli($host, $username, $password, $database);

    if($con->connect_error){
        echo $con->connect_error;
    } else{
        return $con;
    }
}
?>