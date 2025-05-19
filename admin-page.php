<?php
session_start();
if(!isset($_SESSION["adminname"])){
    header("Location: admin-login.html");
    exit();
}
// echo "welcome,".$_SESSION["adminname"]."! To the admin panel.";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;900&display=swap" rel="stylesheet">
    <style>
        body{
            margin:0;
            padding:0;
        }
        nav{
            background-color: #CCD3CA;
            position:sticky;
            top:0px;
            left:0px;
            height:100vh;
            width:15vw;
        }
        ul{
            margin:0;
            padding:0;
        }
        li{
            font-family: 'Roboto', sans-serif;
            list-style:none;
            text-align:center;
            padding:20px;
        }
        li:hover{
            cursor: pointer;
        }
        input{
            position:absolute;
            right:50px;
            top:30px;
            background-color:white;
            border:2px solid black;
            border-radius:3px;
            padding: 5px 15px;
        }
        input:hover{
            cursor: pointer;
            background-color:#F5F7F8;
            transition: 0.5s;
        }
        h1{
            text-align:center;
            padding:20px;
        }
        form{
            position:sticky;
            top:0px;
        }
        .active {
            background-color:#b1b7b0;
        }
        section{
            display:none;
        }
        #userlist, #reportlist {
            position:absolute;
            top:5vh;
            left:20vw;
        }
    </style>
    <script>
        function navigate(parameter){
            var dashboard = document.getElementById('dashboard');
            var users = document.getElementById('users');
            var reports = document.getElementById('reports');

            if(parameter === "dashboard"){
                userlist.style.display = "none";
                reportlist.style.display = "none";
                document.getElementById("dashboard").classList.add("active");
                document.getElementById("users").classList.remove("active");
                document.getElementById("reports").classList.remove("active");
            }
            else if(parameter === "users"){
                userlist.style.display = "block";
                reportlist.style.display = "none";
                document.getElementById("dashboard").classList.remove("active");
                document.getElementById("users").classList.add("active");
                document.getElementById("reports").classList.remove("active");
            }
            else if(parameter === "reports"){
                userlist.style.display = "none";
                reportlist.style.display = "block";
                document.getElementById("dashboard").classList.remove("active");
                document.getElementById("users").classList.remove("active");
                document.getElementById("reports").classList.add("active");
            }
        }
    </script>
</head>
<body>
    <form  action="adminlogout.php">
        <input type="submit" value="Logout">
    </form>
    <nav>
        <div class="c"><h1 class="h1">Crime Portal</h1></div>
        <ul>
            <li id="dashboard" onclick="navigate('dashboard')">Dashboard</li>
            <li id="users" onclick="navigate('users')">List of Users</li>
            <li id="reports" onclick="navigate('reports')">List of Reports</li>
        </ul>
    </nav>
    <section id="userlist">
        <?php
        include("userlist.php");
        ?>
    </section>
    <section id="reportlist">
        <?php
        include("reportlist.php");
        ?>
    </section>
</body>
</html>