var defaultprofile = {
    fullName: "Humaira' Ahmad Shuhemi",
    currentPosition: "Add Current Position",
    email:"huha@gmail.com",
    phone: "012-3456789",
    enrollYear: "2019",
    graduation: "2023",
    department: "Software Engineering",
    level: "Degree",
    address: "No 4, Jalan Au4D/3A, Wangsa Maju",
    code: "40400",
    city: "Gombak",
    state: "Selangor",
    country: "Malaysia",
    bio: "Add Bio",
    linkedin: "",
    github: "",
    userName: "Haney"
};
var keys = Object.keys(defaultprofile);
var values = Object.values(defaultprofile);

if (sessionStorage.getItem("fullName") === null){
    for (var i=0; i<17; i++){
        sessionStorage.setItem(keys[i],values[i]);
    } 
    for (var i=0; i<17; i++){
        document.getElementById(keys[i]+"1").innerHTML=sessionStorage.getItem(keys[i]);
    }
    document.getElementById("userName2").innerHTML=sessionStorage.getItem("userName");
}