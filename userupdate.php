<?php
if(!isset($_SESSION["username"])){
    echo "You donot have access !!";
    exit();
}
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "Database not connected!";
    }
    else{
        $id=$_GET['id'];
        $qry="select * from user where uname='$id'";
        $result=mysqli_query($con,$qry);
        $num=mysqli_num_rows($result);
        echo "<center>";
        echo "<h1>Update User Information</h1>";
        echo "</center>";
        if($num<1){
            echo 'No data available';
        }
        else{
            while($row=mysqli_fetch_assoc($result)){
            echo "<center>";
            echo "<table cellspacing=10>";
            echo"<form id='form' method='POST'>";
                echo "<td>User ID : </td>";
                echo "<td>$row[u_id]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>User name : </td>";
                echo "<td><input name='un' value='$row[uname]'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Password : </td>";
                echo "<td><input name='p' value='$row[upass]'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Address : </td>";
                echo "<td><input name='ad' value='$row[address]'></td>";
                echo "</tr>";
                echo "<td>Phone number : </td>";
                echo "<td><input name='pn' value='$row[phone]'></td>";
                echo "</tr>";
                echo "<td>Email : </td>";
                echo "<td><input name='em' value='$row[email]'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Gender : </td>";
                echo "<td><select name='cu'><option value='Select'>Select</option><option value='Male'>Male</option><option value='Female'>Female</option><option value='Others'>Others</option></select></td>";
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
        $id=$_GET['id'];
        $cu=$_POST['cu'];
        $un=$_POST['un'];
        $p=$_POST['p'];
        $ad=$_POST['ad'];
        $pn=$_POST['pn'];
        $em=$_POST['em'];
        $query= "UPDATE `user` SET `uname`='$un',`upass`='$p',`address`='$ad',`phone`='$pn',`email`='$em',`gender`='$cu' WHERE uname='$id'";
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