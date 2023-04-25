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

	$post_id = $_POST['postData'];

		$sql  = "DELETE from Post WHERE Post_Id = :postid ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':postid',$post_id);
                $stmt->execute();
                $stmt = null;
                header("Location:./admin.php");
?>
