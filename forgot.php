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
    <title>Instagram - Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
  </head>
  <body>
    <div class="container">
      <div class="text">Password recovery</div>
      <div class="page">
        <img class="logo" src="img/instagram_cursive.png"/>
        <form action="./forgotPasswordEmail.php" method="post">
	  <div class="signup">
	    <p>Enter the email address affiliated with your account to receive a recovery email.</p>
	  </div>
          <input type="text" id="email" name="email" placeholder="Email" />
          <button id="sendRecovery">Send Recovery Link</button>
        </form>

        <div class="signup">
            <p>Don't have an account?<a href="./register.php" data-test="signUp">Sign up</a></p>
	          <p><a href="./login.php" data-test="logIn">Log in</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
