window.onload = topthingy;

let logoutbutton = document.querySelector("#logoutbutton");
let navprofbar = document.querySelector(".nav-prof-bar");
let navbuttonbar = document.querySelectorAll(".nav-button-bar");
let password = document.querySelector("#password");
let confirmpw = document.querySelector("#confirmpw");
let errortextreg = document.querySelector("#error-text-reg");
let myDropdown = document.querySelector("#myDropdown");
let dropdowns = document.querySelector(".dropdown-content");
var coll = document.getElementsByClassName("collapsible");
let loggedin = false;


// Everytime any page is load, It will check whether the user if logged in or not and display personalized navbar
function topthingy() {
  let loggedinval = sessionStorage.getItem("loggedin") === "true";
  if(loggedinval) {
    navbuttonbar.forEach(element => {
        element.style.display = "none";
    });
    navprofbar.style.display = "inline-block";
  }else {
    navprofbar.style.display = "none";
    navbuttonbar.forEach(element => {
      element.style.display = "inline-block";
  });
  }
};
// 

// when submitting the login form page , loggedin will be true then sent user to profile.html
$('#submitloggin').submit(function (e) {
  e.preventDefault();
  loggedin = true;
  sessionStorage.setItem("loggedin", loggedin);
  window.location.href = "profile.html";
});
// 

// when clicking the logout button it will set loggedin to false and sent user to homepage
logoutbutton.onclick = function() {
  loggedin = false;
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
let checkpw = function () {
  if (password.value == "" && confirmpw.value == "") {
    confirmpw.classList.remove("input-error");
    errortextreg.classList.remove("error-reg-text");
  }
  if (confirmpw.value != "") {
    if (password.value != confirmpw.value) {
      errortextreg.classList.add("error-reg-text");
      confirmpw.classList.add("input-error");
      errortextreg.innerHTML = 'Confimed Password Does Not Match';
      return false;
    } else {
      confirmpw.classList.remove("input-error");
      errortextreg.classList.remove("error-reg-text");
    }
  } else {
    confirmpw.classList.remove("input-error");
    errortextreg.classList.remove("error-reg-text");
    return true;
  }
  if (password.value == confirmpw.value) {
    return true;
  }
}
// 

// Making sure the contact-us form shows modal after submit
$('#contact-form').submit(function (e) {
  $('#confirmation-modal').modal('show');
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

//Salary Slider
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}