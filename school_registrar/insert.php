
<?php 
include_once("connection.php");
$con = connection();

if(isset($_POST['submit'])){
    
    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $gender = $_POST['Gender'];
    $birthdate =$_POST['Birthday'];
    $enrol = $_POST['Enrolment_Date'];
    $level = $_POST['Level'];
    

    $sql = "INSERT INTO `student`(`LName`, `FName`, `Gender`, `Birthday`, `Enrolment_Date`, `Level`)
    VALUES ('$fname', '$lname', '$gender', '$birthdate', '$enrol', '$level')";
    $con->query($sql) or die ($con->error);

    echo header("Location: index.php");
    }?>
<html>
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
            <h1> Add Student Data</h1><br/>
            <div class="inner">
            
            <form action="" method="POST">
            
            <div id="column">
                <label>First name </label>
                <input type="text" name="FName" id="search">
        
                <label>Last name </label>
                <input type="text" name="LName" id="search">
            </div>

            <div id="column">
                <label>Gender </label>
                <select name='Gender' id='gender'>
                    <option value="Male"> Male </option>
                <option value="Female"> Female</option>
                </select>

                <label>Birthday</label>
                    <input type="date" name="Birthday" id="search">
            </div>

            <div id="column">
                <label>Date Enrolled</label>
                <input type="date" name="Enrolment_Date" id="search">
            
            <label>Grade Level</label>
            <input type="text" name="Level" id="search">
            </div>
            </div>
        </div>
        <div id="columnlast">
            <input id="submit" type="submit" name="submit" value="Add Data">
        </div>
    </form>
    </div>
    <script>
            const d = new Date();
            document.getElementById("date").innerHTML = d;
        </script>
</body>
</html>