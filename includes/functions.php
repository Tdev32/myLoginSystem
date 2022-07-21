<?php 

// Function for testing input
function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// if (!$upper || !$lower || !$num || strlen($password) < 8) {
//   $errors['password']  = 'Password strength low';
//   $error2Toggle = 'd-block'; } / ------------ password strength check

function emailValidator($email) {
  if (empty($email)) {
    header('Location: ../index.php');
    $errors['email'] = 'Please enter an email';
    $error1Toggle = 'd-block';
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header('Location: ../index.php');
      $errors['email'] = 'Enter a valid email address';
      $error1Toggle = 'd-block';
    }
  }
}

function passwordTester($password) {
  // Password validation rules
  $upper = preg_match('@[A-Z]@', $password);
  $lower = preg_match('@[a-z]@', $password);
  $num = preg_match('@[0-9]@', $password);
  $specChars = preg_match('@[^\w]@', $password);

  $passwordMessage = [];

  if (!$upper) {
    array_push($passwordMessage, "Password must contain at least one uppercase letter.");
  }

  if (!$lower) {
    array_push($passwordMessage, "Password must contain at least one lowercase letter.");
  }

  if (!$num) {
    array_push($passwordMessage, "Password must contain at least one number.");
  }

  if (!$specChars) {
    array_push($passwordMessage, "Password must contain at least one special character.");
  }

  return $passwordMessage;
}