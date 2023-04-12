<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="feed.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <img src="img/navLogo.PNG" class="brand-img" alt="" />
        <input type="text" class="search-box" placeholder="search" />
        <div class="nav-items">
          <img src="img/home.PNG" class="icon" alt="" />
          <img src="img/messenger.PNG" class="icon" alt="" />
          <img src="img/add.PNG" class="icon" alt="" />
          <img src="img/explore.PNG" class="icon" alt="" />
          <img src="img/like.PNG" class="icon" alt="" />
          <div class="icon user-profile"></div>
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

          <div class="post">
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
            <img src="img/seeds/running.png" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <img src="img/like.PNG" class="icon" alt="" />
                <img src="img/comment.PNG" class="icon" alt="" />
                <img src="img/send.PNG" class="icon" alt="" />
                <img src="img/save.PNG" class="icon save" alt="" />
              </div>
              <p class="likes">1,012 likes</p>
              <p class="description">
                <span>realdanfooks</span>2.5 miles in the books! Off to the
                pool.
              </p>
              <p class="post-time">2 minutes ago</p>
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
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic">
                  <img src="img/seeds/dan.png" alt="" />
                </div>
                <div>
                  <p class="username">realdanfooks</p>
                  <p class="location">Rowan University</p>
                </div>
              </div>
              <img src="img/option.PNG" class="options" alt="" />
            </div>
            <img src="img/seeds/b&n.png" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <img src="img/like.PNG" class="icon" alt="" />
                <img src="img/comment.PNG" class="icon" alt="" />
                <img src="img/send.PNG" class="icon" alt="" />
                <img src="img/save.PNG" class="icon save" alt="" />
              </div>
              <p class="likes">765 likes</p>
              <p class="description">
                <span>realdanfooks</span>A beautiful sunset from my apartment in
                the 'Boro.
              </p>
              <p class="post-time">8 minutes ago</p>
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
            <button class="action-btn">Switch</button>
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
      </div>
    </section>
  </body>
</html>