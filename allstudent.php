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
<h2>All Student Data</h2>

<table class="table">
        <thead>
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Gender</th>
        </tr>
        </thead>
        <tbody> 

<?php

$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "odev";   

try {   

    $connection = new PDO("mysql:host=$server;dbname=$dbname", $dbuser, $dbpassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT  fullName, email , gender FROM students" ;
    $select = $connection->prepare($sql , array(PDO::ATTR_CURSOR => PDO::ERRMODE_EXCEPTION));
    $select->execute();
    $results = $select->fetchAll();

    foreach ($results as $result ){
       echo  '<tr>' ;
       echo      '<td>'.$result['fullName'] .'</td>';
       echo      '<td>'.$result['email'] .'</td>';
       echo      '<td>'.$result['gender'] .'</td>';
       echo  '</tr>';
    }
   
    }
catch(PDOException $e){
    echo $sqlQuery . "<br>" . $e->getMessage();
}

$connection = null;

?>


</tbody>
    </table>
</div>

</body>
</html> 
