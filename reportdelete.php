<?php 
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "Database not connected!";
    }
    else{
        $id = $_GET['id'];
        $qry="delete from report where r_id = '$id'";
        $result=mysqli_query($con,$qry);
        if($result){
            header("Location: admin-page.php");
            exit();
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td {
            padding:10px;
        }

    </style>
</head>
<body>
    
</body>
</html>