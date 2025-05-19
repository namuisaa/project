<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User's Information</title>
    <style>
        body{
            margin:0;
            padding:0;
            font-family:"Roboto";
        }
        .sbtn{
            padding-right:20px;
        }
        .container{
            position:absolute;
            top:25vh;
            left:42vw;
        }
    </style>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["username"])){
    echo "You donot have access !!";
    exit();
}
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(isset($_POST['submit'])){
        $id=$_GET['id'];
        $p=$_POST['p'];
        $ad=$_POST['ad'];
        $query= "UPDATE `user` SET `upass`='$p',`address`='$ad' WHERE uname='$id'";
        $data =mysqli_query($con,$query);
        if($data>0){
            header("Location: user.php");
            exit();
            }
            else{
            echo "Failed to Update !";
            }
    }
    if(isset($_POST['csubmit'])){
        header("Location: user.php");
            exit();
    }
    if(!$con){
        echo "Database not connected!";
    }
    else{
        $id=$_GET['id'];
        $qry="select * from user where uname='$id'";
        $result=mysqli_query($con,$qry);
        $num=mysqli_num_rows($result);
        echo "<div class='container'>";
        echo "<center>";
        echo "<h1>Update Information</h1>";
        if($num<1){
            echo 'No data available';
        }
        else{
            while($row=mysqli_fetch_assoc($result)){
            echo "<table cellspacing=10>";
            echo"<form id='form' method='POST'>";
                echo "<td>User ID : </td>";
                echo "<td>$row[u_id]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>User name : </td>";
                echo "<td>$row[uname]</td>";
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
                echo "<td>$row[phone]</td>";
                echo "</tr>";
                echo "<td>Email : </td>";
                echo "<td>$row[email]</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Gender : </td>";
                echo "<td>$row[gender]</td></tr>";
                echo "</table>";
                echo"<input type='submit' name='submit' value='Update'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo"<input type='submit' name='csubmit' value='Cancel'>";
                echo"</form>";
                echo "</center>";
                echo "</div>";
            }
        }
    }
?>
</body>
</html>