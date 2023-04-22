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


$userid = $_SESSION['userid'];
$commentText = $_POST['commentText'];
$currentPost = $_SESSION['currentPost'];

try {
        $sql  = "INSERT INTO Comment values( ";
        $sql .= "default, :userid, :postid, ";
        $sql .= ":text, now() )";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userid',$userid);
        $stmt->bindParam(':postid',$currentPost);
        $stmt->bindParam(':text',$commentText);
        $stmt->execute();

        $stmt = null;
}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}

	header("Location:./viewPost.php?Post_Id=$currentPost");
?>
