let alumniProfiles = [
  {
    name: "Evans",
    age: 27,
    Gender: "Male",
    currentPos: "Twitter Senior Dev",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2013",
    graduationYear: "2017",
    department: "Software Engineering",
    level: "Degree",
    address: "United States",
    address1: "New York",
    address2: "Manhattan City",
    postcode: "123456", 
    city: "Town city",
    state: "New York",
    course: "Computer Science",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Hey, I am a senior dev at Twitter!",
    acceptance: "Pending"
  },
  {
    name: "Putin",
    currentPos: "System Admin @Privet Russia",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2015",
    graduationYear: "2019",
    department: "Information Systems",
    level: "Degree",
    address: "Russia",
    address1: "Street 913 Privet HQ",
    address2: "Moscow",
    postcode: "123456",
    city: "Town city",
    state: "Moscow",
    course: "Computer Science",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Hey, I am a system admin at Privet Russia",
    acceptance: "Pending"
  },
  {
    name: "Jeff",
    currentPos: "Accounts Admin Youtube",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2019",
    graduationYear: "2023",
    department: "Information Systems",
    level: "Degree",
    address: "Malaysia",
    address1: "Lot 151, Jalan Tun Razak, Selangor",
    address2: "Taman Negara",
    postcode: "123456",
    city: "Town city",
    state: "Selangor",
    course: "Computer Science",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Ma name is Jeff!",
    acceptance: "Pending"
  },
];



const alumniList = document.querySelector("#alumniList");

const searchBar = document.querySelector("#alumni-search-bar");

searchBar.addEventListener("keyup", (e) => {
  const searchString = e.target.value.toLowerCase();
  const filterSearchedProfile = alumniProfiles.filter((character) => {
    return (
      character.name.toLowerCase().includes(searchString) ||
      character.currentPos.toLowerCase().includes(searchString) ||
      character.department.toLowerCase().includes(searchString) ||
      character.address.toLowerCase().includes(searchString)
    );
  });
  displayAlumni(filterSearchedProfile);
});

const displayAlumni = (alumni) => {
  const htmlString = alumni
    .map((alumni) => {
      return `
                <li>

                  <div class="contact-box center-version shadow-lg">
                      <div class="body-alumni-card">
                        <img alt="image" class="img-circle" src="${alumni.image}">
                        <h1 class="m-b-xs profile-card-name">${alumni.name}</h1>
                        <h4 class="card-department-alumni pb-1">${alumni.department}</h4>
                        <hr>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.enrollYear}</p></div>
                          </div>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.level}</p></div>
                          </div>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.currentPos}</p></div>
                          </div>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.email}</p></div>
                          </div>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.address}</p></div>
                          </div>
                        <div class="alumni-card-footer mt-1 mx-2 mb-3">

                          <button onclick="showDialogApprove('${alumni.name}')" class="btn shadow btn-admin green"><i class="fa fa-check"></i> Approve
                          </button>
                          <button onclick="showDialogReject('${alumni.name}')" class="btn shadow btn-admin red"><i class="fa fa-close"></i> Reject
                          </button>
                        </div>
                      </div>
                    </div>
              </li>
                `;
    })
    .join("");
  alumniList.innerHTML = htmlString;
};

function showDialogApprove(name) {
  document.querySelector("#accept-modal").style.display = "block";
  let alumni = alumniProfiles.find((obj) => obj.name == name);
  $("#alumni-modal").modal("show");
  document.querySelector("#accept-confirm-text").innerText = "Are you sure you would like to approve the alumni profile of "+alumni.name;
}

function showDialogReject(name) {
  document.querySelector("#reject-modal").style.display = "block";
  let alumni = alumniProfiles.find((obj) => obj.name == name);
  $("#alumni-modal").modal("show");
  document.querySelector("#reject-confirm-text").innerText = "Are you sure you would like to reject the alumni profile of "+alumni.name;
}

function resetDialogs(){
  document.querySelector("#reject-modal").style.display = "none";
  document.querySelector("#accept-modal").style.display = "none";
}


displayAlumni(alumniProfiles);

