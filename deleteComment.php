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

                $sql  = "Delete from Comment where Comment_Id = :commentid";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':userid',$userid);
                $stmt->bindParam(':commentid',$commentid);
                $stmt->execute();
                $stmt = null;
                header("Location:./user.php?userid=".$followingid);
?>
