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

print("email: " . $email . "<br>");
print("password: " . $password . "<br>");

try {
        $sql  = "SELECT User_Id, Hash_Password, Verified from User WHERE Email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->execute();

	$result = $stmt->fetch();

	$user_id = $result['User_Id'];
    	$stored_password = $result['Hash_Password'];
	$verified = $result['Verified'];
	$stmt = null;

}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}
print($user_id);
print($stored_password);

if ( password_verify( $password, $stored_password ) ) {
	$_SESSION['userid'] = $user_id;
	$_SESSION['verified'] = $verified;
      	echo "<br>" . $_SESSION['userid'];
	header("Location:./feed.php");
  } else {
      die("Incorrect Password");
  }

?>
