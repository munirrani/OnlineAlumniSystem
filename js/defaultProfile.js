var defaultprofile = {
    fullName: "Humaira' Ahmad Shuhemi",
    currentPosition: "Software Engineer",
    email:"humairas00@yahoo.com",
    phone: "018-2469011",
    enrollYear: "2019/2020",
    department: "Software Engineer",
    level: "Degree",
    address: "Selangor, Malaysia",
    bio: "Web Developer at Haney & Humaira' Sdn Bhd",
    userName: "Haney"
};
var keys = Object.keys(defaultprofile);
var values = Object.values(defaultprofile);

if (localStorage.getItem("fullName") === null){
    for (var i=0; i<10; i++){
        localStorage.setItem(keys[i],values[i]);
    } 
    for (var i=0; i<10; i++){
        document.getElementById(keys[i]+"1").innerHTML=localStorage.getItem(keys[i]);
    }
    document.getElementById("userName2").innerHTML=localStorage.getItem("userName");
}