<!DOCTYPE html>
<html>
  <head>
    <title>Instagram - Login</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
  </head>
  <body>
    <div class="container">
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
if (!isset($_POST['email'])) {
        die("You did not fill in the form correctly.  Try again.");
}

$email = $_POST['email'];

$host = "elvis.rowan.edu";
$site = "Instagram";
$confirmsite = "/~heitma24/awp/Instagram/instagram-clone/checkPasswordEmail.php";
$myemail = "fooksd3@elvis.rowan.edu";

// Put together the confirmation ID:
$now = time();
$confirmcode = sha1("confirmation" . $now . $_POST['email']);

try {
        $sql  = "SELECT User_Id FROM User WHERE email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();
        $userid = $result['User_Id'];
        $stmt = null;
} catch (Exception $e) {
        echo "Error";
        echo $e->getMessage();
}

// php to send info to DB in try/catch

if(! is_null($userid)){
try {
        $sql  = "INSERT INTO PasswordRecover values( ";
        $sql .=        "default, :confirmcode, :userid)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':confirmcode', $confirmcode);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        echo "A link to reset your password has been sent. Please check your email!";

	// put together the email:
        $to      = $_POST['email'];
        $subject = "$site: Password Recovery Link";
        $headers = "From: $myemail \r\n" .
                "Reply-To: $myemail \r\n" .
                'X-Mailer: PHP/' . phpversion();
        $message = "$site Password Recovery\r\n\r\n" .
                "To reset your password, please click this link:\r\n\r\n" .
                "http://$host$confirmsite?code=$confirmcode \r\n" .
                "(If you did not send a password reset request for $site, \r\n" .
                "please ignore this message.)\r\n";

        mail($to, $subject, $message, $headers);


        $stmt = null;
} catch (Exception $e) {
        echo "Error";
        echo $e->getMessage();
}
}
?>
        </div>
      </div>
    </div>
  </body>
</html>
