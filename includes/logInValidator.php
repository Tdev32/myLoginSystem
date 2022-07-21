<?php

include 'config.php';

// Initializing empty variables
$account = $password = '';
// $checkBox = false;
$errors = array('account' => '', 'password' => '');
$error1Toggle = $error2Toggle = 'd-none';

// Password character functions
$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$num = preg_match('@[0-9]@', $password);
// $specChars = preg_match('@[^\w]@', $password);

if (isset($_POST['submit'])) {

  // POST data variables
  $account = htmlspecialchars($_POST['usernameOremail']);
  $password = htmlspecialchars($_POST['password']);
  // $checkBox = $_POST['checkBox'];

  /** USERNAME validation **/
  if (empty($account)) {
    // code runs if $account variable is empty
    $errors['account'] = 'Please enter your username or email';
    $error1Toggle = 'd-block';
  } else {
    // checking database to see whether username or email exists
    $sql = "SELECT * FROM users WHERE username='$account' OR email='$account';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      // code runs if match is not found in the database
      $errors['account'] = 'Incorrect username or email';
      $errorToggle = 'd-block';
    }
  }

  /** PASSWORD validation **/
  if (empty($password)) {
    $errors['password'] = 'Please enter a password';
    $error2Toggle = 'd-block';
  } else {
    $sql = "SELECT * FROM users WHERE username='$account' OR email='$account';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $errors['password'] = 'Incorrect username or email';
      $error2Toggle = 'd-block';
    } else {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password']) == false) {
        $errors['password'] = 'Incorrect password';
        $error2Toggle = 'd-block';
      }
    }
  }

  /** SUCCESS message **/
  if (!array_filter($errors)) {
    header("Location: ../views/home.php");
  }
}