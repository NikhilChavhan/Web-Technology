<?php
require_once 'dbconnect.php';
$fname= $_REQUEST["fname"];
$sqlquery = "SELECT * from libuser where firstname='$fname'";
$result = mysqli_query($conn,$sqlquery);
if(mysqli_num_rows($result)>0){
    echo "<table border='1'><tr><td>Username</td><td>Firstname</td><td>Lastname</td><td>Gender</td><td>Email</td><td>Mobile</td><td>Class</td><td>Department</td><td>Books Issued</td><td>Issue Date</td></tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row['username']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['gender']."</td><td>".$row['email']."</td><td>".$row['mobile']."</td><td>".$row['class']."</td><td>".$row['department']."</td><td>".$row['books_issued']."</td><td>".$row['issue_date']."</td><tr>";
    }
    echo "</table>";
}else{
    echo "<p style='color: red'>User does not exist</p>";
}
?>
