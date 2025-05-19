<?php
if(!isset($_SESSION["adminname"])){
    echo "You donot have access !!";
    exit();
}
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "Database not connected!";
    }
    else{
        $id=$_GET['id'];
        $qry="select * from report where r_id='$id'";
        $result=mysqli_query($con,$qry);
        $num=mysqli_num_rows($result);
        echo "<center>";
        echo "<h1>Update of Report</h1>";
        echo "</center>";
        if($num<1){
            echo 'No data available';
        }
        else{
            while($row=mysqli_fetch_assoc($result)){
            $rid=$row['r_id'];
            echo "<center>";
            echo "<table cellspacing=10>";
            echo"<form id='form' method='POST'>";
                echo "<tr>";
                echo "<td>Report ID : </td>";
                echo "<td>$row[r_id]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>User ID : </td>";
                echo "<td>$row[u_id]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Location : </td>";
                echo "<td>$row[location]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Date of Crime : </td>";
                echo "<td>$row[d_o_c]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Description : </td>";
                echo "<td>$row[description]</td>";
                echo "</tr>";
                echo "<tr>";

                echo "<td>Case Update : </td>";
                echo "<td><select name='cu'>Case Update : <option value='Pending'>Pending</option><option value='Approved'>Approved</option><option value='Rejected'>Rejected</option></select></td>";
                echo "</tr>";
                echo"<input type='submit' name='submit' value='Update'>";
                echo"<input type='submit' name='csubmit' value='Cancel'>";
                echo"</form>";
                echo "</table>";
                echo "</center>";
            }
        }
    }
    if(isset($_POST['submit'])){
        $cu=$_POST['cu'];
        $query= "UPDATE `report` SET `case_update`='$cu' WHERE r_id='$rid'";
        $data =mysqli_query($con,$query);
        if($data>0){
            header("Location: admin-page.php");
            exit();
            }
            else{
            echo "Failed to Update !";
            }
    }
    if(isset($_POST['csubmit'])){
        header("Location: admin-page.php");
            exit();
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