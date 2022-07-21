<?php

  include 'config.php';

  // Initializing empty variables
  $email = $user = $pwd = $conpwd = '';
  $regex = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/';
  $errors = array('email' => '', 'username' => '', 'password' => '', 'confirm_password' => '');
  $successToggle = $error1Toggle = $error2Toggle = $error3Toggle = $error4Toggle = 'd-none';

  if (isset($_POST['submit'])) {

    /// Saving POST data as variables ///
    $email = htmlspecialchars($_POST['email']);
    $user = htmlspecialchars($_POST['username']);
    $pwd = htmlspecialchars($_POST['password']);
    $conpwd = htmlspecialchars($_POST['confirm_password']);


    /// Email validation ///
    if (empty($email)) {
      $errors['email'] = 'Please enter an email';
      $error1Toggle = 'd-block';
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address';
        $error1Toggle = 'd-block';
      }
    }

    /// Username validation ///
    if (empty($user)) {
      $errors['username'] = 'Please enter a username';
      $error2Toggle = 'd-block';
    } else {
      if (strlen($user) < 8) {
        $errors['username'] = 'Username must be at least 8 characters long';
        $error2Toggle = 'd-block';
      }
    }

    /// Password validation ///
    if (empty($pwd)) {
      $errors['password'] = 'Please enter a password';
      $error3Toggle = 'd-block';
    } else {
      if (!preg_match($regex, $pwd)) {
        $errors['password'] = 'Password must contain lowercase letters, uppercase letters, and a number';
        $error3Toggle = 'd-block';
      }
    }

    /// Confirmation of password validation ///
    if (empty($conpwd)) {
      $errors['confirm_password'] = 'Confirm your password';
      $error4Toggle = 'd-block';
    } else {
      if ($conpwd !== $pwd) {
        $errors['confirm_password'] = 'Your passwords do not match';
        $error4Toggle = 'd-block';
      }
    }

    /// Give success message if completed correctly ///
    if (!array_filter($errors)) {
      $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Prepared statement failed.";
      } else {
        mysqli_stmt_bind_param($stmt, "sss", $email, $user, $hashedPassword);
        mysqli_stmt_execute($stmt);
      }
      $email = $user = $pwd = $conpwd = '';

      $success = 'Your registration was successful!';
      $successToggle = 'd-block';
    }
  }
?>
