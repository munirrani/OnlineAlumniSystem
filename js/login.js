let submitlog = document.querySelector("#submitloggin");
let userperm = document.querySelector("#userperm").value;
let loggedin = false;


// when submitting the login form page , loggedin will be true then the user will either be sent to admindashboard or their profile depending on the roles
// $('#submitloggin').submit(function (e) {
//     e.preventDefault();
//     userperm = document.querySelector("#userperm").value;

//     if (userperm == "Role") {
//         loggedin = false;
//         sessionStorage.setItem("loggedin", loggedin);
//         $('#login-modal-warning').modal('show');
//     }
//     else if (userperm == "admin") {
//         loggedin = true;
//         sessionStorage.setItem("loggedin", loggedin);
//         window.location.href = "admindash.html";
//     } else {
//         loggedin = true;
//         sessionStorage.setItem("loggedin", loggedin);
//         window.location.href = "profile.html";
//     }
// });
  //
