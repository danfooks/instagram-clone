<?php
        session_start();

       if ( ! isset($_SESSION['userid']) || $_SESSION['verified'] != 1 ) {
                header("Location:./login.php");
                exit();
       }

        if (!include('../connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

	$userid = $_SESSION['userid'];
        $followingid = $_POST['userData'];

                $sql  = "DELETE from Follow WHERE Follower_Id = :userid AND Following_Id = :followingid";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':userid',$userid);
		$stmt->bindParam(':followingid',$followingid);
                $stmt->execute();
                $stmt = null;
                header("Location:./user.php?userid=".$followingid);
?>
