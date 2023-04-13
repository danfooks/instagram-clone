<!DOCTYPE html>
<html>
  <head>
    <title>Instagram - Sign Up</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" type="text/css" href="./login.css" />
  </head>
  <body>
    <div class="container">
      <div class="page">
        <img class="logo" src="img/instagram_cursive.png" />
        <h2 class="description">
          Sign up to see photos and videos from your friends.
        </h2>
        <form action="./verifyEmail.php" method="post">
          <input type="text" id="email" name="email" placeholder="Email" />
          <input type="text" id="fullName" name="fullName" placeholder="Full Name" />
          <input type="text" id="username" name="username" placeholder="Username" />
          <input type="text" id="password" name="password" placeholder="Password" />
          <input
            type="text"
            id="confirmPassword"
            name="confirmPassword"
            placeholder="Confirm Password"
          />
          <div class="terms">
            <p>
              Upon creating an account, you are agreeing to Instagram's
              <a
                href="https://youtu.be/dQw4w9WgXcQ"
                data-test="termsAndConditions"
                target="_blank"
              >
                Terms & Conditions
              </a>
            </p>
          </div>
          <button>Create Account</button>
          <div class="signup">
            <p>
              Have an account?<a href="./login.php" data-test="logIn"
                >Log in</a
              >
            </p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
