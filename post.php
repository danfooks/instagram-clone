<?php
//Handle Creating New Posts
//IN PROGRESS
        session_start();

       if ( ! isset($_SESSION['userid']) ) {
           header("Location:./login.php");
           exit();
       }

	if ( !isset($_POST['email']) ||
     	     !isset($_POST['password'])

	) {
    		die("You did not fill in the form correctly.  Try again.");
	  }

try {
        $sql  = "INSERT INTO Post values( ";
        $sql .= "default, :user_id, :fileLocation, ";
        $sql .= ":caption, default, :location) ";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':fileLocation',$email);
        $stmt->bindParam(':fullName',$fullName);
        $stmt->bindParam(':user_id',$_SESSION['user_id']);
        $stmt->bindParam(':password',$hash_password);
        $stmt->execute();

        $stmt = null;
}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}

?>
