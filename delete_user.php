<?php
        session_start();

       if ( ! isset($_SESSION['userid']) || $_SESSION['verified'] != 1 || $_SESSION['isAdmin'] != 1) {
                header("Location:./login.php");
                exit();
       }

        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

	$user_id = $_POST['userData'];

		$sql  = "DELETE from User WHERE User_Id = :userid ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':userid',$user_id);
                $stmt->execute();
                $stmt = null;
                header("Location:./admin.php");
?>
