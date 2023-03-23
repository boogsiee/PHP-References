
<?php 

    include_once("connection.php");
    $con = connection(); 

    $id= $_GET['ID'];
    $sql = "SELECT * FROM student WHERE LRN_ID = '$id'";

    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();
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
        <h1> Student Profile</h1><br/>
            <div class="inner">
            
        <br/>
            <h2><?php echo $row['LName'];?> <?php echo $row['FName'];?></h2>
            <p> is a <b><?php echo $row['Gender'];?></b> student. Born on <b><?php echo $row['Birthday'];?></b>. Enrolled on <b><?php echo $row['Enrolment_Date'];?></b> as Grade <b><?php echo $row['Level'];?></b>.</p>
    </div>
            <form action="delete.php" method="post">
                <button id="submit"><a href="edit.php?ID=<?php echo $row['LRN_ID']; ?>">Edit</a>
                <button id="submit" type="submit" name="delete">Delete</button>
                <input type="hidden" name="ID" value="<?php echo $row['LRN_ID'];?>">
            </form>
        </div>
        <script>
            const d = new Date();
            document.getElementById("date").innerHTML = d;
        </script>
    </body>
</html>