const alumniProfiles = [{"name":"Fahad Thakur", "currentPos":"UX Designer at Google", "email":"example@mail.com", "phone":"0123456789", 
                        "enrollYear": "2020", "department": "Software Engineering", "level": "Degree", "address": "Qatar", 
                        "image": "https://bootdey.com/img/Content/avatar/avatar1.png", "bio": "Hey, I am a UX Designer at Google"},
                        {"name":"Hafiz", "currentPos":"Senior Branch Manager", "email":"example@mail.com", "phone":"0123456789", 
                        "enrollYear": "2020", "department": "Software Engineering", "level": "Degree", "address": "Malaysia", 
                        "image": "https://bootdey.com/img/Content/avatar/avatar1.png", "bio": "Hey, I am a Senior Branch Manager Twitter"},
                        {"name":"Irfan", "currentPos":"Lead Android Developer", "email":"example@mail.com", "phone":"0123456789", 
                        "enrollYear": "2019", "department": "Software Engineering", "level": "Degree", "address": "Malaysia", 
                        "image": "https://bootdey.com/img/Content/avatar/avatar1.png", "bio": "Hey, I am a Lead Android Developer at Google"},
                        {"name":"Danial", "currentPos":"Machine Learning Master", "email":"example@mail.com", "phone":"0123456789", 
                        "enrollYear": "2020", "department": "Artificial Intelligence", "level": "Degree", "address": "Malaysia", 
                        "image": "https://bootdey.com/img/Content/avatar/avatar1.png", "bio": "Hey, I am the Machine Learning Master"},
                        {"name":"Danial", "currentPos":"Machine Learning Master", "email":"example@mail.com", "phone":"0123456789", 
                        "enrollYear": "2020", "department": "Artificial Intelligence", "level": "Degree", "address": "Malaysia", 
                        "image": "https://bootdey.com/img/Content/avatar/avatar1.png", "bio": "Hey, I am the Machine Learning Master"},
                        {"name":"Danial", "currentPos":"Machine Learning Master", "email":"example@mail.com", "phone":"0123456789", 
                        "enrollYear": "2020", "department": "Artificial Intelligence", "level": "Degree", "address": "Malaysia", 
                        "image": "https://bootdey.com/img/Content/avatar/avatar1.png", "bio": "Hey, I am the Machine Learning Master"}
]

const alumniList = document.querySelector("#alumniList");

const displayAlumni = (alumni) => {
    const htmlString = alumni
            .map((alumni) => {
                return `
                <li>
                <div class="contact-box center-version">
                <div class="body-alumni-card">
                  <img alt="image" class="img-circle" src="${alumni.image}">
                  <h3 class="m-b-xs"><strong>${alumni.name}</strong></h3>
                  <h5 class="card-department-alumni">${alumni.department}</h4>
                  <div class="row mt-3">
                      <div class="row">
                        <div class="col-md-auto col-card-alumni-key"><p>Level of Education</p> </div>
                        <div class="col col-card-alumni-val"><p>${alumni.level}</p></div>
                      </div>
                      <div class="row">
                        <div class="col col-card-alumni-key"><p>Enrol Year</p></div>
                        <div class="col col-card-alumni-val"><p>${alumni.enrollYear}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-auto col-card-alumni-key"><p>Current Position</p></div>
                        <div class="col col-card-alumni-val"><p>${alumni.currentPos}</p></div>
                      </div>
                      <div class="row">
                        <div class="col col-card-alumni-key"><p>Email</p></div>
                        <div class="col col-card-alumni-val"><p>${alumni.email}</p></div>
                      </div>
                      <div class="row">
                        <div class="col col-card-alumni-key"><p>Address</p></div>
                        <div class="col col-card-alumni-val"><p>${alumni.address}</p></div>
                      </div>
                    </div>
                  <div class="alumni-card-footer mt-1">
                    <button class="btn alumni-card-view-profile-button">View Alumni Profile</button>
                    <div class="m-t-xs btn-group">
                      <a class="btn btn-xs btn-white" href=""><i class="fa fa-phone"></i> ${alumni.phone} </a>
                      <a class="btn btn-xs btn-white" href=""><i class="fa fa-envelope"></i>Email</a>
                    </div>
                  </div>
                </div>
              </div>
              </li>
                `;
            })
            .join('');
        alumniList.innerHTML = htmlString;
}

displayAlumni(alumniProfiles);