<?php
// session_start();
if(!isset($_SESSION["adminname"])){
    echo "You donot have access !!";
    exit();
}
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "Database not connected!";
    }
    else{
        $qry="select * from user";
        $result=mysqli_query($con,$qry);
        $num=mysqli_num_rows($result);
        echo "<center>";
        echo "<h1>List of Users</h1>";
        echo "</center>";
        if($num<1){
            echo 'No data available';
        }
        else{
            echo "<center>";
            echo "<table border=1 cellspacing=0>";
            echo "<tr><th>User ID</th><th>Username</th><th>Addres</th><th>Phone number</th><th>Gender</th><th>Email</th><th colspan='2'>Action</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>$row[u_id]</td>";
                echo "<td>$row[uname]</td>";
                echo "<td>$row[address]</td>";
                echo "<td>$row[phone]</td>";
                echo "<td>$row[gender]</td>";
                echo "<td>$row[email]</td>";
                echo "<td><a class='e' href=userupdate.php?id=$row[uname]>Edit</td>";
                echo "<td><a class='d' href=delete.php?id=$row[uname] onclick=\"javascript: return confirm('Are you sure?');\">Delete</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</center>";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-radius:3px;
        }
        th, td{
            padding:10px;
            text-align:center;
        }
    </style>
</head>
<body>
    
</body>
</html>