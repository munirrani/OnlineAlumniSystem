window.onload = topthingy;
let logoutbutton = document.querySelector("#logoutbutton");
// let navprofbar = document.querySelector(".nav-prof-bar");
// let navbarlogged = document.querySelector(".nav-hide-logged");
// let navbuttonbar = document.querySelectorAll(".nav-button-bar");
// let myDropdown = document.querySelector("#myDropdown");
var coll = document.getElementsByClassName("collapsible");

// Bookmarks
let bmarklogged = document.querySelector(".bmark-hide-logged");
let bmark1logged = document.querySelector(".bmark-hide1-logged");
let bmark2logged = document.querySelector(".bmark-hide2-logged");
let bmark3logged = document.querySelector(".bmark-hide3-logged");
let bmark4logged = document.querySelector(".bmark-hide4-logged");
let bmark5logged = document.querySelector(".bmark-hide5-logged");

// Everytime any page is load, It will check whether the user if logged in or not and display personalized navbar
function topthingy() {
  // let usernameDropdown = sessionStorage.getItem("userName");
  let loggedinval = sessionStorage.getItem("loggedin") === "true";
  if(loggedinval) {
    // navbuttonbar.forEach(element => {
    //     element.style.display = "none";
    // });
    // navprofbar.style.display = "inline-block";
    // navbarlogged.style.display = "block";
    
    if(bmark1logged != null) {
    //bookmarks
    bmarklogged.style.display = "inline-block";
    bmark1logged.style.display = "inline-block";
    bmark2logged.style.display = "inline-block";
    bmark3logged.style.display = "inline-block";
    bmark4logged.style.display = "inline-block";
    bmark5logged.style.display = "inline-block";
    }
    // if (document.querySelector("#profileImg") != null) {
    //   document.querySelector("#profileImg").src = sessionStorage.getItem("image");
    // } 
    // document.querySelector("#profileIcon").src = sessionStorage.getItem("image");
    // document.querySelector("#profileIcon").classList.add("imgcoverobject");
    // document.querySelector("#dropdown-username").innerHTML = `Signed in as <strong>${usernameDropdown}</strong>`;


  }else {
    // navbarlogged.style.display = "none";
    // navprofbar.style.display = "none";
  //   navbuttonbar.forEach(element => {
  //     element.style.display = "inline-block";
  // });
  }
};
// 

  // when clicking the logout button it will set loggedin to false and send user to homepage
  // logoutbutton.onclick = function() {
  //   let loggedin = false;
  //   sessionStorage.setItem("loggedin", loggedin);
  //   window.location.href = "index.php";
  // };
  // 
 



// Transition transparent effect when the page is scrolled for the Navbar
$(function () {
  $(document).scroll(function () {
    var $nav = $("#botNavbar");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});
// 


let dropdowns = document.querySelector(".dropdown-content");
let myDropdown = document.querySelector("#myDropdown");

function myFunction() {
    myDropdown.classList.add("show");
}

window.onclick = function (event) {
    if (!event.target.matches(".dropbtn")) {
      dropdowns.classList.remove("show");
    }
};



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