<?php
  session_start();
  $currentPage = 'Home';
  $styleLink = '../css/style.css';

  include 'header.php';
  if (!isset($_SESSION['userName'])) {

    header("Location: ../views/login.php");
  }
?>

<main class="container">
  <h1 class="home mt-5">You are now logged in!</h1>

  <form action="../includes/logout.php" method="post">
    <div class="d-flex">
      <button type="submit" name="submit" class="btn btn-outline-dark mt-3 w-40 mx-auto">Log out</button>
    </div>
  </form>
</main>

<?php include 'footer.php'; ?>