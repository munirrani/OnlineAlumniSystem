function showProfile(name) {
  let alumni = alumniProfiles.find((obj) => obj.name == name);
  $("#alumni-modal").modal("show");
  document.querySelector("#modal-profile-img").src = alumni.image;
  document.querySelector("#modal-profile-name").innerText = alumni.name;
  document.querySelector("#modal-profile-batch").innerText = alumni.enrollYear;
  document.querySelector("#modal-profile-phone").innerText = alumni.phone;
  document.querySelector("#modal-profile-level").innerText = alumni.level;
  document.querySelector("#modal-profile-position").innerText = alumni.currentPos;
  document.querySelector("#modal-profile-mail").innerText = alumni.email;
  document.querySelector("#modal-profile-address").innerText = alumni.address;
  document.querySelector("#modal-profile-address1").innerText = alumni.address1;
  document.querySelector("#modal-profile-address2").innerText = alumni.address2;
  document.querySelector("#modal-profile-postcode").innerText = "Postcode : " + alumni.postcode;
  document.querySelector("#modal-profile-city").innerText = "City : " + alumni.city;
  document.querySelector("#modal-profile-state").innerText = "State : " + alumni.state;
  document.querySelector("#modal-profile-course").innerText = alumni.course;
  document.querySelector("#modal-profile-dept").innerText = alumni.department;
  document.querySelector("#modal-profile-major").innerText = alumni.department;
  document.querySelector("#modal-profile-batch").innerText = alumni.enrollYear;
  document.querySelector("#modal-profile-gradYear").innerText = "Graduation Year : " + alumni.graduationYear;
  document.querySelector("#social-prof-icon").innerHTML = `<a href="${alumni.linkedin}"><i class="fab fa-linkedin fa-2x linkedin-icon"></i></a>
  <a href="${alumni.github}"><i class="fab fa-github fa-2x github-icon"></i></a> `;
}
