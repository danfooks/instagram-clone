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

        $sql  = "Select Profile_Pic_Location from User WHERE User_Id = :userid";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userid',$userid);
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
    <link rel="stylesheet" href="css/feed.css" />
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
          <img src="<?php echo $result['Profile_Pic_Location']; ?>" class="icon user-profile"  alt=""></img>

          <div class="dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="./user/user.php?userid=<?php echo $userid; ?>">Profile</a>
              <a class="dropdown-item" onclick="logout()">Log Out</a>
            </div>
          </div>

        </div>
      </div>
    </nav>

    <section class="main">
      <div class="wrapper">
        <div class="left-column">
          <div class="status-wrapper">
            <!-- TODO: we need to map users here -->
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/dan.png" alt="" />
              </div>
              <p class="username">realdanfooks</p>
            </div>
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/cover 1.png" alt="" />
              </div>
              <p class="username">heitmann24</p>
            </div>
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/cover 2.png" alt="" />
              </div>
              <p class="username">slimjim</p>
            </div>
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/kilroy.png" alt="" />
              </div>
              <p class="username">kilroy</p>
            </div>
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/cover 4.png" alt="" />
              </div>
              <p class="username">jackjohnson</p>
            </div>
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/cover 5.png" alt="" />
              </div>
              <p class="username">dojacat</p>
            </div>
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/cover 6.png" alt="" />
              </div>
              <p class="username">philadelphiaeagles</p>
            </div>
            <div class="status-card">
              <div class="profile-pic">
                <img src="img/seeds/cover 7.png" alt="" />
              </div>
              <p class="username">jameshalpert</p>
            </div>
          </div>



<?php
//BEGIN POST

//STUFF LEFT TO HOOKUP:
//COMMENTS
//POST DATE
	$sql  = "Select DISTINCT u.Profile_Pic_Location, p.Post_Location, p.Post_Id, u.Username, p.FileLocation, p.Post_Date, u.User_Id, p.Caption, ";
        $sql .= "(SELECT count(Like_Id) FROM Likes WHERE Post_Id = p.Post_Id) as 'numLikes' ";
        $sql .= "From Post p ";
        $sql .= "Join Follow f on (p.User_Id = f.Following_Id) ";
        $sql .= "Join User u on (f.Following_Id = u.User_Id) ";
        $sql .= "WHERE f.Follower_Id = :userid or p.User_Id = :userid ";
        $sql .= "Order by Post_Date desc";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userid',$userid);
        $stmt->execute();

foreach($stmt->fetchAll() as $userPost){

?>
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic">
                  <img src="<?php echo $userPost['Profile_Pic_Location']; ?>" alt="" />
                </div>
                <div>
                 <p class="username"><?php echo $userPost['Username']; ?> </p>
                  <p class="location"><?php echo $userPost['Post_Location']; ?></p>
                </div>
              </div><a href="viewPost.php?Post_Id=<?php echo $userPost['Post_Id']; ?>">
              <img src="img/option.PNG" class="options" alt="" />
            </div>
		<a href="viewPost.php?Post_Id=<?php echo $userPost['Post_Id']; ?>">
            		<img src="<?php echo $userPost['FileLocation']; ?>" class="post-image" alt="" />
		</a>
            <div class="post-content">
              <div class="reaction-wrapper">
                <img src="img/like.PNG" class="icon" alt="" />
                <img src="img/comment.PNG" class="icon" alt="" />
                <img src="img/send.PNG" class="icon" alt="" />
                <img src="img/save.PNG" class="icon save" alt="" />
              </div>
              <p class="likes"><?php echo $userPost['numLikes']; ?> Likes</p>
              <p class="description">
                <span><?php echo $userPost['Username']; ?></span>
                <?php echo $userPost['Caption']; ?>
              </p>
              <p class="post-time"><?php echo $userPost['Post_Date']; ?></p>
            </div>
            <div class="comment-wrapper">
              <img src="img/comment.PNG" class="icon" alt="" />
              <input
                type="text"
                class="comment-box"
                placeholder="Add a comment"
              />
              <button class="comment-btn">post</button>
            </div>
          </div>
<?php
}
$stmt = null;
//ENDPOST
?>
      </div>
      <div class="right-col">
        <div class="profile-card">
          <div class="profile-pic">
            <img src="img/seeds/dan.png" alt="">
          </div>
          <div>
            <p class="username">realdanfooks</p>
            <p class="sub-text">Current user</p>
          </div>
          <button class="action-btn" onclick="logout()">Switch</button>
        </div>
        <p class="suggestion-text">Suggestions for you</p>
        <div class="profile-card">
          <div class="profile-pic">
            <img src="img/seeds/cover 1.png" alt="">
          </div>
          <div>
            <p class="username">profprovine</p>
            <p class="sub-text">Recommended</p>
          </div>
          <button class="action-btn">Follow</button>
        </div>

        <div class="profile-card">
          <div class="profile-pic">
            <img src="img/seeds/cover 2.png" alt="">
          </div>
          <div>
            <p class="username">eminem</p>
            <p class="sub-text">Recommended</p>
          </div>
          <button class="action-btn">Follow</button>
        </div>

        <div class="profile-card">
          <div class="profile-pic">
            <img src="img/seeds/cover 3.png" alt="">
          </div>
          <div>
            <p class="username">brucelee</p>
            <p class="sub-text">Recommended</p>
          </div>
          <button class="action-btn">Follow</button>
        </div>

        <div class="profile-card">
          <div class="profile-pic">
            <img src="img/seeds/cover 4.png" alt="">
          </div>
          <div>
            <p class="username">pedropascal</p>
            <p class="sub-text">Recommended</p>
          </div>
          <button class="action-btn">Follow</button>
        </div>

        <div class="profile-card">
          <div class="profile-pic">
            <img src="img/seeds/cover 6.png" alt="">
          </div>
          <div>
            <p class="username">starwars</p>
            <p class="sub-text">Recommended</p>
          </div>
          <button class="action-btn">Follow</button>
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
