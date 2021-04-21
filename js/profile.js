const alumniProfiles = [
  {
    name: "Humaira",
    currentPos: "Software Officer",
    email: "humairasoo@yahoo.com",
    phone: "018-2469011",
    enrollYear: "Batch of 2019",
    department: "Software Engineering",
    level: "Degree",
    address: "Selangor, Malaysia",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Hey, I am a Software Officer at Google",
  },
  {
    name: "Fahad",
    currentPos: "UX Designer at Google",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2019",
    department: "Software Engineering",
    level: "Degree",
    address: "Qatar",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Hey, I am a UX Designer at Google",
  },
  {
    name: "Hafiz",
    currentPos: "Senior Branch Manager",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2019",
    department: "Software Engineering",
    level: "Degree",
    address: "Malaysia",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Hey, I am a Senior Branch Manager Twitter",
  },
  {
    name: "Irfan",
    currentPos: "Lead Android Developer",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2019",
    department: "Software Engineering",
    level: "Degree",
    address: "Malaysia",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Hey, I am a Lead Android Developer at Google",
  },
  {
    name: "Danial",
    currentPos: "Machine Learning Master",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2019",
    department: "Artificial Intelligence",
    level: "Degree",
    address: "Malaysia",
    image: "https://bootdey.com/img/Content/avatar/avatar1.png",
    bio: "Hey, I am the Machine Learning Master",
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
                          <button onclick="showProfile('${alumni.name}')" class="btn shadow alumni-card-view-profile-button">View Alumni Profile</button>
                        </div>
                      </div>
                    </div>
              </li>
                `;
    })
    .join("");
  alumniList.innerHTML = htmlString;
};

function showProfile(name) {
  let alumni = alumniProfiles.find((obj) => obj.name == name);
  $("#alumni-modal").modal("show");
  document.querySelector("#modal-profile-img").src = alumni.image;
  document.querySelector("#modal-profile-name").innerText = alumni.name;
  document.querySelector("#modal-profile-dept").innerText = alumni.department;
  document.querySelector("#modal-profile-batch").innerText = alumni.enrollYear;
  document.querySelector("#modal-profile-level").innerText = alumni.level;
  document.querySelector("#modal-profile-position").innerText = alumni.currentPos;
  document.querySelector("#modal-profile-mail").innerText = alumni.email;
  document.querySelector("#modal-profile-address").innerText = alumni.address;
}

displayAlumni(alumniProfiles);





