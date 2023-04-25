function logout() {
    // Use AJAX to call a PHP script to destroy the session
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", true);
    xhr.send();

    // Redirect to the login page or any other page as needed
    window.location = "login.php";
}

// Populate image preview
function showPreview(event) {
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
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    newPostModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
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