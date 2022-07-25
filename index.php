<?php
  // Variables
  $currentPage = 'Registration';
  $styleLink = 'css/style.css';
  
  // Additional files
  include 'includes/config.php';
  include 'includes/registrationValidator.php';
  include 'views/header.php';
?>

<main>
  <div class="container">
    <h1 class="mt-3">Registration</h1>
    <div class="<?php echo $successToggle ?> p-2 my-2 rounded alert-success"><?php echo $success ?></div>

    <form action="index.php" method="post">
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $email ?>" />
        <p class="<?php echo $error1Toggle ?> p-2 mt-2 rounded alert-danger"><?php echo $errors['email'] ?></p>
      </div> <!-- EMAIL -->


      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $user ?>" />
        <div class="<?php echo $error2Toggle ?> p-2 mt-2 rounded alert-danger"><?php echo $errors['username'] ?></div>
      </div> <!-- USERNAME -->

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $pwd ?>" />
        <div class="<?php echo $error3Toggle ?> p-2 mt-2 rounded alert-danger"><?php echo $errors['password'] ?></div>
      </div> <!-- PASSWORD -->

      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" value="<?php echo $conpwd ?>" />
        <div class="<?php echo $error4Toggle ?> p-2 mt-2 rounded alert-danger"><?php echo $errors['confirm_password'] ?></div>
      </div> <!-- PASSWORD CONFIRMATION -->


      <button class="btn btn-primary w-100" name="submit">Register</button>
      <a class="text-secondary" href="views/login.php">Or login here</a>

    </form>
  </div>
</main>

<?php include 'views/footer.php'; ?>
