<?php

// Database
$dbHost = 'sql308.epizy.com';
$dbUser = 'epiz_32314996';
$dbPass = 'ojjPwWNBNaRm';
$dbName = 'epiz_32314996_loginsystem';

try {
  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
} catch(Exception $e) {
  echo "Connection failed: " . mysqli_connect_error();
}