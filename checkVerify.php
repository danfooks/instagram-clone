<?php
//Verify User From Email
        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

session_start();

$confirm_code = $_GET['code'];

try {
        $sql  = "SELECT User_Id from User WHERE Verified = :code";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':code',$confirm_code);
        $stmt->execute();

        $result = $stmt->fetch();

        $userid = $result['User_Id'];
	$_SESSION['userid'] = $userid;
        $stmt = null;


}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}
//relationship with default instagram account
try {
        $sql3   = "Insert into Follow ";
	$sql3  .= "values(default, :userid, 47), ";
	$sql3  .= "(default, 47, :userid)";
        $stmt3 = $dbh->prepare($sql3);
        $stmt3->bindParam(':userid',$userid);
        $stmt3->execute();


        $stmt3 = null;


}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}
//change verified status
try {
        $sql2  = "UPDATE User SET Verified = 1 WHERE User_Id = :user_id";
        $stmt2 = $dbh->prepare($sql2);
        $stmt2->bindParam(':user_id',$userid);
        $stmt2->execute();

	$_SESSION['verified'] = 1;
	header("Location:./feed.php");

        $stmt2 = null;


}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}
?>
