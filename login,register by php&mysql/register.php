<?php
require_once 'database.php';

$username=$password=$firstname=$lastname=$gender=$mailid=$mobile=$classs=$department=$age=$address=$sub="";

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $gender = trim($_POST['gender']);
    $mailid = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $classs = trim($_POST['clas']);
    $department = trim($_POST['departement']);
    $age = trim($_POST['age']);
    $address = trim($_POST['address']);
    $sub = $_POST['subject'];
    $subs = implode(',',$sub);


    $sql = "INSERT INTO users(username,password,firstname,lastname,gender,email,mobile,class,department,age,address,subject)values('$username','$password','$firstname','$lastname','$gender','$mailid','$mobile','$classs','$department','$age','$address','$subs')";

    echo $sql;
    $query = mysqli_query($conn,$sql);
    echo $query;

    if($query){
        echo "<script>alert('Your are registered successfully!!');location.replace('login.php')</script>";
    }
    else{
        echo "<script>alert('Sorry!! Error!!')</script>";
    }
}
else{

}
?>
<!DOCTYPE html>

<html>


<head>
	<title>Registration Form</title>
	<meta charset="utf-8">
	
    <link rel="stylesheet" href="styles.css" type="text/css">
		
</head>
<body bgcolor="wheat">
    <div id="a">
	<h2 align="center"><b>REGISTRATION FORM</b></h2>
</div>
<br>
<br>
    <div><form action="" method="post" autocomplete="on">
    <div class="row">
        <div class="col-20"><label>Username:</label></div>
        <div class="col-80"><input type="Text" name="username" placeholder="Enter username" required></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Password:</label></div>
        <div class="col-80"><input type="Password" name="password" placeholder="Enter password" autocomplete="off" required></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Firstname:</label></div>
        <div class="col-80"><input type="Text" name="firstname" placeholder="Enter firstname" required></div>
    </div>

	<div class="row">
        <div class="col-20"><label>Lastname:</label></div>
        <div class="col-80"><input type="Text" name="lastname" placeholder="Enter lastname" required></div>
    </div>

    <div class="row">
    <div class="col-20"><label>Gender:</label></div>

    <div class="col-80">
    <input type="radio" name="gender" value="male">
    <label>Male</label>
    <br>
    <input type="radio" name="gender" value="female">
    <label>Female</label>
    <br>
    <input type="radio" name="gender" value="other">
    <label>Other</label>
    
    
</div>
    </div>

    <div class="row">
        <div class="col-20"><label>Email:</label></div>
        <div class="col-80"><input type="email" name="email" placeholder="Enter email id" autocomplete="off" required></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Mobile:</label></div>
        <div class="col-80"><input type="number" name="mobile" placeholder="Enter mobile number" autocomplete="off" required></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Class:</label></div>
	    <div class="col-80"><select name="clas">
		<option value="FE">FE</option>
		<option value="SE">SE</option>
		<option value="TE">TE</option>
		<option value="BE">BE</option>
        </select></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Department:</label></div>
	    <div class="col-80"><select name="departement">
		<option value="Computer">Computer</option>
        <option value="Mechanical">Mechanical</option>
        <option value="Information Technology">Information Technology</option>
        <option value="ENTC">ENTC</option>
        </select></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Age:</label></div>
        <div class="col-80"><input type="number" name="age" placeholder="Enter age" autocomplete="off" required></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Address:</label></div>
        <div class="col-80"><textarea rows="4" cols="22" placeholder="Enter address" name="address"></textarea></div>
    </div>

    <div class="row">
        <div class="col-20"><label>Subjects:</label></div>

	<div class="col-80"><input type="checkbox" value="OOP" name="subject[]" align="center" >
        <label>OOP</label>
<br>
	<input type="checkbox" value="PPL" name="subject[]" checked>
        <label>PPL</label>
<br>
	<input type="checkbox" value="MP" name="subject[]">
        <label>MP</label>
<br>
	<input type="checkbox" value="DAA" name="subject[]">
        <label>DAA</label>
    </div>
</div>
<br>
	<input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">
	<br>
    <br>
	Click here for login?<a href="login.php">LOGIN</a>
</form></div>
</body>
</html>
