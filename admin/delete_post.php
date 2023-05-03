<?php
        session_start();

       if ( ! isset($_SESSION['userid']) || $_SESSION['verified'] != 1 || $_SESSION['isAdmin'] != 1) {
                header("Location:../login.php");
                exit();
       }

        if (!include('../connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

	$post_id = $_POST['postData'];

		$sql2 = "SELECT fileLocation from Post where Post_Id = :post_id";
		$stmt = $dbh->prepare($sql2);
                $stmt->bindParam(':postid',$post_id);
                $stmt->execute();

		$result = $stmt->fetch();


		// Check if the file exists
		if (file_exists($result['fileLocation'])) {
    		// Delete the file
    		if (unlink($result['fileLocation'])) {
        		echo "File deleted successfully.";
    		} else {
        		echo "Error deleting file.";
    		}
		} else {
    		echo "File does not exist.";
		}
                $stmt = null;


		$sql  = "DELETE from Post WHERE Post_Id = :postid ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':postid',$post_id);
                $stmt->execute();
                $stmt = null;
                header("Location:./admin.php");
?>
