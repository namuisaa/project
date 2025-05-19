<?php
    if(!isset($_SESSION["username"])){
        echo "You donot have access !!";
        exit();
    }
    $con=mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "error connecting database!";
    }
    if(isset($_POST['submit'])){
        $uid=$_SESSION["username"];
        $query1="SELECT `u_id` FROM `user` WHERE uname='$uid'";
        $data1 =mysqli_query($con,$query1);
        while($row=mysqli_fetch_assoc($data1)){
            $u_id=$row['u_id'];
        }
        $location=$_POST['location'];
        $doc=$_POST['d_o_c'];
        $desc=$_POST['description'];
        $caseupdate=$_POST['case_update'];
        $query= "INSERT INTO `report`(`u_id`, `location`, `d_o_c`, `description`, `case_update`) VALUES ('$u_id','$location','$doc','$desc','$caseupdate')";
        $data =mysqli_query($con,$query);
        if($data>0){
            header("Location: user-home.php");
            exit();
            }
            else{
            echo "Failed to Insert Data !";
            }
    }
    echo"<div class='container'>";
    echo"<p class='pform'>Report Crime</p>";
    echo"<form id='form' method='POST'>";
    echo"<div class='location'> ";
    echo"<label>Location</label>";
    echo"<input type='text' name='location'>";
    echo"</div>";
    echo"<div class='d_o_c'> ";
    echo"<label>Date Of Crime</label>";
    echo"<input type='date' name='d_o_c' >";
    echo"</div>";
    echo"<div class='description'> ";
    echo"<label>Description</label>";
    echo"<textarea rows='10' cols='46' name='description'></textarea>";
    echo"</div>";
    echo"<div style='display:none;' class='case_update'> ";
    echo"<label>Case Update</label>";
    echo"<select name='case_update'>";
    echo"<option value='Pending' selected >Pending</option>";
    echo"option value='Approved'>Approved</option>";
    echo"<option value='Rejected'>Rejected</option>";
    echo"</select>";
    echo"</div>";
    echo"<button name='submit'>Report</button>";
    echo"   <br>";
    echo"</form>";
    echo"</div>";
?>
<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Crime - Online Crime Report in Nepal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;900&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding:0;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            margin: auto;
            margin-top: 10vh;
            height:auto;
            width: 50vw;
            border: 1px solid rgb(189, 189, 189);
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }
        .h1form{
            margin-top: 25px;
        }
        .h1form a {
            text-decoration:none;
            color: rgb(32,32,32);
        }
        .h1form a:hover{
            color: rgb(100,100,100);
        }
        .pform{
            margin:10px 0 10px 0;
            font-size: 20px;
        }
        #form{
            margin-top:25px;
            margin-bottom: 25px;
        }
        .add, .gender, .phone, .email, .pass, .pass2, .name{
            display:flex;
            flex-direction: column;
            /* align-items:center; */
            margin:10px;
        }
        .case_update{
            display:none;
            font-size:15px;
            padding:10 15 10 15;
        }
        div{
            text-align:left;
        }
        textarea, input{
            font-size:12px;
            padding:10 15 10 15;
            width:100%;
        }
        textarea:focus , input:focus{
            outline: none;
            box-shadow: none;
        }
        button{
            font-size:17px;
            width:20%;
            color: white;
            border:none;
            border-radius:3px;
            padding: 10 15 10 15;
            background-color:rgb(57, 164, 252);
            margin-top:10px;
        }
        button:hover{
            cursor: pointer;
            transition: 0.5s;
            background-color:rgb(57, 135, 252);
        }
        .pbottom{
            margin-top:5px;
        }
    </style>
</head>
<body>
</body>
</html> -->