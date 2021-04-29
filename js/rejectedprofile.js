let alumniProfiles = [
  {
    name: "Nikita Mazepin",
    age: 27,
    Gender: "Male",
    currentPos: "Twitter Senior Dev",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2013",
    graduationYear: "2017",
    department: "Software Engineering",
    level: "Degree",
    address: "Russia",
    address1: "New York",
    address2: "Manhattan City",
    postcode: "123456", 
    city: "Town city",
    state: "New York",
    course: "Computer Science",
    image: "/img/Nikita-Mazepin.jpg",
    bio: "Hey, I am a senior dev at Twitter!",
    acceptance: "Rejected"
  },
  {
    name: "Lance Stroll",
    currentPos: "System Admin @Privet Russia",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2015",
    graduationYear: "2019",
    department: "Information Systems",
    level: "Degree",
    address: "Canada",
    address1: "Street 913 Privet HQ",
    address2: "Moscow",
    postcode: "123456",
    city: "Town city",
    state: "Moscow",
    course: "Computer Science",
    image: "/img/lance-stroll.jfif",
    bio: "Hey, I am a system admin at Privet Russia",
    acceptance: "Rejected"
  },
  {
    name: "Kevin Magnussen",
    currentPos: "Accounts Admin Youtube",
    email: "example@mail.com",
    phone: "0123456789",
    enrollYear: "Batch of 2019",
    graduationYear: "2023",
    department: "Information Systems",
    level: "Degree",
    address: "Denmark",
    address1: "Lot 151, Jalan Tun Razak, Selangor",
    address2: "Taman Negara",
    postcode: "123456",
    city: "Town city",
    state: "Selangor",
    course: "Computer Science",
    image: "/img/kevin-magnussen.jpg",
    bio: "Ma name is Jeff!",
    acceptance: "Rejected"
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
                        <hr>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.email}</p></div>
                          </div>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.phone}</p></div>
                          </div>
                          <div class="row">
                            <div class="col col-card-alumni-val"><p class="lead">${alumni.address}</p></div>
                          </div>
                        <div class="alumni-card-footer mt-1 mx-2 mb-3">

                          <button onclick="showDialogApprove('${alumni.name}')" class="btn shadow btn-admin green"><i class="fa fa-check"></i> Reapprove
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
  let alumni = alumniProfiles.find((obj) => obj.name == name);
  $("#alumni-modal").modal("show");
  document.querySelector("#accept-confirm-text").innerText = "Are you sure you would like to reapprove "+alumni.name+"'s alumni profile?";
}



displayAlumni(alumniProfiles);

