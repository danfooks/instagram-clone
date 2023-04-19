<?php
// checkemail.php
//
// Copied from:  D Provine, 4 August 2013
        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

// Check the form was filled in correctly
if ( !isset($_POST['email']) ) {
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

<p>
Down here you'd probably put a message like "I have sent email to
the address you gave" or something.
</p>
