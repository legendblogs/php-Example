<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gitwebstore";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . $connection->connect_error);
}

function close_db(){
	mysqli_close($connection);
}

?>