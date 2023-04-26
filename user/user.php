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
$pageid = $_GET['userid'];

//BEGIN USER INFO

        $sql  = "Select *, ";
	$sql .= "(SELECT count(Follow_Id) FROM Follow WHERE Follower_Id = User_Id) as 'numFollowing', ";
        $sql .= "(SELECT count(Follow_Id) FROM Follow WHERE Following_Id = User_Id) as 'numFollowers', ";
        $sql .= "(SELECT count(Post_Id) FROM Post p WHERE u.User_Id = p.User_Id) as 'numPosts' ";
        $sql .= "From User u WHERE User_Id = :userid ";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userid',$pageid);
        $stmt->execute();

        $result = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="../css/feed.css" />
    <link rel="stylesheet" href="../css/post.css" />
    <link rel="stylesheet" href="../css/user.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <a href="../feed.php"><img src="../img/navLogo.PNG" class="brand-img" alt="" /></a>
        <form class="search-form" method="post" action="../searchUsers.php">
          <input type="text" class="search-box" name="search" placeholder="Find a user" />
          <button class="search-btn" type="submit">Search</button>
        </form>
        <div class="nav-items">
          <img src="../img/home.PNG" class="icon" alt="" />
          <img src="../img/add.PNG" class="icon" id="newPost" alt="" />
          <img src="../<?php echo $result['Profile_Pic_Location']; ?>" class="icon user-profile"  alt=""></img>

          <div class="dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="./user.php?userid=<?php echo $userid; ?>">Profile</a>
              <a class="dropdown-item" onclick="logout()">Log Out</a>
            </div>
          </div>
        </div>
     </div>
    </nav>

    <!--New Post Modal code-->
    <div id="newPostModal" class="new-post-modal">
      <div class="new-post-modal-content">
        <span class="close">&times;</span>
        <h3>Create a New Post</h3>
        <form enctype="multipart/form-data" method="post" action="../post.php">
          <div class="center">
            <div class="form-input">
              <div class="preview">
                <img id="file-ip-1-preview"/>
              </div>
              <label for="file-ip-1" class="upload-image-label-button"
                >Upload Image</label
              >
              <input
                type="file"
                id="file-ip-1"
                name="file-ip-1"
                onchange="showNewPostPreview(event);"
              />
            </div>
          </div>

          <label for="location" class="input-label">Location</label>
          <input
            type="text"
            id="location"
            name="location"
            placeholder="Add location"
          />

          <label for="caption" class="input-label">Caption</label>
          <textarea
            id="caption"
            name="caption"
            rows="3"
            placeholder="Write a caption..."
            class="input-textarea"
          ></textarea>
          <input type="submit" value="Share" />
        </form>
      </div>
    </div>

    <!--Edit Profile Modal-->
    <div id="editProfileModal" class="new-post-modal">
      <!-- Modal content -->
      <div class="new-post-modal-content">
        <span class="close">&times;</span>
        <h3>Edit Profile</h3>
        <form enctype="multipart/form-data" method="post" action="./updateProfile.php">
          <div class="center">
            <div class="form-input">
              <div class="preview">
                <img id="file-ip-2-preview" />
              </div>
              <label for="file-ip-2" class="upload-image-label-button"
                >Upload Avatar</label
              >
              <input
                type="file"
                id="file-ip-2"
                name="file-ip-2"
                onchange="showAvatarPreview(event);"
              />
            </div>
          </div>

          <label for="name" class="input-label">Name</label>
          <input type="text" id="name" name="name" value="<?php echo $result['Full_Name']; ?>" />
          <label for="username" class="input-label">Username</label>
          <input type="text" id="username" name="username" value="<?php echo $result['Username']; ?>" />
          <label for="bio" class="input-label">Profile Bio</label>
          <textarea
            id="bio"
            name="bio"
            rows="3"
            class="input-textarea"
          ><?php echo $result['User_Bio']; ?></textarea>
          <input type="submit" value="Update Profile" />
        </form>
	<div class="management-buttons">
            <form class="bottom-form" action = "../resetPassword.php">
	    <button type="submit" class="secondary-button first">Reset Password</button>
	    </form>
	    <form class="bottom-form" action = "deleteUser.php">
            <button type="submit" class="secondary-button delete"
		onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
	    </form>
          </div>
      </div>
    </div>

    <div class="user-info">
      <img src="../<?php echo $result['Profile_Pic_Location']; ?>" class="user-dp" alt="" />
      <div class="info-container">
        <h1 class="name"><?php echo $result['Full_Name']; ?></h1>
        <p class="username">@<?php echo $result['Username']; ?></p>
        <p>
          <?php echo $result['User_Bio']; ?>
        </p>
      </div>
    </div>

    <div class="button-container">
