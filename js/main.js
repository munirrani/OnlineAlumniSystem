window.onload = topthingy;

let logoutbutton = document.querySelector("#logoutbutton");
let navprofbar = document.querySelector(".nav-prof-bar");
let navbarlogged = document.querySelector(".nav-hide-logged");
let navbuttonbar = document.querySelectorAll(".nav-button-bar");
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

//Salary Slider
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}


let password = document.querySelector("#password");
let confirmpw = document.querySelector("#confirmpw");
let enrollmentYear = document.querySelector("#enrolYear");
let gradYear = document.querySelector("#gradYear");
let errortextreg = document.querySelector("#error-text-reg");
let registerAccount = document.querySelector("#registerAccount");


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

let checkGradYear = function() {
  if(enrollmentYear.value >= gradYear.value) {
      // errortextreg.classList.add("error-reg-text");
      // gradYear.classList.add("input-error");
      // errortextreg.innerHTML = 'Gradutation Year must be bigger than Enrollment Year';
      return false;
  }else {
    // gradYear.classList.remove("input-error");
    // errortextreg.classList.remove("error-reg-text");
    return true;
  }
};



registerAccount.onsubmit = function(e) {
  e.preventDefault();
  if(checkpw() && checkGradYear()) {


    // sessionStorage.setItem("addAlumniAll", JSON.stringify(addAlumni));

    var existingEntries = JSON.parse(sessionStorage.getItem("addAlumniAll"));
    if(existingEntries == null) existingEntries = [];
    let addAlumni = {
      name: document.querySelector("#firstname").value + " " + document.querySelector("#lastname").value,
      currentPos: document.querySelector("#currentPos").value,
      email: document.querySelector("#email").value,
      phone: document.querySelector("#phonenum").value,
      enrollYear: "Batch of " + document.querySelector("#enrolYear").value,
      graduationYear: document.querySelector("#gradYear").value,
      department: document.querySelector("#department").value,
      level: "Degree",
      address: "Qatar",
      address1: "Zone 25 Street 980 Building 9",
      address2: "Doha-Qatar",
      postcode: "123456", 
      city: "Town city",
      state: "Doha",
      course: "Computer Science",
      image: "https://bootdey.com/img/Content/avatar/avatar1.png",
      bio: "Hey, I am a UX Designer at Google",
    }
    sessionStorage.setItem("addAlumni", JSON.stringify(addAlumni));
    existingEntries.push(addAlumni);
    sessionStorage.setItem("addAlumniAll", JSON.stringify(existingEntries));


    window.location.href = "request.html";
  }else {
    if(!checkpw()){
      alert("Confirm Password doesn't match with Password");
    }else if(!checkGradYear()) {
      alert("Gradutation Year must be bigger than Enrollment Year");
    }
    return false;
  }
};





