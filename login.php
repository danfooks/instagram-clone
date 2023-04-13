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
        <form id="loginForm" method="post">
          <input type="text" id="email" name="email" placeholder="Email" />
          <input type="password" id="password" name="password" placeholder="Password" />
	  <div id="errorMessage"></div>
          <button id="logIn">Log in</button>
        </form>

        <div class="signup">
            <p>Don't have an account?<a href="./register.php" data-test="signUp">Sign up</a></p>
        </div>
      </div>
    </div>

    <script>
	// Add an event listener to the login form
document.getElementById("loginForm").addEventListener("submit", function(event) {
  event.preventDefault(); // prevent default form submission

  // Get the form data
  const formData = new FormData(event.target);

  // Send an AJAX request to check the user's credentials
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "checkLogin.php");
  xhr.onload = function() {
    if (xhr.status === 200) {
      // If the request was successful, check the response from the server
      const response = JSON.parse(xhr.responseText);
      if (response.success) {
        // If the login was successful, redirect to the feed page
        window.location.href = "feed.php";
      } else {
        // If the login was unsuccessful, display an error message
        document.getElementById("errorMessage").innerHTML = '<div class="error">Invalid username or password</div>';
      }
    } else {
      // If the request failed, display an error message
      document.getElementById("errorMessage").innerHTML = '<div class="error">An error occurred while processing your request</div>';
    }
  };
  xhr.send(formData);
});
    </script>

  </body>
</html>
