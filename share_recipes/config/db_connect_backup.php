<?php

// connect to the database
$dbHost = 'localhost';
$dbName = 'FoodBlogDb';
$dbUsername = 'root';
$dbPassword = '';
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// check connection
if (!$conn) {
	echo 'Connection error: ' . mysqli_connect_error();
}
