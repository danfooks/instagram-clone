<?php
	session_start();

       if ( ! isset($_SESSION['userid']) || $_SESSION['verified'] != 1 ) {
       		header("Location:./login.php");
           	exit();
       }

	if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();


$userid = $_SESSION['userid'];
$search = $_POST['search'];
$searchParam = '%' . $search . '%';

        $sql  = "Select User_Id, Profile_Pic_Location, Full_Name, Username from User ";
	$sql .= "where Username like :search ";
	$sql .= "Order by Username like :search desc";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':search',$searchParam);
        $stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/feed.css" />
    <link rel="stylesheet" href="css/searchUsers.css" />
  </head>
  <body>
        <nav class="navbar">
      <div class="nav-wrapper">
        <a href="./feed.php"><img src="img/navLogo.PNG" class="brand-img" alt="" /></a>
        <form class="search-form" method="post" action="./searchUsers.php">
          <input type="text" class="search-box" name="search" placeholder="Find a user" />
          <button class="search-btn" type="submit">Search</button>
        </form>
        <div class="nav-items">

          <img src="img/home.PNG" class="icon" alt=""/>
          <img src="img/add.PNG" class="icon" id="newPost" alt="" />
          <img src="<?php echo $result['Profile_Pic_Location']; ?>" class="icon user-profil>

          <div class="dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="./user/user.php?userid=<?php echo $userid; ?>">              <a class="dropdown-item" onclick="logout()">Log Out</a>
            </div>
          </div>

        </div>
      </div>
    </nav>
    <section class="main">
      <div class="wrapper">
        <div class="status-wrapper">
            <div class="right-col">
<?php
	foreach($stmt->fetchAll() as $user){

?>
                <div class="profile-card">
                  <div class="profile-pic">
                    <img src="<?php echo $user['Profile_Pic_Location']; ?>" alt="">
                  </div>
                  <div>
                    <p class="username"><?php echo $user['Username']; ?></p>
                    <p class="sub-text"><?php echo $user['Full_Name']; ?></p>
                  </div>
		<form action="./user/user.php" method="get">
		<input type="hidden" name="userid" value="<?php echo $user['User_Id']; ?>">
		<button type='submit' class='action-btn'>View Profile</button>
		</form>
                </div> 

<?php
}
$stmt = null;
?>
        </div>  
      </div>
    </section>

    <!--Begin New Post Modal code-->
<!-- The Modal -->
<div id="newPostModal" class="new-post-modal">
  <!-- Modal content -->
  <div class="new-post-modal-content">
    <span class="close">&times;</span>
    <h3>Create a New Post</h3>
    <form enctype="multipart/form-data" method="post" action="post.php">
      <div class="center">
        <div class="form-input">
          <div class="preview">
            <img id="file-ip-1-preview" src="img/add.PNG">
          </div>
          <label for="file-ip-1" class="upload-image-label-button">Upload Image</label>
          <input type="file" id="file-ip-1" name="file-ip-1" 
		onchange="showPreview(event);">
        </div>
      </div>
      
      <label for="location" class="input-label">Location</label>
      <input type="text" id="location" name="location" placeholder="Add location">
      
      <label for="caption" class="input-label">Caption</label>
      <textarea id="caption" name="caption" rows="3" placeholder="Write a caption..." class="input-textarea"></textarea>
      <input type="submit" value="Share"/>
    </form>
  </div>
</div>


    </div>

    <script>
	  function logout() {
  // Use AJAX to call a PHP script to destroy the session
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", true);
  xhr.send();
  
  // Redirect to the login page or any other page as needed
  window.location = "login.php";
}

      // Populate image preview
      function showPreview(event){
        if(event.target.files.length > 0){
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
      newPostButton.onclick = function() {
        newPostModal.style.display = "block";
      }
      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        newPostModal.style.display = "none";
      }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == newPostModal) {
          newPostModal.style.display = "none";
        }
      }

  // Get the dropdown element and menu
  const dropdown = document.querySelector('.dropdown');
  const dropdownMenu = dropdown.querySelector('.dropdown-menu');
  const userProfileIcon = document.querySelector('.icon.user-profile');

  // Add a click event listener to the user profile icon
  userProfileIcon.addEventListener('click', (event) => {
    // Toggle the 'show' class on the dropdown menu
    dropdownMenu.classList.toggle('show');
  });

  // Close the dropdown menu when the user clicks outside of it
  window.addEventListener('click', (event) => {
    if (!event.target.matches('.icon.user-profile') && !event.target.matches('.dropdown-menu a')) {
      dropdownMenu.classList.remove('show');
    }
  });
      </script>
      <!--End New Post Modal code-->
  </body>
</html>
