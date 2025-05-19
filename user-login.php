<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "Database not connected!";
    }
    $username = $_POST["username"];
    $password = $_POST["password"];

    $qry = "select * from user where uname = '$username' AND upass = '$password'";
    $result = mysqli_query($con,$qry);
    $count = mysqli_num_rows($result);
        if($count >0){
            session_start();
            $_SESSION["username"] = $username;
            header("Location: user-home.php");
            exit();
        }
        else{
            echo "Invalid username or password.";
        }
}
?>