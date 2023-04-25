<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/feed.css" />
    <link rel="stylesheet" href="css/post.css" />
    <link rel="stylesheet" href="css/user.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/navLogo.PNG" class="brand-img" alt="" />
        <input type="text" class="search-box" placeholder="search" />
        <div class="nav-items">
          <img src="img/home.PNG" class="icon" alt="" />
          <img src="img/messenger.PNG" class="icon" alt="" />
          <img src="img/add.PNG" class="icon" id="newPost" alt="" />

          <img src="img/explore.PNG" class="icon" alt="" />
          <img src="img/like.PNG" class="icon" alt="" />
          <div class="icon user-profile"></div>

          <div class="dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="./account.php">Account</a>
              <a class="dropdown-item" onclick="logout()">Log Out</a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="user-info">
      <img src="img/seeds/dan.png" class="user-dp" alt="" />
      <div class="info-container">
        <h1 class="name">Dan Fooks</h1>
        <p class="username">@realdanfooks</p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus
          quisquam at id, inventore atque magnam itaque qui, veniam ab vel
          fugiat repudiandae suscipit, quae accusamus molestiae blanditiis non
          earum. Eligendi!
        </p>
      </div>
    </div>

    <div class="button-container">
      <button>Follow</button>
      <button id="editProfile">Edit Profile</button>
      <button>Logout</button>
    </div>

    <div class="following-followers">
      <ul>
        <li>
          <a href="#">Posts</a>
          <span>3</span>
        </li>
        <li>
          <a href="#">Following</a>
          <span>767</span>
        </li>
        <li>
          <a href="#">Followers</a>
          <span>2054</span>
        </li>
      </ul>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-4"><img src="img/seeds/cover 1.png" /></div>
        <div class="col-4"><img src="img/seeds/cover 2.png" /></div>
        <div class="col-4"><img src="img/seeds/cover 3.png" /></div>
      </div>
      <div class="row">
        <div class="col-4"><img src="img/seeds/cover 4.png" /></div>
        <div class="col-4"><img src="img/seeds/cover 5.png" /></div>
        <div class="col-4"><img src="img/seeds/cover 6.png" /></div>
      </div>
      <div class="row">
        <div class="col-4"><img src="img/seeds/cover 7.png" /></div>
        <div class="col-4"><img src="img/seeds/cover 8.png" /></div>
        <div class="col-4"><img src="img/seeds/cover 9.png" /></div>
      </div>
    </div>

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
        <form enctype="multipart/form-data" method="post" action="post.php">
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
          <input type="text" id="name" name="name" placeholder="Edit name" />

          <label for="bio" class="input-label">Profile Bio</label>
          <textarea
            id="bio"
            name="bio"
            rows="3"
            placeholder="Write a bio..."
            class="input-textarea"
          ></textarea>

          <label for="newPassword" class="input-label">New Password</label>
          <input type="password" id="newPassword" name="newPassword" placeholder="New password" />

          <label for="confirmPassword" class="input-label">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" />

          <input type="submit" value="Update Profile" />
        </form>
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
