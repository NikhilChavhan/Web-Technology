<?php
require_once 'database.php';
session_start();

$username=$password="";
if(isset($_POST['submit'])){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    $department=trim($_POST['department']);
    if(!$username=='' && !$password=='' && !empty($department))
    {
        $sql = "SELECT * FROM users where username='$username' and department='$department' and password='$password'";
        $query=mysqli_query($conn,$sql);

        $count = mysqli_num_rows($query);
        if($count == 1){
            $_SESSION['username']=$username;
            header("location:welcome.php");
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    else{
        echo"<script>alert('All fields must be filled')</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Form</title>
<link rel="stylesheet" href="styles.css">
</head>
<body bgcolor="wheat">
<div id="a">
<h1 align="center">Library Management</h1>
</div>
<br>
<br>
<form action="" autocomplete="on" method="POST">

<h2 align="left">Login Form</h2>

<div class="row">
<div class="col-20"><label>Username:</label></div>
<div class="col-80"><input type="text" placeholder="Enter Username" name="username" required>
</div>
</div>
<br>

<div class="row">
<div class="col-20">
<label>Password:</label></div>
<div class="col-80"><input type="password" placeholder="Enter Password" name="password" autocomplete="off" required>
</div>
</div>
<br>
<div class="row">     
        <div class="col-20"><label>Department:</label></div>
        <select name="department">
            <option value="select">Select Department</option>
        <option value="Computer">Computer</option>
        <option value="Mechanical">Mechanical</option>
        <option value="Information Technology">Information Technology</option>
        <option value="Civil">Civil</option>
        <option value="ENTC">ENTC</option>
        </select>
    </div>
    <br>

<input type="checkbox" name="pass" value="pass" checked>Remember Password<br><br>
                
    <input type="submit" name="submit" value="Sign In">
    <input type="reset"  name="reset" value="Reset"><br><br>
            
                <a href="forgot.html">Forgot Password?</a>
                <br><br>
                New To Register?
                  <a href="register.php">Sign up now</a>
                  

</form>
</body>
</html>