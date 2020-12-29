<?php
$host="localhost";
$username ="root";
$password ="password";
$db = "aravind";
$port = "3308";
$con = new mysqli($host, $username, $password, $db, $port);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="search_bar" placeholder="search...."><input type="submit" value="search">
    </form>
    <?php 
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $search = $_POST['search_bar'];
                $sql = "SELECT * FROM serach_bar WHERE title LIKE %'$search'% OR descr LIKE %'$search'% LIMIT 3";
                $result = mysqli_query($con,$sql);
                echo $result;
                
        }
    ?>

</body>
</html>

