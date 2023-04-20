<?php
//Verify User From Email
        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

session_start();

$confirm_code = $_GET['code'];

try {
        $sql  = "SELECT User_Id, Verified from PasswordRecover ";
	$sql .=	"Join User using (User_Id) ";
	$sql .= "WHERE RecoverCode = :code";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':code',$confirm_code);
        $stmt->execute();

        $result = $stmt->fetch();

        $userid = $result['User_Id'];
	$verified = $result['Verified'];
	$_SESSION['userid'] = $userid;
	$_SESSION['verified'] = $verified;
        $stmt = null;


}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}

try {
        $sql2  = "DELETE FROM PasswordRecover WHERE RecoverCode = :code";
        $stmt2 = $dbh->prepare($sql2);
        $stmt2->bindParam(':code',$confirm_code);
        $stmt2->execute();

	header("Location:./feed.php");

        $stmt2 = null;

}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}
?>
