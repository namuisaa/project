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
        $uname = $_SESSION["username"];
        $qry="select uname, address, phone, email, gender from user where uname='$uname'";
        $result=mysqli_query($con,$qry);
        $num=mysqli_num_rows($result);
        echo "<center>";
        echo "<h1>User's Information</h1>";
        echo "</center>";
        if($num<1){
            echo 'No data available';
        }
        else{
            while($row=mysqli_fetch_assoc($result)){
                echo "Name: $row[uname]";
                echo "<br>";
                echo "Email : $row[email]";
                echo "<br>";
                echo "Gender : $row[gender]";
                echo "<br>";
                echo "Address : $row[address]";
                echo "<br>";
                echo "Phone number : $row[phone]";
                echo "<br>";
            }
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