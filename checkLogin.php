<?php
//checkLogin
	if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

session_start();

//THIS WORKS
if ( !isset($_POST['email']) ||
     !isset($_POST['password'])
) {
    die("You did not fill in the form correctly.  Try again.");
}

//THIS WORKS
$email = $_POST['email'];
$password = $_POST['password'];

try {
        $sql  = "SELECT User_Id, Hash_Password, Verified, IsAdmin ";
	$sql .=	"from User WHERE Email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->execute();

	$result = $stmt->fetch();

	$user_id = $result['User_Id'];
    	$stored_password = $result['Hash_Password'];
	$verified = $result['Verified'];
	$isAdmin = $result['IsAdmin'];
	$stmt = null;

}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}
?>
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

	<div class="error message">
<?php

if ( password_verify( $password, $stored_password ) ) {
        $_SESSION['userid'] = $user_id;
        $_SESSION['verified'] = $verified;
	$_SESSION['isAdmin'] = $isAdmin;
        echo "<br>" . $_SESSION['userid'];
        header("Location:./feed.php");
  } else {
      print("Incorrect Email or Password");
  }

?>
	</div>
        <div class="signup">
            <p>Don't have an account?<a href="./register.php" data-test="signUp">Sign up</a>
            <p><a href="./forgot.php" data-test="forgotPassword">Forgot password?</a></p>
	</div>
      </div>
    </div>
  </body>
</html>

