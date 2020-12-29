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
    <style>
        form {
            padding: 40px;
            width: 60%;
            margin:0 auto;
        }

        form input[type='text'] {
            width: 80%;
            height: 40px;
            font-size: 20px;
            border-width: 0 0 1px 0;
        }

        form input[type='text']::-webkit-input-placeholder {
            font-size: 20px;
        }

        form input[type='submit'] {
            font-size: 20px;
            padding: 10px 12px;
            background-color: #8ce0af;
            border: none;
        }
        .head1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            margin-left: 20%;
        }

        .tit {
            width: 52%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0 auto 0 20%;
            padding: 0px 0 40px;
            border-bottom: 1px solid grey;
        }
        .tit:last-child{
            border:none;
        }
    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="search_bar" placeholder="search...."><input type="submit" value="search">
    </form>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $search = $_POST['search_bar'];
            $sql = "SELECT * FROM search_bar WHERE title LIKE '%$search%' OR descr LIKE '%$search%' LIMIT 3";
            $result = $con->query($sql);    
            while($row = $result->fetch_assoc()){
                echo "<h1 class='head1'>".$row['title']."</h1><p class='tit'>".$row['descr']."</p>";
            }
        }
    ?>

</body>
</html>

