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
        $fullname = $_POST['name'];
	$username = $_POST['username'];
	$bio = $_POST['bio'];

	echo $username . "\n";
	echo $fullname . "\n";
	echo $bio . "\n";

	echo "Name On Client: ", $_FILES["file-ip-2"]["name"], "<br />";
	echo "Name On Server: ", $_FILES["file-ip-2"]["tmp_name"], "<br />";
	echo "File Size: ", $_FILES["file-ip-2"]["size"], " bytes <br />";

	if($_FILES['file-ip-2']['name'] != null){

		//check to see if directory exists else create one
		if (file_exists("../UPLOADED/archive/" . $_SESSION["userid"])) {
    			print("I see it already exists; you've uploaded before.");
		} else {
    			// bug in mkdir() requires you to chmod()
    			mkdir("../UPLOADED/archive/" . $userid, 0777);
        			print("created directory");
    			chmod("../UPLOADED/archive/" . $userid, 0777);
        			print("update directory permissions");
		}
		//check to see if file is uploaded, if so, die
		if (!is_uploaded_file( $_FILES["file-ip-2"]["tmp_name"] ) ) {
    		  die("Error: " . $_FILES["file-ip-2"]["name"] . " did not upload.");
		}
		//set target name
		$targetname = "./UPLOADED/archive/" . $_SESSION["userid"] . "/" .
              			$_FILES["file-ip-2"]["name"];

		if (file_exists($targetname)) {
    			echo "<p>Already uploaded one with this name.  I'm confused.</p>";
		} else {
    		  if ( copy($_FILES["file-ip-2"]["tmp_name"], "." . $targetname) ) {
        		// if we don't do this, the file will be mode 600, owned by
        		// www, and so we won't be able to read it ourselves
        		chmod($targetname, 0444);
        		// but we can't upload another with the same name on top,
        		// because it's now read-only
			try {
                		$sql2  = "Update User set ";
                		$sql2 .= "Profile_Pic_Location = :target ";
                		$sql2 .= "WHERE User_Id = :userid";
                		$stmt2 = $dbh->prepare($sql2);
                		$stmt2->bindParam(':userid',$userid);
                		$stmt2->bindParam(':target',$targetname);
                		$stmt2->execute();
                		$stmt2 = null;
                		header("Location:./user.php?userid=".$userid);

        		}catch(Exception $e){
                		echo "Error";
                		echo $e->getMessage();
        		}
		  } else {
        		die("Error copying ". $_FILES["file-ip-2"]["name"]);
    		  }
		}
	}


	try {
                $sql2  = "Update User set ";
		$sql2 .= "Username = :username, ";
		$sql2 .= "Full_Name = :fullname, ";
		$sql2 .= "User_Bio = :bio ";
		$sql2 .= "WHERE User_Id = :userid";
                $stmt2 = $dbh->prepare($sql2);
                $stmt2->bindParam(':userid',$userid);
                $stmt2->bindParam(':fullname',$fullname);
		$stmt2->bindParam(':username',$username);
		$stmt2->bindParam(':bio',$bio);
                $stmt2->execute();
                $stmt2 = null;
                header("Location:./user.php?userid=".$userid);

	}catch(Exception $e){
		echo "Error";
		echo $e->getMessage();
	}
?>
