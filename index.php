<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>index</title>
</head>
<body>

<?php

$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "odev";   

try {   
    $connection = new PDO("mysql:host=$server;dbname=$dbname", $dbuser, $dbpassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sqlQuery = "CREATE TABLE students (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        fullName VARCHAR(255) NOT NULL,
        email VARCHAR(255)  NOT NULL ,
        gender  enum('Male','Female') NOT NULL  
    )";

    try{
        $connection->exec($sqlQuery);      
    }catch (PDOException $e) {

    }

}
catch(PDOException $e){
    echo "Error"  . $e->getMessage();
}
$connection = null;


?>
    <div class="container">

        <form action="insert.php" method="POST">
        <div class="mb-3 mt-3">
            <label   class="form-label">Full Name :</label>
            <input type="text" class="form-control"  placeholder="Full Name" name="fullName">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Email :</label>
            <input type="email" class="form-control"  placeholder="Email" name="email">
        </div>
        <div class="mb-3">
            <input type="radio" id="Male" name="gender" value="Male">
            <label for="Male">Male</label>
            <br>
            <input type="radio" id="Female" name="gender" value="Female">
            <label for="Female">Female</label><br>
        </div>
        <button type="submit" class="btn btn-primary" >Insert</button>
        <a href="allstudent.php" class="btn btn-primary" >All Student</a>

        </form>
    </div>

    <div class="container">
    <br>


</div>
</body>
</html> 
