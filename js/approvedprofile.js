let alumniProfiles = [{
        name: "Fahad",
        age: 21,
        Gender: "Male",
        status: "alumni",
        currentPos: "UX Designer at Google",
        email: "example@mail.com",
        phone: "012-3456789",
        enrollYear: "Batch of 2019",
        graduationYear: "2023",
        department: "Software Engineering",
        level: "Degree",
        address: "Qatar",
        address1: "Zone 25 Street 980 Building 9",
        address2: "Doha-Qatar",
        postcode: "123456",
        city: "Town city",
        state: "Doha",
        course: "Computer Science",
        image: "../img/fahadpic.jpg",
        bio: "Hey, I am a UX Designer at Google",
        linkedin: "#",
        github: "https://github.com/fahadthakur",
    },
    {
        name: "Hafiz",
        age: 21,
        Gender: "Male",
        status: "alumni",
        currentPos: "Senior Branch Manager",
        email: "example@mail.com",
        phone: "012-3456789",
        enrollYear: "Batch of 2019",
        graduationYear: "2023",
        department: "Software Engineering",
        level: "Degree",
        address: "Malaysia",
        address1: "Lot 151, Jalan Tun Razak, Selangor",
        address2: "Taman Negara",
        postcode: "123456",
        city: "Town city",
        state: "Selangor",
        course: "Computer Science",
        image: "../img/hafizpic.jpg",
        bio: "Hey, I am a Senior Branch Manager Twitter",
        linkedin: "#",
        github: "#",
    },
    {
        name: "Irfan",
        age: 21,
        Gender: "Male",
        status: "alumni",
        currentPos: "Lead Android Developer",
        email: "example@mail.com",
        phone: "012-3456789",
        enrollYear: "Batch of 2019",
        graduationYear: "2023",
        department: "Software Engineering",
        level: "Degree",
        address: "Malaysia",
        address1: "Lot 151, Jalan Tun Razak, Selangor",
        address2: "Taman Negara",
        postcode: "123456",
        city: "Town city",
        state: "Selangor",
        course: "Computer Science",
        image: "../img/irfanpic.jpg",
        bio: "Hey, I am a Lead Android Developer at Google",
        linkedin: "#",
        github: "#",
    },
    {
        name: "Danial",
        age: 21,
        Gender: "Male",
        status: "alumni",
        currentPos: "Machine Learning Master",
        email: "example@mail.com",
        phone: "012-3456789",
        enrollYear: "Batch of 2019",
        graduationYear: "2023",
        department: "Artificial Intelligence",
        level: "Degree",
        address: "Malaysia",
        address1: "Lot 151, Jalan Tun Razak, Selangor",
        address2: "Taman Negara",
        postcode: "123456",
        city: "Town city",
        state: "Selangor",
        course: "Computer Science",
        image: "../img/danialpic.jpg",
        bio: "Hey, I am the Machine Learning Master",
        linkedin: "#",
        github: "#",
    },
    {
        name: "Munir",
        age: 21,
        Gender: "Male",
        currentPos: "Head of Software Development",
        email: "example@mail.com",
        phone: "012-3456789",
        enrollYear: "Batch of 2019",
        graduationYear: "2023",
        department: "Software Engineering",
        level: "Degree",
        address: "Malaysia",
        address1: "Lot 151, Jalan Jalan, Selangor",
        address2: "Taman Jaya",
        postcode: "172310",
        city: "Damansara",
        state: "Selangor",
        course: "Computer Science",
        image: "../img/munirpic.jpg",
        bio: "Hey, I am Photographer and an avid Coder",
        linkedin: "#",
        github: "https://github.com/munirrani",
    },
    {
        name: "Haney",
        age: 21,
        Gender: "Female",
        currentPos: "-",
        email: "huha@gmail.com",
        phone: "012-3456789",
        enrollYear: "Batch of 2019",
        graduationYear: "2023",
        department: "Software Engineering",
        level: "Degree",
        address: "Malaysia",
        address1: "No 4, Jalan Au4D/3A",
        address2: "Wangsa Maju",
        postcode: "40400",
        city: "Gombak",
        state: "Selangor",
        course: "Computer Science",
        image: "../img/haney.jpeg",
        bio: "Hey, My name is Haney and I like to sing and dance!",
        linkedin: "#",
        github: "https://github.com/haneyiskdr",
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
                          <button onclick="showProfile('${alumni.name}')" class="btn shadow btn-admin  alumni-card-view-profile-button">Edit Alumni Profile</button>
                          <button onclick="showDialogDelete('${alumni.name}')" class="btn shadow btn-admin red"><i class="fa fa-close"></i> Delete Profile
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

function showProfile(name) {
    let alumni = alumniProfiles.find((obj) => obj.name == name);
    $("#alumni-modal").modal("show");
    document.querySelector("#modal-profile-img").src = alumni.image;
    document.querySelector("#modal-profile-name").innerText = alumni.name;
    document.querySelector("#modal-profile-batch").value = alumni.enrollYear;
    document.querySelector("#modal-profile-phone").value = alumni.phone;
    document.querySelector("#modal-profile-level").value = alumni.level;
    document.querySelector("#modal-profile-position").value = alumni.currentPos;
    document.querySelector("#modal-profile-mail").value = alumni.email;
    document.querySelector("#modal-profile-address").value = alumni.address;
    document.querySelector("#modal-profile-address1").value = alumni.address1;
    document.querySelector("#modal-profile-address2").value = alumni.address2;
    document.querySelector("#modal-profile-postcode").value = "Postcode : " + alumni.postcode;
    document.querySelector("#modal-profile-city").value = "City : " + alumni.city;
    document.querySelector("#modal-profile-state").value = "State : " + alumni.state;
    document.querySelector("#modal-profile-course").value = alumni.course;
    document.querySelector("#modal-profile-dept").innerText = alumni.department;
    document.querySelector("#modal-profile-major").value = alumni.department;
    document.querySelector("#modal-profile-batch").value = alumni.enrollYear;
    document.querySelector("#modal-profile-gradYear").value = "Graduation Year : " + alumni.graduationYear;
    document.querySelector("#social-prof-icon").innerHTML = `<a href="${alumni.linkedin}"><i class="fab fa-linkedin fa-2x linkedin-icon"></i></a>
  <a href="${alumni.github}"><i class="fab fa-github fa-2x github-icon"></i></a> `;
}

function showDialogDelete(name) {
    let alumni = alumniProfiles.find((obj) => obj.name == name);
    $(".admin-delete").modal("show");
    document.querySelector("#delete-confirm-text").innerText = "Are you sure you want to delete " + alumni.name + "'s profile?";
}

function showConfirmModal() {
    $(".admin-update-confirm").modal("show");
}

displayAlumni(alumniProfiles);