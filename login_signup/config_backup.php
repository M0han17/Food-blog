<?php
session_start();
$dbHost = 'localhost';
$dbName = 'FoodBlogDb';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
?>