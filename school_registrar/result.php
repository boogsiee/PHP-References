<?php 
        // if(!isset($_SESSION)){
        //     session_start();
        // }
        // if(isset($_SESSION["UserLogin"])){
        // echo "Welcome".$_SESSION['UserLogin'];
        //     }else{
        //     echo "Welcome Guest";
        // }

    include_once("connection.php");
    $con = connection(); 
    $search = $_GET['search'];
    
    $sql = "SELECT * FROM student WHERE FName LIKE '%$search%'
    || LName LIKE '%$search%' ORDER BY LRN_ID DESC";

    $students = $con->query($sql) or die ($con->error);

    $row = $students->fetch_assoc();
    $count = $students->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
    <link rel="stylesheet" href="./CSS/Style.css" type="text/css">
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
            echo "Welcome &nbsp;".$_SESSION['UserLogin'];
                }else{
            echo "Welcome Guest";
        }
        ?>
        </br>
        
        <?php 
            if(isset($_SESSION['UserLogin'])){?>
        <a id="log" href="logout.php">Log Out</a>
        <?php } else{ ?> 
        <a id="log" href="login.php">Log In </a>
            <?php } ?>
        </br>
        <p id="date"></p>
        </div>
        </header>
        <h1> Students Information </h1>
        <div class="misc">
        <div class="tools">
            <button class="insert"><a href = "insert.php">Insert + </a></button>
            <button class="insert"><a href = "#">Update > </a></button>
            <button class="insert"><a href = "insert.php">Delete - </a></button>
            <button class="insert"><a href="index.php"><< Back</a></button>
        </div>
        
        <div class="search">
            <form action="result.php" method="get">
                <input id="input_search" type="text" name="search" id="search" placeholder="Search here">
                <button id="input_butt"type="submit">Search</button>
            </form>
        </div>
        </div>
        <div class="table_cont">
        <?php if($count > 0){ ?>
        <table>
        <thead>
        <tr>
            
            <th>Last Name</th>
            <th>First Name</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Date Enrolled</th>
            <th>Grade Level</th>
            <?php if(isset($_SESSION['Access']) && $_SESSION['Access'] == 'Administration') { ?>
                    <th>Details</th>
                <?php } ?>
        </tr>
<?php do{ ?>
        <tr>
            <!-- <td> <a href="details.php">view</p</td> -->
            <td><?php echo $row['FName']; ?></td>
            <td><?php echo $row['LName']; ?></td>
            <td><?php echo $row['Gender'] ?></td>
            <td><?php echo $row['Birthday'] ?></td>
            <td><?php echo $row['Enrolment_Date'] ?></td>
            <td><?php echo $row['Level'] ?></td>
            <?php if(isset($_SESSION['Access']) && $_SESSION['Access'] == 'Administration') { ?>
                <td><button><a href="details.php?ID=<?php echo $row['LRN_ID'];?>">view</a></button></td>
                    <?php } ?>
        </tr>
<?php }while($row = $students->fetch_assoc()) ?>
        </thead>
        </table>
        <?php } else { ?>
        <h1>No Data Found in the Database</h1> 
    <?php } ?>
        </div>
        <script>
            const d = new Date();
            document.getElementById("date").innerHTML = d;
        </script>
    </body>
</html>

