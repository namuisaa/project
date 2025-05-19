<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $con = mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "Database not connected!";
    }
    $adminname = $_POST["username"];
    $password = $_POST["password"];

    $qry = "select * from admin where username = '$adminname' AND pass = '$password'";
    $result = mysqli_query($con,$qry);
    $count = mysqli_num_rows($result);
        if($count >0){
            session_start();
            $_SESSION["adminname"] = $adminname;
            header("Location: admin-page.php");
            exit();
        }
        else{
            echo "Invalid username or password.";
        }
}
?>