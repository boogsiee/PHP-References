<?php 
if(!isset($_SESSION)){
    session_start();
}

    include_once("connection.php");
    $con = connection(); 


    
    if(isset($_POST['login'])){
       $username=$_POST['username'];
       $password=$_POST['password'];
       $sql="SELECT * FROM user_accounts WHERE Username='$username' AND Password = '$password'";
       
       $user = $con->query($sql) or die($con->error);
       $row=$user->fetch_assoc();
       $total = $user->num_rows;

       if($total > 0){
        $_SESSION["UserLogin"] = $row["Username"];
        $_SESSION["Access"] = $row["Access"];
        echo header("Location:index.php");
    }else{
        echo "No user found.";
    }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link rel="stylesheet" href="./CSS/login.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
    <div class="column1">
        <h1 id="title">The School Database</h1>
    </div>
    <div class="column2">
    <h1>Login Here</h1>
    <br/>
    <form action= " " method="post">
        <label>Username</label>
        <input type = "text" name="username" id="username"></br></br>
        <label>Password</label>&nbsp;&nbsp;
        <input type = "password" name="password" id="password"></br></br></br>
        <button id="submit" type="submit" name="login">Log In</button>
    </form>
    </div>
</div>
    </body>
</html>

