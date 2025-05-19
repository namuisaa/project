<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Online Crime Report in Nepal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;900&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            margin: auto;
            margin-top: 10vh;
            height:auto;
            width: 25vw;
            border: 1px solid rgb(189, 189, 189);
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }
        .perror{
            color:red;
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
        form{
            margin-top:25px;
            margin-bottom: 25px;
        }
        .add, .gender, .phone, .email, .pass, .pass2, .name{
            display:flex;
            flex-direction: column;
            /* align-items:center; */
            margin:10px;
        }
        select{
            font-size:15px;
            padding:10 15 10 15;
        }
        div{
            text-align:left;
        }
        input{
            font-size:12px;
            padding:10 15 10 15;
            width:100%;
        }
        input:focus{
            outline: none;
            box-shadow: none;
        }
        button{
            font-size:17px;
            width:80%;
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
        .err{
            color:red;
        }
        </style>
</head>
<body>
<?php
    $con=mysqli_connect("localhost","root","","crime_portal");
    if(!$con){
        echo "error connecting database!";
    }
    error_reporting(0);
    $name = $add = $gen = $phone = $email = $pass = $pass2 = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['fname'])){
            $name="Name cannot be empty.";
        }
        elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])){
            $name="Only letters and white space allowed";
        }
        else{
            $fname=$_POST['fname'];
        }
        if(empty($_POST['add'])){
            $add="Address cannot be empty.";
        }
        else{
            $ad=$_POST['add'];
        }
        if($_POST['gender'] === "Select"){
            $gen="Gender cannot be empty.";
        }
        else{
            $gender=$_POST['gender'];
        }
        if(empty($_POST['phone'])){
            $phone="Phone number cannot be empty.";
        }
        else if(strlen($_POST['phone'])!=10){
            $phone="Phone number must be 10 digits.";
        }
        else if(!preg_match("/^98\d{8}$/",$_POST['phone'])){
            $phone="Must start with 98";
        }
        else{
            $p=$_POST['phone'];
        }
        if(empty($_POST['email'])){
            $email="Email cannot be empty.";
        }
        else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$_POST['email']))
        {
            $email="Invalid Email";   
        }
        else{
            $emaill=$_POST['email'];
        }
        $passpattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'; 
        if(empty($_POST['pass'])){
            $pass="Password cannot be empty.";
        }
        else if(strlen($_POST['pass']<8)){
            $pass="Password must be atleast of  8 digits.";
        }
        else if(!preg_match($passpattern,$_POST['pass'])){
            $pass="Must include small letter,capital letter and numbers";
        }
        else{
            $pa=$_POST['pass'];
        }
        if($_POST['pass'] !=$_POST['conpass']){
            $pass2="Password didn't matched!";
        }
        if(strlen($fname)>0 && strlen($ad)>0 && strlen($pa)>0 && strlen($p)>0 && strlen($emaill)>0 && strlen($_POST['conpass'])>0 && strlen($gender)>0){
            $query= "INSERT INTO `user`(`uname`, `upass`, `address`, `phone`, `email`, `gender`) VALUES ('$fname','$pa','$ad','$p','$emaill','$gender')";
            $data =mysqli_query($con,$query);
            if($data>0){
                echo "Registered";
                header("Location: user-login.html");
                exit();
            }
            else{
                echo "Failed to Failed to registered !";
            }
        }
    }
?>
    <div class="container">
        <h1 class="h1form"> <a href="home.html">Crime Portal</a></h1>
        <p class="pform">User Registration</p>
        <form method="POST">
        <div class="name"> 
            <label>Name</label>
            <input type="text" name="fname">
            <p class="err"><?php echo $name;?></p>
        </div>
        <div class="add"> 
            <label>Address</label>
            <input type="text" name="add" >
            <p class="err"><?php echo $add;?></p>
        </div>
        <div class="gender"> 
            <label>Gender</label>
            <select name="gender">
                <option value="Select">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <p class="err"><?php echo $gen;?></p>
        </div>
        <div class="phone"> 
            <label>Phone</label>
            <input type="text" name="phone">
            <p class="err"><?php echo $phone;?></p>
        </div>
        <div class="email"> 
            <label>E-mail</label>
            <input type="email" name="email" >
            <p class="err"><?php echo $email;?></p>
        </div>
        <div class="pass"> 
            <label>Password</label>
            <input type="password" name="pass" >
            <p class="err"><?php echo $pass;?></p>
        </div>
        <div class="pass2"> 
            <label>Confirm Password</label>
            <input type="password" name="conpass" >
            <p class="err"><?php echo $pass2;?></p>
        </div>
        <button name="submit">Register</button>
            <br>
            <p class="pbottom">Have account?<a href="user-login.html">Login</a></p>
        </form>
    </div>
</body>
</html>