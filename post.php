<?php
//Handle Creating New Posts
//
//ATTENCION!!!!!!!!!!!!
//IN ORDER FOR THIS TO WORK, UPLOADED DIRECTORY PERMS MUST BE 701
//AND UPLOADED/archive DIRECTORY PERMS MUST BE 777
//
//IN PROGRESS
        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();


        session_start();

       if ( ! isset($_SESSION['userid']) ) {
           header("Location:./login.php");
           exit();
       }
/*
	if ( !isset($_POST['file-ip-1']) ||
	     !isset($_POST['caption'])

	) {
    		die("You did not fill in the form correctly.  Try again.");
	  }
*/

echo "Name On Client: ", $_FILES["file-ip-1"]["name"], "<br />";
echo "Name On Server: ", $_FILES["file-ip-1"]["tmp_name"], "<br />";
echo "File Size: ", $_FILES["file-ip-1"]["size"], " bytes <br />";

$location = $_POST['location'];
$caption = $_POST['caption'];
$userid = $_SESSION['userid'];

print($location);
print($caption);

//CREATE USER UPLOAD DIRECTORY IF IT DOESNT ALREADY EXIST
if (file_exists("./UPLOADED/archive/" . $_SESSION["userid"])) {
    print("I see it already exists; you've uploaded before.");
} else {
    // bug in mkdir() requires you to chmod()
    mkdir("./UPLOADED/archive/" . $userid, 0777);
	print("created directory");
    chmod("./UPLOADED/archive/" . $userid, 0777);
	print("update directory permissions");
}

//CHECK TO SEE IF THE FILE WAS ALREADY UPLOADED
if (!is_uploaded_file( $_FILES["file-ip-1"]["tmp_name"] ) ) {
    die("Error: " . $_FILES["file-ip-1"]["name"] . " did not upload.");
}



$targetname = "./UPLOADED/archive/" . $_SESSION["userid"] . "/" .
              $_FILES["file-ip-1"]["name"];
print($targetname);

if (file_exists($targetname)) {
    echo "<p>Already uploaded one with this name.  I'm confused.</p>";
} else {
    if ( copy($_FILES["file-ip-1"]["tmp_name"], $targetname) ) {
        // if we don't do this, the file will be mode 600, owned by
        // www, and so we won't be able to read it ourselves
        chmod($targetname, 0444);
        // but we can't upload another with the same name on top,
        // because it's now read-only

	try {
        	$sql  = "INSERT INTO Post values( ";
        	$sql .= "default, :user_id, :fileLocation, ";
        	$sql .= ":caption, now(), :location) ";
        	$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':user_id',$userid);
        	$stmt->bindParam(':fileLocation',$targetname);
                $stmt->bindParam(':caption',$caption);
        	$stmt->bindParam(':location',$location);
        	$stmt->execute();

        	$stmt3 = null;
	}catch(Exception $e){
        	echo "Error";
        	echo $e->getMessage();
	}
    } else {
        die("Error copying ". $_FILES["file-ip-1"]["name"]);
    }
}
header("Location:./feed.php");
?>
