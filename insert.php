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
<div class="container" style="padding-top:50px">



<?php

$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "odev";   

try {


    $connection = new PDO("mysql:host=$server;dbname=$dbname", $dbuser, $dbpassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_POST['fullName']) && !empty($_POST['fullName']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['gender']) && !empty($_POST['gender']) ) {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
    }
    $Sql = "INSERT INTO students (fullName,email , gender)
    VALUES ('$fullName' , '$email', '$gender')";    
    $connection->exec($Sql);

    // echo "<div class='alert alert-success'><strong>Success!</strong> Student Added successfully </div>" ;
    echo '<div class="alert alert-success alert-dismissible fade show"> Student Added successfully<button type="button" class="btn-close" data-bs-dismiss="alert"></button> </div>';

    }
    catch(PDOException $e){
        echo '<div class="alert alert-danger alert-dismissible fade show"><strong>Error :</strong> Faild To Insert Data<button type="button" class="btn-close" data-bs-dismiss="alert"></button> </div>';
    }


$connection = null;

?>


</div>

</body>
</html> 
