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
        $qry="select * from report";
        $result=mysqli_query($con,$qry);
        $num=mysqli_num_rows($result);
        echo "<center>";
        echo "<h1>List of Reports</h1>";
        echo "</center>";
        if($num<1){
            echo 'No data available';
        }
        else{
            echo "<center>";
            echo "<table border=1 cellspacing=0>";
            echo "<tr><th>Report ID</th><th>User ID</th><th>Location</th><th>Date of Crime</th><th>Description</th><th>Case Update</th><th colspan='2'>Action</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>$row[r_id]</td>";
                echo "<td>$row[u_id]</td>";
                echo "<td>$row[location]</td>";
                echo "<td>$row[d_o_c]</td>";
                echo "<td>$row[description]</td>";
                echo "<td>$row[case_update]</td>";
                echo "<td><a class='e' href=reportupdate.php?id=$row[r_id]>Update</td>";
                echo "<td><a class='d' href=reportdelete.php?id=$row[r_id] onclick=\"javascript: return confirm('Are you sure?');\">Delete</td>";
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
</head>
<body>
    
</body>
</html>