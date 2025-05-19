<?php
// session_start();
if(!isset($_SESSION["username"])){
    echo "You donot have access !!";
    exit();
}
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "Database not connected!";
    }
    else{
        $uid=$_SESSION["username"];
        $query1="SELECT `u_id` FROM `user` WHERE uname='$uid'";
        $data1 =mysqli_query($con,$query1);
        while($row1=mysqli_fetch_assoc($data1)){
            $u_id=$row1['u_id'];
        }
        $qry="select r_id, location, d_o_c, description, case_update from report where u_id='$u_id'";
        $result=mysqli_query($con,$qry);
        $num=mysqli_num_rows($result);
        echo "<center>";
        echo "<h1>List of Reports</h1>";
        echo "</center>";
        if($num<1){
            echo 'No data available';
        }
        else{
            echo "<table border=1 cellspacing=0>";
            echo "<tr><th>Report ID</th><th>Date of Crime</th><th>Addres</th><th>Description</th><th>Case Update</th><th>Action</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>$row[r_id]</td>";
                echo "<td>$row[d_o_c]</td>";
                echo "<td>$row[location]</td>";
                echo "<td>$row[description]</td>";
                echo "<td>$row[case_update]</td>";
                echo "<td><a class='d' href=userreportdelete.php?id=$row[r_id] onclick=\"javascript: return confirm('Are you sure?');\">Delete</td>";
                echo "</tr>";
            }
            echo "</table>";
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