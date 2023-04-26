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

?>
<div class="grid-container" style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 20px;">
<div class="grid-child">
<h1>Posts</h1>
<?php
	$sql  = "SELECT * from Post ";
        $sql .= "Order by Post_Date desc";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

	foreach($stmt->fetchAll() as $post){
                echo "<div>";
                echo "<h2>User Id: " . $post['User_Id'] . "</h2>\n";
                echo "<p>Post Caption: " . $post['Caption'] . "</p>\n";
                echo "<p>Post Date: " . $post['Post_Date'] . "</p>\n";
                echo "<form method='post' action='./delete_post.php'>";
                echo "<button name='postData' value='" . $post['Post_Id'] . "'>Delete Post?</button></form>";
                echo "</div>\n";
        }

	$stmt = null;
?>
</div>
<div class="grid-child">
<h1>Users</h1>
<?php
        $sql  = "SELECT * from User ";
        $sql .= "Order by Creation_Date desc";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        foreach($stmt->fetchAll() as $user){
                echo "<div>";
                echo "<h2>Username: " . $user['Username'] . "</h2>\n";
                echo "<p>Email: " . $user['Email'] . "</p>\n";
                echo "<p>Is Admin?: " . $user['IsAdmin'] . "</p>\n";
		echo "<form method='post' action='./delete_user.php'>";
		echo "<button name='userData' value='" . $user['User_Id'] . "'>Delete User?</button></form>";
                echo "</div>\n";
        }

        $stmt = null;
?>
</div>

</div>

