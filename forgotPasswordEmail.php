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
        $sql  = "SELECT User_Id FROM User WHERE email = ':email'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();
        $userid = $result['User_Id'];

        $stmt = null;

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
} catch (Exception $e) {
        echo "Error";
        echo $e->getMessage();
}

// php to send info to DB in try/catch
try {
        $sql  = "INSERT INTO PasswordRecover values( ";
        $sql .=        "default, :confirmcode, :userid)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':confirmcode', $confirmcode);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        $stmt = null;
} catch (Exception $e) {
        echo "Error";
        echo $e->getMessage();
}
?>

<p>
        Down here you'd probably put a message like "I have sent email to
        the address you gave" or something.
</p>