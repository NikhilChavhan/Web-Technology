<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="st.css">
</head>
<body bgcolor="wheat">
    <br>
<h1 align="center">Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
<br>

<form>
    <h2 align="left">Information of Student</h2>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Mail-id</th>
        <th>Mobile</th>
        <th>Class</th>
        <th>Department</th>
        <th>Age</th>
        <th>Address</th>
        <th>Subjects</th>
    </tr>
    <?php
    //include the database connection file
    require_once 'database.php';
    session_start();
    //Check whether session is set or not
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit;
    }

    $name= $_SESSION['username'];

    $sql = "SELECT * from users where username='$name'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['username']."</td><td>".$row['password']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['gender']."</td><td>".$row['email']."</td><td>".$row['mobile']."</td><td>".$row['class']."</td><td>".$row['department']."</td><td>".$row['age']."</td><td>".$row['address']."</td><td>".$row['subject']."</td><tr>";
        }
    }else{
        echo "0 Results";
    }
    ?>
</table>
<p>
    <a href="logout.php">Logout</a>
</p>
</form>
</body>
</html>
