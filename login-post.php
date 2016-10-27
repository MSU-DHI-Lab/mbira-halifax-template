<?php
  require 'lib/site.php';

  $login = true;

  if(isset($_POST['user']) && isset($_POST['password'])) {
      $users = new Users($site);

      $user = $users->login($_POST['user'], $_POST['password']);
      $redirectLocation = $_POST['page'];
      if(!is_string($user)) {
          $_SESSION['user'] = $user;
          unset($_SESSION['login-error']);
          header("location: ".$redirectLocation);
          exit;
      } else {
          $_SESSION['login-error'] = $user;
      }
  }

  header("location: ".$redirectLocation);
