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