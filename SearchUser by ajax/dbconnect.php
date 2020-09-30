<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME','ajax');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if($conn===false){
    die("Failed to connect ".mysqli_connect_error());
}
?>
