<?php

// Database
$dbHost = 'localhost';        // sql308.epizy.com
$dbUser = 'root';             // epiz_32314996';
$dbPass = 'password00';       // ojjPwWNBNaRm';
$dbName = 'login_system';     // epiz_32314996_loginsystem';

try {
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
} catch(Exception $e) {
  echo "Connection failed: " . mysqli_connect_error();
}