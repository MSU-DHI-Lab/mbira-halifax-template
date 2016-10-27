<?php
  if (!isset($_GET['v'])) {
    header("location: index.php");
    exit;
  }
  $pagename = "Reset Password";

  include 'lib/site.php';
  include 'includes/head.php';
  include 'includes/header.php';

  $controller = new ValidationController($site);
  $user = $controller->validate($_GET['v']);

  if ($user == "Invalid validator") {
    header("location: index.php");
    exit;
  }
?>

<!--===============================
Landing Image
================================-->
<div id='landing' class="signInUp">
	<div id='landing-overlay-blend' class="main"></div>
</div>

<!--===============================
Sign Up Title
================================-->
<section id='main' class="signInUp">
	<h2 class="signInUp">Reset Password</h2>
</section>

<section id='signInUp' class="main">

  <form id="signInUpForm" action="resetpassword-post.php" method="post" style="display: flex;flex-direction: column;align-items: center;">
      <?php
      if(isset($_SESSION['newpass-error'])) {
          echo "<p>" . $_SESSION['newpass-error'] . "</p>";
          unset($_SESSION['newpass-error']);
      }
      ?>
      <input class="loginField" type="email" name="email" value="<?php echo $user['email'] ?>" disabled />
      <input class="loginField" type="hidden" name="v" value="<?php echo $_GET['v'] ?>" />
      <label for="password">Password</label>
      <input class="loginField" type="password" name="password" placeholder="New Password" />
      <label for="repeatPassword">Password Confirmation</label>
      <input class="loginField" type="password" name="repeatPassword" placeholder="Repeat Password" />

      <input class="Submit signUp" type="submit" value="Submit">


  </form>
</section>


<?php
    include 'includes/footer.php';
?>
