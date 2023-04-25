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
        $followingid = $_POST['userData'];


                $sql2  = "Insert into Follow values(default, :userid, :followingid)";
		$stmt2 = $dbh->prepare($sql2);
                $stmt2->bindParam(':userid',$userid);
                $stmt2->bindParam(':followingid',$followingid);
                $stmt2->execute();
                $stmt2 = null;
                header("Location:./user.php?userid=".$followingid);

?>
