<!DOCTYPE html>
<html>
  <head>
    <title>Instagram - Login</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
  </head>
  <body>
    <div class="container">
      <div class="text">Log in to continue</div>
      <div class="page">
        <img class="logo" src="img/instagram_cursive.png"/>

	<div class="error">
<?php
// checkemail.php
//
// Copied from:  D Provine, 4 August 2013
        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

// Check the form was filled in correctly
if ( !isset($_POST['email']) ||
     !isset($_POST['fullName']) ||
     !isset($_POST['username']) ||
     !isset($_POST['password'])
) {
    die("You did not fill in the form correctly.  Try again.");
}

if ( $_POST['password'] != $_POST['confirmPassword'] ) {
    die("Passwords do not match. Please try again.");
}

$email = $_POST['email'];
$fullName = $_POST['fullName'];
$username = $_POST['username'];
$plain_password = $_POST['password'];
$hash_password = password_hash($plain_password, PASSWORD_DEFAULT);

$host = "elvis.rowan.edu";
$site = "Instagram";
$confirmsite = "/~heitma24/awp/Instagram/instagram-clone/checkVerify.php";
$myemail = "fooksd3@elvis.rowan.edu";

// Put together the confirmation ID:
$now = time();
$confirmcode = sha1("confirmation" . $now . $_POST['email']);


// php to send info to DB in try/catch
try {
	$sql  = "INSERT INTO User values( ";
	$sql .=	"default, :username, :fullName, ";
	$sql .=	"default, :email, :password, ";
	$sql .=	"now(), :verify, default, default)";
        $stmt = $dbh->prepare($sql);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':fullName',$fullName);
	$stmt->bindParam(':username',$username);
	$stmt->bindParam(':password',$hash_password);
	$stmt->bindParam(':verify', $confirmcode);
        $stmt->execute();

	echo "A confirmation code has been sent. Please check your email!";

        $stmt = null;
}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}

# UNCOMMENT THIS LINE FOR A SYNTAX ERROR TO STOP EMAIL GOING OUT

// put together the email:
$to      = $_POST['email'];
$subject = "$site: Verify Your New Account";
$headers = "From: $myemail \r\n" .
           "Reply-To: $myemail \r\n" .
           'X-Mailer: PHP/' . phpversion() ;
$message = "Welcome to $site!\r\n\r\n" .
           "To confirm your username, please click this link:\r\n\r\n" .
           "http://$host$confirmsite?code=$confirmcode \r\n" .
           "(If you did not register at $site, \r\n" .
           "just ignore this message.)\r\n";

mail($to, $subject, $message, $headers);

?>

	</div>
        <div class="signup">
            <p>Don't have an account?<a href="./register.php" data-test="signUp">Sign up</a></p>
	    <p><a href="./forgot.php" data-test="forgotPassword">Forgot password?</a></p>        
</div>
      </div>
    </div>
  </body>
</html>
