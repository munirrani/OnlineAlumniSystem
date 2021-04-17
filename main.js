$(function () {
  $(document).scroll(function () {
    var $nav = $("#botNavbar");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});

let checkPassEmpty = function () {
  if (document.getElementById("password").value == "") {
    document.getElementById("error-text-reg").style.display = "none";
    return true;
  }
};
// firstname
// lastname

let check = function () {
  if (document.getElementById("confirmpw").value != "") {
    if (
      document.getElementById("password").value !=
      document.getElementById("confirmpw").value
    ) {
      document.getElementById("error-text-reg").classList.add("error-reg-text");
      document.getElementById("confirmpw").classList.add("input-error");
      document.getElementById("error-text-reg").innerHTML =
        "Confimed Password Does Not Match";
      return false;
    } else {
      document.getElementById("confirmpw").classList.remove("input-error");
      document
        .getElementById("error-text-reg")
        .classList.remove("error-reg-text");
      return true;
    }
  } else {
    document.getElementById("confirmpw").classList.remove("input-error");
    document
      .getElementById("error-text-reg")
      .classList.remove("error-reg-text");
  }
};



function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

var coll = document.getElementsByClassName("collapsible");
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
