let password = document.querySelector("#password");
let confirmpw = document.querySelector("#confirmpw");
let enrollmentYear = document.querySelector("#enrolYear");
let gradYear = document.querySelector("#gradYear");
let errortextreg = document.querySelector("#error-text-reg");
// let registerAccount = document.querySelector("#registerAccount");

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
      return false;
  }else {
    // gradYear.classList.remove("input-error");
    // errortextreg.classList.remove("error-reg-text");
    return true;
  }
};

let regCheck = function() {
  if(checkpw() && checkGradYear()) {
    return true;
  }else {
        if(!checkpw()){
          alert("Confirm Password doesn't match with Password");
        }else if(!checkGradYear()) {
          alert("Gradutation Year must be bigger than Enrollment Year");
        }
        return false;
      }
}


