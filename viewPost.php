<?php
	session_start();

       if ( ! isset($_SESSION['userid']) || $_SESSION['verified'] != 1 ) {
       		header("Location:./login.php");
           	exit();
       }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="feed.css" />
    <link rel="stylesheet" href="post.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/navLogo.PNG" class="brand-img" alt="" />
        <input type="text" class="search-box" placeholder="search" />
        <div class="nav-items">

          <img src="img/home.PNG" class="icon" alt=""/>
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

    <section class="main">
      <div class="wrapper">

          <div class="post">
            <div class="post-feed">
              <img src="img/seeds/running.png" class="post-image" alt="" />

            </div>

            <div class="feed">
              <div class="post-content">
              
                <div class="info">
                  <div class="user">
                    <div class="profile-pic">
                      <img src="img/seeds/dan.png" alt="" />
                    </div>
                    <div>
                      <p class="username">realdanfooks</p>
                      <p class="location">Venice Golf & Country Club</p>
                    </div>
                  </div>
                  <img src="img/option.PNG" class="options" alt="" />
                </div>
  
  
                <div class="reaction-wrapper">
                  <img src="img/like.PNG" class="icon" alt="" />
                  <img src="img/comment.PNG" class="icon" alt="" />
                  <img src="img/send.PNG" class="icon" alt="" />
                  <img src="img/save.PNG" class="icon" alt="" />
                </div>
                <p class="likes">1,012 likes</p>
                <p class="description">
                  <span>realdanfooks</span>2.5 miles in the books! Off to the
                  pool.
                </p>
                <p class="post-time">2 minutes ago</p>
                <div class="comment-wrapper">
                  <img src="img/comment.PNG" class="icon" alt="" />
                  <input
                    type="text"
                    class="comment-box"
                    placeholder="Add a comment"
                  />
                  <button class="comment-btn">post</button>
                </div>
                <div class="comments">
                  <div class="info">
                    <div class="user">
                      <div class="profile-pic">
                        <img src="img/seeds/dan.png" alt="" />
                      </div>
                      <div>
                        <p class="username">realdanfooks</p>
                        <p class="comment">This is a great photo! I frequent to Venice and I am quite fond of the area. Let me know when you'll be there again!</p>
                      </div>
                    </div>

                    <div class="user">
                      <div class="profile-pic">
                        <img src="img/seeds/dan.png" alt="" />
                      </div>
                      <div>
                        <p class="username">slimjim</p>
                        <p class="comment">Only two miles? That is light work.</p>
                      </div>
                    </div>

                    <div class="user">
                      <div class="profile-pic">
                        <img src="img/seeds/dan.png" alt="" />
                      </div>
                      <div>
                        <p class="username">realdanfooks</p>
                        <p class="comment">This is a great photo! I frequent to Venice and I am quite fond of the area. Let me know when you'll be there again!</p>
                      </div>
                    </div>

                    <div class="user">
                      <div class="profile-pic">
                        <img src="img/seeds/dan.png" alt="" />
                      </div>
                      <div>
                        <p class="username">realdanfooks</p>
                        <p class="comment">This is a great photo! I frequent to Venice and I am quite fond of the area. Let me know when you'll be there again!</p>
                      </div>
                    </div>

                    <div class="user">
                      <div class="profile-pic">
                        <img src="img/seeds/dan.png" alt="" />
                      </div>
                      <div>
                        <p class="username">realdanfooks</p>
                        <p class="comment">This is a great photo! I frequent to Venice and I am quite fond of the area. Let me know when you'll be there again!</p>
                      </div>
                    </div>

                    <div class="user">
                      <div class="profile-pic">
                        <img src="img/seeds/dan.png" alt="" />
                      </div>
                      <div>
                        <p class="username">realdanfooks</p>
                        <p class="comment">This is a great photo! I frequent to Venice and I am quite fond of the area. Let me know when you'll be there again!</p>
                      </div>
                    </div>

                    <div class="user">
                      <div class="profile-pic">
                        <img src="img/seeds/dan.png" alt="" />
                      </div>
                      <div>
                        <p class="username">realdanfooks</p>
                        <p class="comment">This is a great photo! I frequent to Venice and I am quite fond of the area. Let me know when you'll be there again!</p>
                      </div>
                    </div>


                    
                  </div>
                
              </div>
            </div>
          </div>
          </div>
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
