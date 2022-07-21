<?php

// Database
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'password00';
$dbName = 'login_system';

try {
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
} catch(Exception $e) {
  echo "Connection failed: " . mysqli_connect_error();
}