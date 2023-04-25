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

	function deleteUser($user_id) {
		$sql  = "DELETE from User WHERE User_Id = :userid ";
        	$sql .= "Order by Post_Date desc";
        	$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':userid',$user_id);
        	$stmt->execute();
		$stmt = null;
		header("Location:./admin.php");
	}

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
echo '<button onclick="confirmDelete(' . $user['User_Id'] . ')">Delete User?</button>';
                echo "</div>\n";
        }

        $stmt = null;
?>
</div>

</div>

<script>
function confirmDelete(user_id) {
  if (confirm("Are you sure you want to delete this user?")) {
    <?php deleteUser(' . $user_id . '); ?>
  }
}
</script>

