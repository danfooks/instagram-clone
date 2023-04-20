<?php
// resetPassword.php
// NOTE: PHP for starting session must appear before any HTML is
// sent!

session_start();

$_SESSION['time']    = time();


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Instagram - Password Reset</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="./login.css"/>
  </head>
  <body>
    <div class="container">
      <div class="text">Create a new password</div>
      <div class="page">
        <img class="logo" src="img/instagram_cursive.png"/>
        <form action="./checkLogin.php" method="post">
          <input type="text" id="newPassword" name="newPassword" placeholder="New Password" />
          <input type="text" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" />
          <button id="changePassword">Change Password</button>
        </form>

        <div class="signup">
            <p>Don't have an account?<a href="./register.php" data-test="signUp">Sign up</a></p>
	        <p>Existing user?<a href="./login.php" data-test="logIn">Log in</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
