<?php 
include_once("connection.php");
$con = connection(); 

$id= $_GET['ID'];
$sql = "SELECT * FROM student WHERE LRN_ID = '$id'";

$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){
    $fname=$_POST['FName'];
    $lname=$_POST['LName'];
    $gender=$_POST['Gender'];
    $enrol = $_POST['Enrolment_Date'];
    $level = $_POST['Level'];

    $sql="UPDATE student SET FName = '$fname', LName = '$lname', Gender = '$gender', Enrolment_Date = '$enrol', Level='$level'
    WHERE LRN_ID = '$id'";
    $con->query($sql) or die ($con->error);

    echo header("Location:details.php?ID=".$id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
    <link rel="stylesheet" href="./CSS/misc.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="head">  
        <?php 
            if(!isset($_SESSION)){
                session_start();
            }
            if(isset($_SESSION["UserLogin"])){
            echo "Dashboard of &nbsp;".$_SESSION['UserLogin'];
        }
        ?>
        </b>
        </b>
        <a id="back" href="index.php"> << Back</a>
        <p id="date"></p>
        </div>
        </header>
        <div class="container">
            <h1>Edit Student Data</h1><br/>
            <div class="inner">
            <form action=" " method="post">
            <div id="column">
                <label>Last Name</label>
                <input type="text" name="FName" id="fname" value="<?php echo $row ['FName'];?>">

                <label>First Name</label>
                <input type="text" name="LName" id="lname" value="<?php echo $row ['LName'];?>">
            </div>
            <div id="column">
                <label>Gender</label>
                <select name='Gender' id='gender'>
                    <option value="Male" <?php echo ($row['Gender'] == "Male")? 'selected' : '';?>
                        >Male </option>
                    <option value="Female" <?php echo ($row['Gender'] == "Female")? 'selected' : '';?>
                        >Female</option>
                </select>
                <label>Birthday</label>
                    <input type="date" name="Birthday" value="<?php echo $row ['Birthday'];?>">
            </div>
            <div id="column">
                <label>Date Enrolled</label>
                    <input type="date" name="Enrolment_Date" id="search" value="<?php echo $row ['Enrolment_Date'];?>">
            
                <label>Grade Level</label>
                    <input type="text" name="Level" id="search" value="<?php echo $row ['Level'];?>">
            </div>

        </div>
        <input id="submit" type="submit" name="submit" value="Update">
        </form>
    </div>
<script>
            const d = new Date();
            document.getElementById("date").innerHTML = d;
        </script>
</body>
</html>
