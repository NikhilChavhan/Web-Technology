<?php

//fetch_data.php

include('dbconnect.php');

$query = "SELECT * FROM users ORDER BY id";
$statement = $connect->prepare($query);
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$data[] = $row;
	}

	echo json_encode($data);
}



//CREATE TABLE users(id int(20) AUTO_INCREMENT PRIMARY KEY,username varchar(232),password varchar(22),firstname varchar(231),lastname varchar(122),class varchar(212),department varchar(112),books_issued varchar(121));