<?php
  $currentPage = 'Login';
  $styleLink = '../css/style.css';

  include '../includes/config.php';
  include '../includes/loginValidator.php';
  include 'header.php';
?>

<main>
  <div class="container">
    <h1 class="mt-3">Login</h1>
    
    <form action="login.php" method="post">
      <div class="form-group">
        <label>Username</label>  
        <input type="text" class="form-control" name="usernameOremail" value="<?php echo $account ?>" />
        <div class="<?php echo $error1Toggle ?> p-2 mt-2 rounded alert-danger"><?php echo $errors['account'] ?></div>
      </div> <!-- USERNAME -->

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" />
        <div class="<?php echo $error2Toggle ?> p-2 mt-2 rounded alert-danger"><?php echo $errors['password'] ?></div>
      </div> <!-- PASSWORD -->

      <div class="form-group ml-4">
        <input type="checkbox" name="checkBox" value="" checked class="form-check-input" />
        <label class="form-check-label">Remember me</label>
      </div> <!-- CHECKBOX | REMEMBER ME FEATURE -->

      <button type="submit" class="btn btn-primary w-100" name="submit">Sign In</button>


      <a class="text-secondary" href="new_password.php">Forgot password?</a>
      <a class="text-secondary ml-4" href="../index.php">Register here</a>
    </form>
  </div>
</main>

<?php include 'footer.php'; ?>