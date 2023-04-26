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
        $commentid = $_POST['commentid'];
	$postid = $_POST['postid'];


                $sql  = "Delete from Comment where Comment_Id = :commentid";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':commentid',$commentid);
                $stmt->execute();
                $stmt = null;
                header("Location:./viewPost.php?Post_Id=".$postid);

?>
