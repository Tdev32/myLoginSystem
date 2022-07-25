<?php
  session_start();
  $currentPage = 'Home';
  $styleLink = '../css/style.css';

  include 'header.php';
  if (!isset($_SESSION['userName'])) {

    header("Location: ../views/login.php");
  }
?>

<main>
  <h1 class="home">You are now logged in!</h1>

  <?php
    print_r($_SESSION);
  ?>
  <br />
  <form action="../includes/logout.php" method="post">
    <button type="submit" name="submit" class="btn btn-primary w-30 mt-4">Log out</button>
  </form>
</main>

<?php include 'footer.php'; ?>