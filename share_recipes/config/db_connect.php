<?php

// connect to the database
$dbHost = 'sql112.epizy.com';
$dbName = 'epiz_28954844_projectDb';
$dbUsername = 'epiz_28954844';
$dbPassword = 'st4M2oydCI';
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// check connection
if (!$conn) {
	echo 'Connection error: ' . mysqli_connect_error();
}