<?php
if($userid != $pageid){
	$sql2  = "Select * From Follow WHERE Follower_Id = :userid and Following_Id = :pageid";
        $stmt2 = $dbh->prepare($sql2);
        $stmt2->bindParam(':userid',$userid);
	$stmt2->bindParam(':pageid',$pageid);
        $stmt2->execute();

	$follow = $stmt2->fetch();

	if($follow == null){
		echo "<form method='post' action='follow.php'>";
		echo "<input type='hidden' name='userData' value='" . $pageid . "'>";
		echo "<button class='follow-button' type='submit'>Follow</button></form>";
	}else {
		echo "<form method='post' action='unfollow.php'>";
                echo "<input type='hidden' name='userData' value='" . $pageid . "'>";
                echo "<button class='follow-button' type='submit'>Unfollow</button></form>";
	}
}
if($userid == $pageid){
	echo "<button id='editProfile' type='submit'>Edit Profile</button>";
	echo "<form action=''><button class='logout-button' type='submit' onclick='logout()'>Logout</button></form>";
	if($result['IsAdmin'] == 1){
		echo "<form action='../admin/admin.php'><button class='admin-button' type='submit'>Admin Panel</button></form>";
	}
}
?>
    </div>

    <div class="following-followers">
      <ul>
        <li>
          <a href="#">Posts</a>
          <span><?php echo $result['numPosts']; ?></span>
        </li>
        <li>
          <a href="#">Following</a>
          <span><?php echo $result['numFollowing']; ?></span>
        </li>
        <li>
          <a href="#">Followers</a>
          <span><?php echo $result['numFollowers']; ?></span>
        </li>
      </ul>
    </div>

    <div class="container">
	<div class="row">
<?php
	$stmt = null;
	$sql  = "Select FileLocation, Post_Id from Post ";
        $sql .= "Where User_Id = :userid Order by Post_Date desc";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userid',$pageid);
        $stmt->execute();

	foreach($stmt->fetchAll() as $userPost){
?>
  <div class="col-4">
		<a href="../viewPost.php?Post_Id=<?php echo $userPost['Post_Id']; ?>">
		<img src="../<?php echo $userPost['FileLocation']; ?>" />
		</a>
	</div>

      <?php
      }
      $stmt = null;
      ?>
	</div>
    </div>

    <script>
      function logout() {
        // Use AJAX to call a PHP script to destroy the session
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../logout.php", true);
        xhr.send();

        // Redirect to the login page or any other page as needed
        window.location = "../login.php";
      }

      // Begin Edit Profile Modal
      // Populate image preview
      function showAvatarPreview(event) {
        if (event.target.files.length > 0 && editProfileModal.style.display === "block") {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-2-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }

      // Get the modal
      var editProfileModal = document.getElementById("editProfileModal");

      // Get the button that opens the modal
      var editProfileButton = document.getElementById("editProfile");

      // Get the <span> element that closes the modal
      var span2 = document.getElementsByClassName("close")[1];

      // When the user clicks the button, open the modal
      editProfileButton.onclick = function () {
        editProfileModal.style.display = "block";
      };

      // When the user clicks on <span> (x), close the modal
      span2.onclick = function () {
        editProfileModal.style.display = "none";
      };

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == editProfileModal) {
            editProfileModal.style.display = "none";
        }
      };

      // End Edit Profile Modal

      // Populate image preview
      function showNewPostPreview(event) {
        if (event.target.files.length > 0) {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }

      // Get the modal
      var newPostModal = document.getElementById("newPostModal");

      // Get the button that opens the modal
      var newPostButton = document.getElementById("newPost");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal
      newPostButton.onclick = function () {
        newPostModal.style.display = "block";
      };

      // When the user clicks on <span> (x), close the modal
      span.onclick = function () {
        newPostModal.style.display = "none";
      };

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == newPostModal) {
          newPostModal.style.display = "none";
        }
      };

      // Get the dropdown element and menu
      const dropdown = document.querySelector(".dropdown");
      const dropdownMenu = dropdown.querySelector(".dropdown-menu");
      const userProfileIcon = document.querySelector(".icon.user-profile");

      // Add a click event listener to the user profile icon
      userProfileIcon.addEventListener("click", (event) => {
        // Toggle the 'show' class on the dropdown menu
        dropdownMenu.classList.toggle("show");
      });

      // Close the dropdown menu when the user clicks outside of it
      window.addEventListener("click", (event) => {
        if (
          !event.target.matches(".icon.user-profile") &&
          !event.target.matches(".dropdown-menu a")
        ) {
          dropdownMenu.classList.remove("show");
        }
      });
    </script>
    <!--End New Post Modal code-->
  </body>
</html>
