window.onload = topthingy;

let logoutbutton = document.querySelector("#logoutbutton");
let navprofbar = document.querySelector(".nav-prof-bar");
let navbarlogged = document.querySelector(".nav-hide-logged");
let navbuttonbar = document.querySelectorAll(".nav-button-bar");
let myDropdown = document.querySelector("#myDropdown");
let dropdowns = document.querySelector(".dropdown-content");
var coll = document.getElementsByClassName("collapsible");


// Everytime any page is load, It will check whether the user if logged in or not and display personalized navbar
function topthingy() {
  let loggedinval = sessionStorage.getItem("loggedin") === "true";
  if(loggedinval) {
    navbuttonbar.forEach(element => {
        element.style.display = "none";
    });
    navprofbar.style.display = "inline-block";
    navbarlogged.style.display = "block";
  }else {
    navbarlogged.style.display = "none";
    navprofbar.style.display = "none";
    navbuttonbar.forEach(element => {
      element.style.display = "inline-block";
  });
  }
};
// 

  // when clicking the logout button it will set loggedin to false and sent user to homepage
  logoutbutton.onclick = function() {
    let loggedin = false;
    sessionStorage.setItem("loggedin", loggedin);
    window.location.href = "index.html";
  };
  // 



// Transition transparent effect when the page is scrolled for the Navbar
$(function () {
  $(document).scroll(function () {
    var $nav = $("#botNavbar");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});
// 

// This function checks the confirm password to the password entered in the register page

// 

// Making sure the contact-us form shows modal after submit
$('#contact-form').submit(function (e) {
  $('#confirmation-modal').modal('show');
  document.querySelector("#contact-form").reset();
  e.preventDefault();
});
// 


// The navbar profile dropdown
function myFunction() {
  myDropdown.classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches(".dropbtn")) {
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};
// 

// Collapsible part of the Profile Page
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
// 












