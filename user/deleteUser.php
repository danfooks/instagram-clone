<?php
        session_start();

       if ( ! isset($_SESSION['userid']) || $_SESSION['verified'] != 1 ) {
                header("Location:../login.php");
                exit();
       }

        if (!include('../connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

        $userid = $_SESSION['userid'];

                $sql  = "Delete from User Where User_Id = :userid";
		$stmt = $dbh->prepare($sql);
                $stmt->bindParam(':userid',$userid);
                $stmt->execute();
                $stmt = null;
                header("Location:../login.php");
?>
