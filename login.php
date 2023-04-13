<?php
// login.php
// NOTE: PHP for starting session must appear before any HTML is
// sent!

session_start();

$_SESSION['time']    = time();


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Instagram - Login</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="./login.css"/>
  </head>
  <body>
    <div class="container">
      <div class="text">Log in to continue</div>
      <div class="page">
        <img class="logo" src="img/instagram_cursive.png"/>
        <form action="./checkLogin.php" method="post">
          <input type="text" id="email" name="email" placeholder="Email" />
          <input type="password" id="password" name="password" placeholder="Password" />
          <button id="logIn">Log in</button>
        </form>

        <div class="signup">
            <p>Don't have an account?<a href="./register.php" data-test="signUp">Sign up</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
