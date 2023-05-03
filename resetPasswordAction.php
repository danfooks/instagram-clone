<?php
	session_start();

       if ( ! isset($_SESSION['userid']) || $_SESSION['verified'] != 1 ) {
                header("Location:./login.php");
                exit();
       }


        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

session_start();

// Check the form was filled in correctly
if ( $_POST['newPassword'] != $_POST['confirmPassword'] ) {
    die("Passwords do not match. Please try again.");
}

$newPassword = $_POST['newPassword'];
$hash_password = password_hash($newPassword, PASSWORD_DEFAULT);
$userid = $_SESSION['userid'];

// php to send info to DB in try/catch
try {
	$sql  = "UPDATE User SET Hash_Password = :newPassword ";
	$sql .=	"WHERE User_Id = :userid";
        $stmt = $dbh->prepare($sql);
	$stmt->bindParam(':newPassword',$hash_password);
	$stmt->bindParam(':userid',$userid);
        $stmt->execute();

	echo "Your password has been reset";

        $stmt = null;
}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}
header("Location:./feed.php");
?>
