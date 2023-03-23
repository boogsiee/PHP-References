<?php 
include_once("connection.php");
$con = connection();

echo $_POST['ID'];

if(isset($_POST['delete'])){
    $id = $_POST['ID'];
    $sql = "DELETE FROM student WHERE LRN_ID='$id' ";
    $con->query($sql) or die ($con->error);
    echo header("Location: index.php");
}

?>